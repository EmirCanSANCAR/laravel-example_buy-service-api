<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProviderTypePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_provider_type_pivot', function (Blueprint $table) {
            $table->primary(['service_provider_id', 'service_provider_type_id'], 'service_provider_id_service_provider_type_id_primary');
            $table->unsignedBigInteger('service_provider_id');
            $table->unsignedBigInteger('service_provider_type_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_provider_type_pivot');
    }
}
