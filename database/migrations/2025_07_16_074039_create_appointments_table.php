<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() : void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'patient_id');
            $table->string('type');
            $table->string('title');
            $table->dateTime('date_and_time');
            $table->integer('length');
            $table->string('status');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('appointments');
    }
};
