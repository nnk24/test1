<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('name')->nullable();
            $table->text('name_seo')->nullable();
            $table->timestamps();
        });
        DB::table('tags')->insert([[
            'user_id' => 1,
            'name' => 'Châu Á,Châu Âu,Ảnh sex chọn lọc,Chảy nước đái,Ảnh sex cực dâm,Ảnh phá trinh',
            'name_seo' => 'chau-a,chau-au,anh-sex-chon-loc,chay-nuoc-dai,anh-sex-cuc-dam,anh-pha-trinh',
        ]]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
