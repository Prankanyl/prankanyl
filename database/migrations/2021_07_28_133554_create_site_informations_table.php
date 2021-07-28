<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_informations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('color')->nullable();
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        $data = [
            [
                'title' => 'Create Projects',
                'color' => 'green',
                'description' => 'Curabitur quamtis etsum lacus etsumis nulatis iaculis etsum vitae etsum ets nisle varius.',
                'icon' => 'la-tasks'
            ],
            [
                'title' => 'Manage Your Team',
                'color' => 'red',
                'description' => 'Curabitur quamtis etsum lacus etsumis nulatis iaculis etsum vitae etsum ets nisle varius.',
                'icon' => 'la-gem'
            ],
            [
                'title' => 'Get Notified',
                'color' => 'blue',
                'description' => 'Curabitur quamtis etsum lacus etsumis nulatis iaculis etsum vitae etsum ets nisle varius.',
                'icon' => 'la-bell'
            ],
        ];

        foreach ($data as $single){
            \App\Models\SiteInformation::create($single);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_informations');
    }
}
