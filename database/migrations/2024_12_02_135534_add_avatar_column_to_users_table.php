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
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable()
                        ->default('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmnZMysSEdWVO3WxRp7ruaLMztl-sy4YZqMm1Vcf9aqOpLaMEyqSrz0aw&s')
                        ->after('username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
        });
    }
};
