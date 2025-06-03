<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() : void
    {
        Schema::create('patients', function (Blueprint $table) {

            $table->id();
            $table->string('status');
            $table->string('first_name');
            $table->string('middle_name')
                  ->nullable();
            $table->string('last_name');
            $table->date('dob');
            $table->string('gender');

            $table->string('email');
            $table->string('password');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('patients');
    }
};
