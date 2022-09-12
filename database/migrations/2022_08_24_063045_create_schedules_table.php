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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('renewal_form_id');
            $table->foreignId('applicant')->constrained('renewal_forms')->onUpdate('cascade')->onDelete('cascade');
            $table->string('email');
            $table->longtext('detail');
            $table->dateTime('schedule');
            $table->timestamps();

            $table->index('renewal_form_id');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
