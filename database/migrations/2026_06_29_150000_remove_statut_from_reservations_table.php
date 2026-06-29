<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('reservations') || ! Schema::hasColumn('reservations', 'statut')) {
            return;
        }

        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('statut');
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('reservations') || Schema::hasColumn('reservations', 'statut')) {
            return;
        }

        Schema::table('reservations', function (Blueprint $table) {
            $table->string('statut')->default('en attente');
        });
    }
};
