<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class LtiKeySet extends Model
{
    use HasUuids;
    protected $table = "lti_key_set";

    public function Keys()
    {
        return $this->hasMany(LtiKey::class);
    }
}
