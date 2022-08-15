<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('equipment_stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->default(0);
            $table->foreignId('equipments_id')->constrained('equipments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipment_stocks');
    }
};
