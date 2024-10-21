<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE products ADD CONSTRAINT batch_number_format CHECK (batch_number REGEXP '^[a-zA-Z]{2}-[0-9]{3}-[0-9]{2}-[0-9]{1}$')");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the check constraint when rolling back
        DB::statement("ALTER TABLE products DROP CONSTRAINT IF EXISTS batch_number_format");
    }
};
