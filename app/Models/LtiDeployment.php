<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LtiDeployment extends Model
{
    protected $table = "lti_deployment";
    protected $fillable = [
        'deployment_id',
        'lti_registration_id',
        'content_title',
        'description'
    ];

    public function RegisteredBy()
    {
        return $this->belongsTo(LtiRegistration::class);
    }
}
