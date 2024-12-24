<?php

use KobeniFramework\Database\Migration;

class Migration_2024_12_23_213102 extends Migration
{
    public function up(): void
    {
        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $tableExists = $this->db->query("SELECT 1 FROM information_schema.tables WHERE table_schema = 'kobeniauth' AND table_name = 'user'");
        if (empty($tableExists)) {
            $this->db->query("CREATE TABLE IF NOT EXISTS `user` (\n    `id` char(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `email_unique` (`email`)\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        } else {
            $currentColumns = $this->db->query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'user'");
            $existingColumns = array_column($currentColumns, "COLUMN_NAME");
            $schemaColumns = array (
  0 => 'id',
  1 => 'name',
  2 => 'email',
  3 => 'password',
  4 => 'created_at',
  5 => 'updated_at',
);
            $columnsToRemove = array_diff($existingColumns, $schemaColumns);
            foreach ($columnsToRemove as $column) {
                if ($column !== "id") {
                    $this->db->query("ALTER TABLE `user` DROP COLUMN `$column`");
                }
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'user' AND column_name = 'name'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `name` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `user` MODIFY COLUMN `name` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'user' AND column_name = 'email'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `email` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `user` MODIFY COLUMN `email` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'user' AND column_name = 'password'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `password` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `user` MODIFY COLUMN `password` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'user' AND column_name = 'created_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `user` MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'user' AND column_name = 'updated_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `user` MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            }
        }
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");
    }
    
    public function down(): void
    {
        $this->dropTable("user");
    }
}