<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() : void
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->string('generic_name');
            $table->string('brand_name')->nullable();
            $table->string('manufacturer')
                  ->nullable();
            $table->string('strength');
            $table->string('dose_form');
            $table->string('ndc')
                  ->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by')
                  ->nullable();
            $table->integer('deleted_by')
                  ->nullable();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('medications');
    }
};
