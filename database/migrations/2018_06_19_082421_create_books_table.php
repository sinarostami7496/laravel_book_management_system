<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn10', 10)->unique();
            $table->string('isbn13', 13)->unique();
            $table->string('title');
            $table->string('origin_title')->nullable();
            $table->string('alt_title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->json('author')->nullable();
            $table->json('translator')->nullable();
            $table->string('publisher')->nullable();
            $table->date('pubdate');
            $table->json('rating')->nullable();
            $table->json('tags')->nullable();
            $table->string('binding')->nullable();
            $table->decimal('price', 6, 2)->nullable();
            $table->integer('pages')->nullable();
            $table->text('author_intro')->nullable();
            $table->text('summary')->nullable();
            $table->string('catalog')->nullable();
            $table->boolean('is_store')->default(true);
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
        Schema::dropIfExists('books');
    }
}
