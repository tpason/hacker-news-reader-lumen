<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * id – the unique item ID that comes from the API.
     * title – the title of the item. This is the field that we’ll be displaying later on in the news page.
     * description – a brief description of the item. This will be displayed on hover in a tooltip.
     * username – the username of the user who submitted the item on hacker news.
     * item_type – the type of item. This can either be story or job.
     * url – the URL pointing to the full details of the item. This is usually the website of the item that was added
     * but it can also be empty, in which case the full description of the item is available
     * on the hacker news website itself.
     * time_stamp – the unix timestamp for time of submission.
     * score – the current ranking of the item.

     */
    public function up()
    {
        Schema::create('items', function(Blueprint $table){
            $table->integer('id')->primary();
            $table->string('title');
            $table->text('description');
            $table->string('username');
            $table->char('item_type', 20);
            $table->string('url');
            $table->integer('time_stamp');
            $table->integer('score');
            $table->boolean('is_top');
            $table->boolean('is_show');
            $table->boolean('is_ask');
            $table->boolean('is_job');
            $table->boolean('is_new');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
