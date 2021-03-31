<?php namespace deanosborne\Philter\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDeanosbornePhilterImage extends Migration
{
    public function up()
    {
        Schema::create('deanosborne_philter_image', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->text('description')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('filter');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('deanosborne_philter_image');
    }
}
