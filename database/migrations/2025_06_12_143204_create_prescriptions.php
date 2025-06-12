<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('patient_id');
            $table->unsignedInteger('prescriber_id');
            $table->unsignedInteger('medication_id');
            $table->timestamp('prescribed_at');
            $table->string('dosage');
            $table->string('frequency');
            $table->string('route');
            $table->integer('quantity');
            $table->integer('refills');

            $table->text('instructions')
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
        Schema::dropIfExists('prescriptions');
    }
};
