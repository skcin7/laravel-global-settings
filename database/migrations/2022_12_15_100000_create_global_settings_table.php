<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Skcin7\LaravelGlobalSettings\Models\GlobalSetting;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable(GlobalSetting::tableName())) {
            Schema::create(GlobalSetting::tableName(), function(Blueprint $table) {
                $table->string(GlobalSetting::tableKeyColumn(), 255)->primary();
                $table->text(GlobalSetting::tableValueColumn());
                $table->enum(GlobalSetting::tableTypeColumn(), ['array', 'boolean', 'float', 'integer', 'json', 'string']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(GlobalSetting::tableName());
    }

};
