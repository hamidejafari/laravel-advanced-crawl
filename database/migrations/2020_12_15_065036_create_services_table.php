<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->longtext('description')->nullable();
            $table->longtext('lid')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->string('url')->nullable();
            $table->string('title_seo')->nullable();
            $table->longtext('description_seo')->nullable();
            $table->string('image_seo')->nullable();
            $table->bigInteger('category_id')->nullable();
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
        Schema::dropIfExists('services');
    }
}
