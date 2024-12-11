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
        Schema::table('product', function (Blueprint $table) {
            $table->string('name',250)->change();
            // $table->renameColumn('price','product_price');
            $table->dropColumn(['price']);
            $table->float('product_price',8,2) ->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            $table->string('name',200)->change();
            // $table->renameColumn('product_price','price');
            $table->dropColumn(['product_price']);
            $table->float('price',8,2)->after('name');
        });
    }
};
