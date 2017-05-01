<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_recipe', function (Blueprint $table) {
          
            $table->integer('ingredient_id')->unsigned()->nullable();
            $table->foreign('ingredient_id')->references('id')
                      ->on('ingredients')->onDelete('cascade');

            $table->integer('recipe_id')->unsigned()->nullable();
            $table->foreign('recipe_id')->references('id')
                      ->on('recipes')->onDelete('cascade');
            $table->timestamps();
        });

      //   $table->integer('category_id')->unsigned()->nullable();
      // $table->foreign('category_id')->references('id')
      //       ->on('categories')->onDelete('cascade');

      // $table->integer('todolist_id')->unsigned()->nullable();
      // $table->foreign('todolist_id')->references('id')
      //       ->on('todolists')->onDelete('cascade');

      // $table->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_recipe');
    }
}
