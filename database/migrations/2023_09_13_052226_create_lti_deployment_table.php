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
        Schema::create('lti_deployment', function (Blueprint $table) {
            $table->string('deployment_id');
            $table->uuid('lti_registration_id');
            $table->text('content_title');
            $table->text('description');
            $table->unique('deployment_id','lti_registration_id');
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
        Schema::dropIfExists('lti_deployment');
    }
};
