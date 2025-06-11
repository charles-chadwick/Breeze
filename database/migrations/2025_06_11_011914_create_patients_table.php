<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('prefix')
                ->nullable();
            $table->string('first_name');
            $table->string('middle_name')
                ->nullable();
            $table->string('last_name');
            $table->string('suffix')
                ->nullable();
            $table->string('gender');
            $table->date('dob');
            $table->string('status');
            $table->string('email');
            $table->string('password');
            $table->string('remember_token')
                ->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by')
                  ->nullable();
            $table->integer('deleted_by')
                  ->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
