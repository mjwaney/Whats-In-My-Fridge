<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Kitchen;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->string('author');
            $table->enum('kitchen', array('italian', 'british', 'indonesian', 'middle_eastern', 'american', 'chinese', 'japanese', 'russian', 'greek', 'french', 'mexican', 'other', 'thai', 'african', 'south_american', 'turkish')); //array
            $table->enum('type', array('breakfast', 'snack', 'dinner', 'lowcarb', 'vegan', 'dessert', 'sidedish', 'fastfood', 'vegetarian', 'glutenfree', 'lunch', 'lowfat', 'lowcalorie')); //array
            $table->string('serving_size');
            $table->string('difficulty');
            $table->dateTime('date_added');
            $table->text('instructions');
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
        Schema::dropIfExists('recipes');
    }
}
