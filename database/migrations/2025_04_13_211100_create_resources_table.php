<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // resource name
            $table->string('field'); // e.g. TDI
            $table->string('module'); // e.g. Programmation Web
            $table->string('type'); // pdf, video, image, etc.
            $table->string('file_path'); // stored file path
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // uploader
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
