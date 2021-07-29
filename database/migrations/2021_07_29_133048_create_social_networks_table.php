<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_networks', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('link')->nullable()->default('#');
            $table->timestamps();
        });

        $data = [
            [
                'icon' => 'la-facebook',
                'link' => 'https://www.facebook.com/',
            ],
            [
                'icon' => 'la-telegram',
                'link' => 'https://www.telegram.org/',
            ],
            [
                'icon' => 'la-google',
                'link' => 'https://www.google.com/',
            ],
            [
                'icon' => 'la-linkedin',
                'link' => 'https://www.linkedin.com/',
            ],
            [
                'icon' => 'la-github',
                'link' => 'https://www.github.com/',
            ],
        ];

        foreach ($data as $single){
            \App\Models\SocialNetwork::create($single);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_networks');
    }
}
