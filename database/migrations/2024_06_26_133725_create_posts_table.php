<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("slug");
            $table->text("extract");
            $table->longText("body");

            $table->enum('status',[Post::BOORADOR,post::PUBLICADO])->default(Post::BOORADOR)->nullable();

            //FORANEA CATEGORY
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');

            //FORANEA USER
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
