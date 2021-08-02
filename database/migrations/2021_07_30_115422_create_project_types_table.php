<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->timestamps();
        });


        $data = [
            [
                'title' => $var = 'MMO',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'RPG',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'Strategy',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'Adventure',
                'slug' => str_slug($var),
            ],
        ];

        foreach ($data as $single){
            \App\Models\Project\ProjectType::create($single);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_types');
    }
}
