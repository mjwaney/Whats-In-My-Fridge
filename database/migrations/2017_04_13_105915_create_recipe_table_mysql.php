<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Kitchen;

class CreateRecipeTableMysql extends Migration
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
            $table->enum('ingredients', array('Tomatoes', 'Chicken', 'Lettuce', 'Salt', 'Pepper', 'Vinnegar', 'Potatoes', 'Rice', 'Water', 'Milk', 'Red Wine')); //array
            $table->string('author');
            $table->enum('kitchen', array('Italian', 'American', 'Chinese', 'Japanese', 'Greek', 'French', 'Mexican', 'British', 'Indonesian', 'Other', 'Thai', 'Arabic', 'African', 'South-American', 'Turkish')); //array
            $table->enum('type', array('Breakfast', 'Snack', 'Dinner', 'Low Carb', 'Vegan', 'Vegetarian', 'Gluten-Free', 'Lunch', 'Low Fat', 'Low Calorie')); //array
            $table->string('serving_size');
            $table->dateTime('date_added');
            $table->time('time_needed');
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
