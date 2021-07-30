<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->default('1');
            $table->string('article_category_id')->nullable();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('short_description');
            $table->text('long_description')->nullable();
            $table->enum('place', ['home', 'contact', 'news'])->default('news');
            $table->string('color')->nullable()->default('white');
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
