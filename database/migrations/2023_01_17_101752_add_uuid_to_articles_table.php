<?php

use App\Models\Article;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


return new class extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->uuid()->nullable()->after('id');
        });

        $articles = Article::take(10)->get()->each( function($a) {
            $a->update(['uuid' => Str::uuid()->toString()]);
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }
};
