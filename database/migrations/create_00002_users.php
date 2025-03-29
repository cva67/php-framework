<?php

namespace cva67\phpmvc\database\migrations;

use cva67\phpmvc\database\AbstractMigration;
use cva67\phpmvc\database\Schema;

class create_00002_users extends AbstractMigration
{

    public function up()
    {
        Schema::create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique('email');
            $table->string('address');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
