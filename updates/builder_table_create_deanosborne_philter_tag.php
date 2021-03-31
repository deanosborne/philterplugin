<?php namespace deanosborne\Philter\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDeanosbornePhilterTag extends Migration
{
    public function up()
    {
        Schema::create('deanosborne_philter_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('tag', 191);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('deanosborne_philter_tag');
    }
}
