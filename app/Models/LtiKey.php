<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class LtiKey extends Model
{
    use HasUuids;
    protected $table = "lti_key";

    protected $fillable = [
        'lti_key_set_id',
        'private_key',
        'alg'
    ];

    public function UsingKey()
    {
        return $this->belongsTo(LtiKey::class);
    }
}
