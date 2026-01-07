<?php

use App\Models\Sale;
use App\Models\User;
use Database\Seeders\SaleSeeder;
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
        Schema::create('book_sale', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sale::class);
            $table->foreignIdFor(User::class);
            $table->intenger('individual_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_sale');
    }
};
