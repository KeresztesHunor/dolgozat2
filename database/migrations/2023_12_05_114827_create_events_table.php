<?php

use App\Models\Agency;
use App\Models\Event;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->date('date');
            $table->foreignId('agency_id')->references('agency_id')->on('agencies');
            $table->integer('limit');
            $table->timestamps();
        });

        Event::create([
            'date' => '2024-01-01',
            'agency_id' => 1,
            'limit' => 256
        ]);
        Event::create([
            'date' => '2024-02-02',
            'agency_id' => 1,
            'limit' => 128
        ]);
        Event::create([
            'date' => '2024-03-03',
            'agency_id' => 1,
            'limit' => 64
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
