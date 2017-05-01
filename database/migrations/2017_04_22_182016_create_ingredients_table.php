<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Http\Controllers\StoreIngredientsTextController;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('category', array('Dairy', 'Meats', 'Vegetables', 'Fruits', 'Spices', 'Fish', 'Baking & Grains', 'Oils', 'Seafood', 'Added sweeteners', 'Seasonings', 'Nuts', 'Condiments', 'Desert & snacks', 'Beverages', 'Soups', 'Dairy alternatives', 'Peas', 'Sauce', 'Alcohol', ''));
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
        Schema::dropIfExists('ingredients');
    }
}
