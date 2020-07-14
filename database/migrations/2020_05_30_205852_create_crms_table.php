<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone_number', 50);
            $table->string('agent', 150);
            $table->string('customer_name', 150)->nullable();
            $table->string('customer_email', 100)->nullable();
            $table->string('location', 150)->nullable();
            $table->string('address')->nullable();
            $table->string('channel', 150)->nullable();
            $table->string('query_link')->nullable();
            $table->integer('query_type_id')->unsigned()->nullable();
            $table->integer('master_category_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('sub_category_id')->unsigned()->nullable();
            $table->string('service_type', 150)->nullable();
            $table->string('service_request', 150)->nullable();
            $table->string('service_solution', 150)->nullable();
            $table->string('service_feedback')->nullable();
            $table->string('service_budget', 150)->nullable();
            $table->string('ord_or_comp_id', 100)->nullable();
            $table->date('follow_up_date')->nullable();
            $table->string('order_channel', 100)->nullable();
            $table->string('reason_of_call', 150)->nullable();
            $table->string('call_detail')->nullable();
            $table->string('call_solution')->nullable();
            $table->string('app_name', 100)->nullable();
            $table->string('app_rating', 50)->nullable();
            $table->string('review_type', 50)->nullable();
            $table->string('review_detail', 150)->nullable();
            $table->integer('lead_id')->unsigned()->nullable();
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
        Schema::drop('crms');
    }
}
