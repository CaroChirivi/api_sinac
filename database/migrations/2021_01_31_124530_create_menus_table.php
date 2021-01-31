<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('description', 100);
            $table->string('url', 50)->nullable();
            $table->string('route', 50)->nullable();
            $table->unsignedInteger('menu_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('icon', 50)->nullable();
            $table->boolean('direct_access')->default(1);
            $table->boolean('draw')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
