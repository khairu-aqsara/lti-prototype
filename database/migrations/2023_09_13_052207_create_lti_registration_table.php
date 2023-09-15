<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lti_registration', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('issuer');
            $table->string('client_id');
            $table->string('login_auth_endpoint');
            $table->string('service_auth_endpoint');
            $table->string('jwks_endpoint');
            $table->string('auth_provider');
            $table->uuid('lti_key_set_id');
            $table->unique('issuer','client_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lti_registration');
    }
};
