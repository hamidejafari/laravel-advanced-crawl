<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longtext('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('status')->nullable();
            $table->longtext('question')->nullable();
            $table->longtext('response')->nullable();
            $table->string('url')->nullable();
            $table->string('title_seo')->nullable();
            $table->string('type')->nullable();
            $table->longtext('description_seo')->nullable();
            $table->string('image_seo')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('contents');
    }
}
