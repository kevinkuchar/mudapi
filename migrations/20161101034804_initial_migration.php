<?php

use Migrations\Migration;

class InitialMigration extends Migration
{

    public function up()
    {
        $this->schema->create('lists', function(Illuminate\Database\Schema\Blueprint $table){
            $table->increments('id');
            $table->string('list_name');
            $table->timestamps();
        });

        $this->schema->create('list_items', function(Illuminate\Database\Schema\Blueprint $table){
            $table->increments('id');
            $table->integer('list_id')->unsigned();
            $table->foreign('list_id')
                  ->references('id')->on('lists')
                  ->onDelete('cascade');
            $table->string('item_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        $this->schema->drop('lists');
        $this->schema->drop('list_items');
    }
}
