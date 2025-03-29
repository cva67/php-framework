<?php

namespace MyApp\database\migrations;

use MyApp\database\AbstractMigration;
use MyApp\database\Schema;

class create_00001_migrations extends AbstractMigration
{

    public function up()
    {
        Schema::create('migrations', function ($table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('migrations');
    }
}
