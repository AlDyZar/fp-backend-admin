<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('user_id');
            $table->uuid('item_id');
            $table->string('qty');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('item_id')->references('id')->on('items');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE carts ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
