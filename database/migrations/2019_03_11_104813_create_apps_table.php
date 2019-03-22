<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('url');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('apps')->insert(
            array(
                'name' => 'Страницы',
                'url' => 'admin/pages'
            )
        );

        DB::table('apps')->insert(
            array(
                'name' => 'Товары',
                'url' => 'admin/products'
            )
        );

        DB::table('apps')->insert(
            array(
                'name' => 'Категории',
                'url' => 'admin/categories'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apps');
    }
}
