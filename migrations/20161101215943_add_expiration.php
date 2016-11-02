<?php

use Migrations\Migration;

class AddExpiration extends Migration
{
    public function up()
    {
        $this->schema->table('list_items', function(Illuminate\Database\Schema\Blueprint $table)
        {
            $table->date('expires_on')->nullable();
        });
    }

    public function down() {
        $this->schema->table('list_items', function(Illuminate\Database\Schema\Blueprint $table)
        {
            $table->dropColumn(['expires_on']);
        });
    }
}
