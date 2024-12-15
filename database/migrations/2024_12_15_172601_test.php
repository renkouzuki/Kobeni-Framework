<?php

use KobeniFramework\Database\Migration;

class Migration_2024_12_15_172601 extends Migration
{
    public function up(): void
    {
        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $this->db->query("DROP TABLE IF EXISTS `user`;");
        $this->db->query("DROP TABLE IF EXISTS `role`;");
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `example` (
            `id` char(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
            `name` varchar(255) NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            UNIQUE KEY `name_unique` (`name`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
    }
    
    public function down(): void
    {
        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $this->dropTable("example");
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");
    }
}