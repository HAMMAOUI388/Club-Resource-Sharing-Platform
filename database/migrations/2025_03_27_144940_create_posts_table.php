<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Post ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->string('title'); // Post title
            $table->text('body'); // Post body/content
            $table->timestamps(); // Created_at, Updated_at timestamps
        });
    }

    

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

