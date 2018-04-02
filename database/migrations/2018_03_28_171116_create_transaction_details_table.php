<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('transaction_id');
            $table->uuid('item_id');
            $table->integer('qty');
            $table->timestamps();
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->foreign('item_id')->references('id')->on('items');
        });

        DB::statement('ALTER TABLE transaction_details ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}
