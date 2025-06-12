<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('on');
            $table->unsignedBigInteger('on_id');
            $table->string('type');
            $table->string('title');
            $table->text('content');
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
        Schema::dropIfExists('notes');
    }
};
