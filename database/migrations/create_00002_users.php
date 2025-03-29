<?php

namespace MyApp\database\migrations;

use MyApp\database\AbstractMigration;
use MyApp\database\Schema;

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
