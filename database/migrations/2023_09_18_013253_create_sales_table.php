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
        DB::statement('
            CREATE TABLE sales (
                id BIGINT AUTO_INCREMENT,
                user_id BIGINT UNSIGNED,
                product_id BIGINT UNSIGNED,
                serial_no VARCHAR(255),
                activation_no VARCHAR(255),
                exp_date DATE,
                batch_no BIGINT,
                retail_type VARCHAR(255),
                phone_no VARCHAR(255),
                download_id INT,
                recept_status VARCHAR(255),
                created_at TIMESTAMP,
                updated_at TIMESTAMP,
                month INT, 
                PRIMARY KEY (id, month),
                INDEX idx_product_id (product_id),
                INDEX idx_user_id (user_id),
                INDEX idx_created_at (created_at),
                INDEX idx_month (month)
                
            ) ENGINE = InnoDB PARTITION BY RANGE COLUMNS(month) (
                PARTITION pJan VALUES LESS THAN (2),
                PARTITION pFeb VALUES LESS THAN (3),
                PARTITION pMar VALUES LESS THAN (4),
                PARTITION pApr VALUES LESS THAN (5),
                PARTITION pMay VALUES LESS THAN (6),
                PARTITION pJun VALUES LESS THAN (7),
                PARTITION pJul VALUES LESS THAN (8),
                PARTITION pAug VALUES LESS THAN (9),
                PARTITION pSep VALUES LESS THAN (10),
                PARTITION pOct VALUES LESS THAN (11),
                PARTITION pNov VALUES LESS THAN (12),
                PARTITION pDec VALUES LESS THAN (13)
            )
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};