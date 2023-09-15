<?php

namespace Database\Seeders;

use App\Models\LtiKey;
use App\Models\LtiKeySet;
use Illuminate\Database\Seeder;

class DefaultKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LtiKeySet::insert(['id' => 'd48a53de-021f-46f7-a0a4-7134812c2235']);
        LtiKey::insert([
            'id' => '1e3f0512-2066-4f8a-8916-2d278bf49524',
            'lti_key_set_id' => 'd48a53de-021f-46f7-a0a4-7134812c2235',
            'private_key' => '-----BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQEA8osiSa75nmqmakwNNocLA2N2huWM9At/tjSZOFX1r4+PDclS
zxhMw+ZcgHH+E/05Ec6Vcfd75i8Z+Bxu4ctbYk2FNIvRMN5UgWqxZ5Pf70n8UFxj
GqdwhUA7/n5KOFoUd9F6wLKa6Oh3OzE6v9+O3y6qL40XhZxNrJjCqxSEkLkOK3xJ
0J2npuZ59kipDEDZkRTWz3al09wQ0nvAgCc96DGH+jCgy0msA0OZQ9SmDE9CCMbD
T86ogLugPFCvo5g5zqBBX9Ak3czsuLS6Ni9Wco8ZSxoaCIsPXK0RJpt6Jvbjclqb
4imsobifxy5LsAV0l/weNWmU2DpzJsLgeK6VVwIDAQABAoIBAQC2R1RUdfjJUrOQ
rWk8so7XVBfO15NwEXhAkhUYnpmPAF/tZ4EhfMysaWLZcVIW6bbLKCtuRCVMX9ev
fIbkkLU0ErhqPi3QATcXL/z1r8+bAUprhpNAg9fvfM/ZukXDRged6MPNMC11nseE
p8HUU4oHNwXVyL6FvmstrHyYoEnkjIiMk34O2MFjAavoIJhM0gkoXVnxRP5MNi1n
GPVhK+TfZyRri20x1Rh3CsIq36PUyxCICWkD7jftLGqVdQBfuii600LP5v7nuHz9
LDsCeY7xRJu0eLdDk7/9ukb8fuq6/+3VYMYChYWvpw4DaH8qDHxZfWzMyaI489ma
l27lhgdxAoGBAPkxH6WuZM/GOowjySuruRjAVyJ4stfe9l/x8MrqnFA2Q8stqK69
60Y9LDrSaAx7QutvzZ64br2WMlvnGdJw868z4/JmvoAqW3IHUXzqRAHgOk/8Y3ze
Sjd7t3R0O3v6qAbQjyRYYgfAMZo7PzXW8FKNGsakAedEKW0b94HYndKpAoGBAPkr
grtARp2nnd1WGuxgQMjX++HjT0p9x7fTMCtfvYhZguU9AlCx53VHFeGc6fqsDkUm
BFv0dqMnw0TPzEQqLElBIh87TGS4JSXmcbQcejIx+ry2kMFuyMZIPuvZCnLfB/d7
Qu2DU6mdeIBME/8AX5kBqn1ekddioESdSkHkkif/AoGAaPCeAjjZ7YHuP/wGCOUN
UvYU+8hWkIAtwyPxIpMAdusTS6oTwlrqjK7QRIk9FhyGhv2TWwcSY7avyHIfNrco
eBzjHr7T9MdhsTiRwYgqUZvrEqoX/4rhOFJaZKlaL5DUV+JWlZi+18LBYNEYgoTc
ufcAUqzYvFrBE1jWt5DQjdkCgYATs6sMn1J2GNDUtYA/fITi3KEgBVc5rqRiFqLS
aymTZHCDK8XJF6gTj+FdC4k8tuoR8aWal8Phtr0r7bpbEXKbADlwesHZnO3jB0uq
UC4hVe5biZv8j4P0mbXP9ENtPdFlciuimCW/XaIvktRp71+fu4/9hcLGYxgFFOLQ
PwCHhQKBgGMCxIcueUkLnI9r0KkjtXap9mIgdgERwQPN0Cm9Tx35ZEzRp95kf4C6
MPsVOwZk5gNvvQngx4iaw9fNYG+PF2yNuDZ+EFwI0vpmGCKRQEke9/VCOFucMsjg
jMhbU+jrqRIJKisP7MCE1NRhymCPpQf/stEPl0nS5rj+mZJHQEGq
-----END RSA PRIVATE KEY-----',
            'alg' => 'RS256'
        ]);
    }
}
