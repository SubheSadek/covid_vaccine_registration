<?php

use App\Models\VaccineCenter;
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
        Schema::create('vaccine_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(VaccineCenter::class);
            $table->string('name');
            $table->string('phone', 20)->unique();
            $table->string('email')->unique();
            $table->string('nid', 20)->unique();
            $table->text('address');
            $table->date('birth_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccine_registrations');
    }
};
