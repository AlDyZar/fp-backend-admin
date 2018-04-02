<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('transactions', function (Blueprint $table) {
        //     $table->uuid('id');
        //     $table->primary('id');
        //     $table->uuid('user_id');
        //     $table->string('status');
        //     $table->integer('total');
        //     $table->timestamps();
        //     $table->foreign('user_id')->references('id')->on('users');
        // });

        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('user_id');
            $table->uuid('item_id');
            $table->string('status');
            $table->integer('qty');
            $table->integer('total');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('item_id')->references('id')->on('items');
        });

        DB::statement('ALTER TABLE transactions ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
