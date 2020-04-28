<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('blog_cat_id')->unsigned();
            $table->string('slug', 100)->nullable();
            $table->string('title', 150);
            $table->text('blog_content');
            $table->string('blog_image', 255)->nullable();
            $table->boolean('published')->default(false);
            $table->dateTime('published_at')->nullable();
            $table->bigInteger('user_id')->unsigned();
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
        Schema::dropIfExists('blogs');
    }
}
