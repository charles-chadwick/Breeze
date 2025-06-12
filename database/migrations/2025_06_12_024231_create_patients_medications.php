<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() : void
    {
        Schema::create('patients_medications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('medication_id');
            $table->unsignedBigInteger('prescriber_id');
            $table->timestamp("prescribed_at");
            $table->string('dosage');
            $table->string('frequency');
            $table->string('route_of_administration');
            $table->integer('quantity');
            $table->integer('refills');
            $table->text('instructions')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('patients_medications');
    }
};
