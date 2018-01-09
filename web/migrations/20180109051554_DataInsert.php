<?php

use Phpmig\Migration\Migration;

class DataInsert extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO recipes (
            name,
            prep_time,
            difficulty,
            vegetarian,
            status
            ) VALUES (
                'Aachener Printen',
                '1 Hour',
                2,
                1,
                1
            ), (
                'Apfelkuchen',
                '2 Hours',
                3,
                0,
                1
            ), (
                'Bratkartoffeln',
                '1.5 Hours',
                2,
                0,
                1
            ), (
                'Bratwurst',
                '3 Hours',
                4,
                0,
                1
            ), (
                'Currywurst',
                '2 Hours',
                3,
                0,
                1
            ), (
                'Fischbrötchen',
                '4 Hours',
                4,
                0,
                1
            ), (
                'Hendl',
                '3 Hours',
                2,
                0,
                1
            ), (
                'Kartoffelsalat',
                '2 Hours',
                2,
                1,
                1
            ), (
                'Kohlroulade',
                '2.5 Hours',
                2,
                1,
                1
            ), (
                'Marzipan',
                '2 Hours',
                2,
                0,
                1
            )";
          

        $container = $this->getContainer(); 

        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {

    }
}
