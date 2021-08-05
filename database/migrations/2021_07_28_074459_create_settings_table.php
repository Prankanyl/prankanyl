<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->string('background_color');
            $table->string('text_color');
            $table->boolean('active')->default(0);
            $table->timestamps();
        });

        $data = [
            [
                'title' => 'Prankanyl Site',
                'favicon' => 'favicon.png',
                'logo' => 'logo.png',
                'email' => 'v752433@icloud.com',
                'phone' => '+375 (29) 294-15-17',
                'address' => 'Minsk, Belarus',
                'description' => 'description description description description description description description description description description description description description description description description description description description description description',
                'background_color' => 'rgb(218, 16, 87)',
                'text_color' => 'rgb(255, 255, 255)',
                'active' => 1,
            ],
            [
                'title' => 'My Project Site',
                'favicon' => 'project_favicon.png',
                'logo' => 'project_logo.png',
                'email' => 'v.basovets@gmail.com',
                'phone' => '+375 (29) 294-15-17',
                'address' => 'Minsk, Belarus',
                'background_color' => 'rgb(25, 25, 180)',
                'text_color' => 'rgb(255, 255, 255)',
                'active' => 0,
            ],
        ];

        foreach ($data as $single){
            \App\Models\Setting::create($single);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
