<?php

use KobeniFramework\Database\Migration;

class Migration_2024_12_23_235811 extends Migration
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

        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $tableExists = $this->db->query("SELECT 1 FROM information_schema.tables WHERE table_schema = 'kobeniauth' AND table_name = 'refresh_tokens'");
        if (empty($tableExists)) {
            $this->db->query("CREATE TABLE IF NOT EXISTS `refresh_tokens` (\n    `id` char(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
    `token` varchar(255) NOT NULL,
    `user_id` char(36) NOT NULL,
    `revoked` int NOT NULL DEFAULT 0,
    `expires_at` timestamp NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        } else {
            $currentColumns = $this->db->query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'refresh_tokens'");
            $existingColumns = array_column($currentColumns, "COLUMN_NAME");
            $schemaColumns = array (
  0 => 'id',
  1 => 'token',
  2 => 'user_id',
  3 => 'revoked',
  4 => 'expires_at',
  5 => 'created_at',
  6 => 'updated_at',
);
            $columnsToRemove = array_diff($existingColumns, $schemaColumns);
            foreach ($columnsToRemove as $column) {
                if ($column !== "id") {
                    $this->db->query("ALTER TABLE `refresh_tokens` DROP COLUMN `$column`");
                }
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'refresh_tokens' AND column_name = 'token'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `refresh_tokens` ADD COLUMN `token` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `refresh_tokens` MODIFY COLUMN `token` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'refresh_tokens' AND column_name = 'user_id'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `refresh_tokens` ADD COLUMN `user_id` char(36) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `refresh_tokens` MODIFY COLUMN `user_id` char(36) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'refresh_tokens' AND column_name = 'revoked'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `refresh_tokens` ADD COLUMN `revoked` int NOT NULL DEFAULT 0");
            } else {
                $this->db->query("ALTER TABLE `refresh_tokens` MODIFY COLUMN `revoked` int NOT NULL DEFAULT 0");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'refresh_tokens' AND column_name = 'expires_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `refresh_tokens` ADD COLUMN `expires_at` timestamp NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `refresh_tokens` MODIFY COLUMN `expires_at` timestamp NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'refresh_tokens' AND column_name = 'created_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `refresh_tokens` ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `refresh_tokens` MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'refresh_tokens' AND column_name = 'updated_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `refresh_tokens` ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `refresh_tokens` MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            }
            $this->db->query("ALTER TABLE `refresh_tokens` MODIFY COLUMN `user_id` char(36) NOT NULL");
        }
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");

        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $tableExists = $this->db->query("SELECT 1 FROM information_schema.tables WHERE table_schema = 'kobeniauth' AND table_name = 'blacklisted_tokens'");
        if (empty($tableExists)) {
            $this->db->query("CREATE TABLE IF NOT EXISTS `blacklisted_tokens` (\n    `id` char(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
    `token_hash` varchar(255) NOT NULL,
    `expires_at` timestamp NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `token_hash_unique` (`token_hash`)\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        } else {
            $currentColumns = $this->db->query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'blacklisted_tokens'");
            $existingColumns = array_column($currentColumns, "COLUMN_NAME");
            $schemaColumns = array (
  0 => 'id',
  1 => 'token_hash',
  2 => 'expires_at',
  3 => 'created_at',
  4 => 'updated_at',
);
            $columnsToRemove = array_diff($existingColumns, $schemaColumns);
            foreach ($columnsToRemove as $column) {
                if ($column !== "id") {
                    $this->db->query("ALTER TABLE `blacklisted_tokens` DROP COLUMN `$column`");
                }
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'blacklisted_tokens' AND column_name = 'token_hash'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `blacklisted_tokens` ADD COLUMN `token_hash` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `blacklisted_tokens` MODIFY COLUMN `token_hash` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'blacklisted_tokens' AND column_name = 'expires_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `blacklisted_tokens` ADD COLUMN `expires_at` timestamp NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `blacklisted_tokens` MODIFY COLUMN `expires_at` timestamp NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'blacklisted_tokens' AND column_name = 'created_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `blacklisted_tokens` ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `blacklisted_tokens` MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'kobeniauth' AND table_name = 'blacklisted_tokens' AND column_name = 'updated_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `blacklisted_tokens` ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `blacklisted_tokens` MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            }
        }
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");
    }
    
    public function down(): void
    {
        $this->dropTable("blacklisted_tokens");
        $this->dropTable("refresh_tokens");
        $this->dropTable("user");
    }
}