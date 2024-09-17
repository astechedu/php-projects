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
        Schema::create('orderitems', function (Blueprint $table) {
            $table->id();
            //$table->integer('orderid'); 
            //$table->integer('productid');      
            $table->integer('quantity');  
            $table->decimal('price',10,2);
            $table->foreign('orderid')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('productid')->references('id')->on('products')->onDelete('cascade');                                                                   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitems');
    }
};
