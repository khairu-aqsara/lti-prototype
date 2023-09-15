<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class LtiRegistration extends Model
{
    use HasUuids;

    protected $table = "lti_registration";

    protected $fillable = [
        'issuer',
        'client_id',
        'login_auth_endpoint',
        'service_auth_endpoint',
        'jwks_endpoint',
        'auth_provider',
        'lti_key_set_id'
    ];

    public function HasDeployments()
    {
        return $this->hasMany(LtiDeployment::class);
    }
}
