<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() : void
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('patient_id');
            $table->string('type');
            $table->string('status');
            $table->string('title');

            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->default(1);
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('discussions');
    }
};
