<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('business_information', function (Blueprint $table) {
            $table->text('facebook_url')->nullable()->after('map_url');
            $table->text('twitter_url')->nullable()->after('facebook_url');
            $table->text('instagram_url')->nullable()->after('twitter_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_information', function (Blueprint $table) {
            $table->dropColumn('facebook_url');
            $table->dropColumn('twitter_url');
            $table->dropColumn('instagram_url');
        });
    }
};
