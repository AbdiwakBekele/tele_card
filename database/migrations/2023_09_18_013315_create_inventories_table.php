<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            CREATE TABLE inventories (
                id BIGINT AUTO_INCREMENT,
                product_id BIGINT UNSIGNED,
                serial_no VARCHAR(255),
                activation_no VARCHAR(10000),
                batch_no BIGINT,
                exp_date DATE,
                created_at TIMESTAMP,
                updated_at TIMESTAMP,

                PRIMARY KEY (id, product_id),
                INDEX idx_product_id (product_id)

            ) ENGINE = InnoDB PARTITION BY LIST (product_id) (
                PARTITION p1 VALUES IN (1),
                PARTITION p2 VALUES IN (2),
                PARTITION p3 VALUES IN (3),
                PARTITION p4 VALUES IN (4),
                PARTITION p5 VALUES IN (5),
                PARTITION p6 VALUES IN (6),
                PARTITION p7 VALUES IN (7),
                PARTITION p8 VALUES IN (8),
                PARTITION p9 VALUES IN (9)
            )
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};