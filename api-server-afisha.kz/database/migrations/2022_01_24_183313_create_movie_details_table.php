<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_details', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->foreignId('movie_id')->constrained('movies')->onDelete('cascade');
            $table->foreignId('production_country_id')->constrained('countries')->onDelete('cascade');
            $table->string('production_year');
            $table->date('premiere_date_kz');
            $table->integer('age_rating');
            $table->integer('duration');
            $table->foreignId('producer_id')->constrained('movie_users')->onDelete('cascade');
            $table->string('trailer_link');
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
        Schema::dropIfExists('movie_details');
    }
}
