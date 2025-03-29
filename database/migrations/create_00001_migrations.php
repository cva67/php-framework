<?php

namespace cva67\phpmvc\database\migrations;

use cva67\phpmvc\database\AbstractMigration;
use cva67\phpmvc\database\Schema;

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
