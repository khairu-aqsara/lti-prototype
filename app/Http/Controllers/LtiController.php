<?php

namespace App\Http\Controllers;

use App\Models\LtiKey;
use App\Models\LtiRegistration;
use Firebase\JWT\JWK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use phpseclib\Crypt\RSA;
use Firebase\JWT\JWT;

class LtiController extends Controller
{
    public function Jwks()
    {
        $jwks = [];
        $available_keys = LtiKey::all();
        if($available_keys->count() > 0){
            foreach($available_keys as $av_key)
            {
                $key = new RSA();
                $key->setHash("sha256");
                $key->loadKey($av_key->private_key);
                $key->setPublicKey(false, RSA::PUBLIC_FORMAT_PKCS8);
                if ( !$key->publicExponent ) {
                    continue;
                }
                $components = array(
                    'kty' => 'RSA',
                    'alg' => 'RS256',
                    'use' => 'sig',
                    'e' => JWT::urlsafeB64Encode($key->publicExponent->toBytes()),
                    'n' => JWT::urlsafeB64Encode($key->modulus->toBytes()),
                    'kid' => $av_key->lti_key_set_id,
                );
                $jwks[] = $components;
            }
        }

        return response()->json($jwks);
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'iss' => 'required|exists:lti_registration,issuer',
            'client_id' => 'required|exists:lti_registration,client_id',
        ]);

        $registration = LtiRegistration::where(['issuer' => $request->iss,'client_id' => $request->client_id])->first();
        $state = str_replace('.', '_', uniqid('state-', true));

        if(!is_null($registration))
        {
            $auth_params = [
                'scope'            => 'openid', // OIDC Scope.
                'response_type'    => 'id_token', // OIDC response is always an id token.
                'response_mode'    => 'form_post', // OIDC response is always a form post.
                'prompt'           => 'none', // Don't prompt user on redirect.
                'client_id'        => $registration->client_id, // Registered client id.
                'redirect_uri'     => route('lti.launch'), // URL to return to after login.
                'state'            => $state, // State to identify browser session.
                'nonce'            => uniqid('nonce-', true), // Prevent replay attacks.
                'login_hint'       => $request->login_hint, // Login hint to identify platform session.
                'lti_message_hint' => $request->lti_message_hint // Login hint to identify platform session.
            ];

            $paltform_auth = $registration->login_auth_endpoint."?".http_build_query($auth_params);

            return response()->redirectTo($paltform_auth, 302)
                ->withCookie("lti1p3_{$state}", $state, time() + 60);
        }
    }

    public function launch(Request $request)
    {
        JWT::$leeway = 5;
        $state = $request->hasCookie("lti1p3_{$request->state}");
        if(!$state){
            throw new \Exception('Inavlid State');
        }

        $id_token = $request->id_token;
        $id_token_parts = explode('.', $id_token);
        $id_token_body = json_decode(JWT::urlsafeB64Decode($id_token_parts[1]), true);

        $registration = LtiRegistration::where([
            'issuer' => $id_token_body['iss'],
            'client_id' => $id_token_body['aud']
        ])->first();

        if(!$registration){
            throw new \Exception('Inavlid Registration');
        }

        $public_key_set = Http::withOptions([
            'verify' => false
        ])->get($registration->jwks_endpoint);

        $public_key_set = $public_key_set->json();
        $id_token_header = json_decode(JWT::urlsafeB64Decode($id_token_parts[0]), true);

        $public_key = "";
        foreach ($public_key_set['keys'] as $key) {
            if ($key['kid'] == $id_token_header['kid']) {
                try {
                    $public_key = openssl_pkey_get_details(JWK::parseKey($key));
                    break;
                } catch(\Exception $e) {
                    die;
                }
            }
        }
        // Login USer
        //        // Call API Wp

        return view('lti');
    }
}
