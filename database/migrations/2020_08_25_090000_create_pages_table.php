<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("author_id")->nullable();
            $table->bigInteger("governor_owned_by")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->dateTime("published_at")->nullable();

            $table->text("content");
            $table->string("layout")->default("standard");
            $table->string("slug");
            $table->string("title");

            $table->foreign("author_id")
                ->references("id")
                ->on("users")
                ->onUpdate("CASCADE")
                ->onDelete("SET NULL");
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
