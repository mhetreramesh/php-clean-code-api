<?php

use Phpmig\Migration\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE recipes (
            id serial PRIMARY KEY,
            name character varying(100) NOT NULL,
            prep_time character varying(25) DEFAULT NULL,
            difficulty INTEGER NOT NULL DEFAULT '1',
            vegetarian INTEGER NOT NULL DEFAULT '1',
            status INTEGER NOT NULL DEFAULT '1',
            created_on timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_on timestamp NULL DEFAULT NULL
            )";
          

        $container = $this->getContainer(); 

        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE recipes";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
