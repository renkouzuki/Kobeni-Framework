<?php

use KobeniFramework\Database\Migration;

class Migration_2024_12_16_191612 extends Migration
{
    public function up(): void
    {
        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $tableExists = $this->db->query("SELECT 1 FROM information_schema.tables WHERE table_schema = 'testingkobeni' AND table_name = 'user'");
        if (empty($tableExists)) {
            $this->db->query("CREATE TABLE IF NOT EXISTS `user` (\n    `id` char(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `role_id` char(36) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `name_unique` (`name`),
    UNIQUE KEY `email_unique` (`email`)\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        } else {
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'user' AND column_name = 'name'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `name` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'user' AND column_name = 'email'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `email` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'user' AND column_name = 'password'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `password` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'user' AND column_name = 'role_id'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `role_id` char(36) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'user' AND column_name = 'created_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'user' AND column_name = 'updated_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            }
        }
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");

        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $tableExists = $this->db->query("SELECT 1 FROM information_schema.tables WHERE table_schema = 'testingkobeni' AND table_name = 'role'");
        if (empty($tableExists)) {
            $this->db->query("CREATE TABLE IF NOT EXISTS `role` (\n    `id` char(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
    `name` varchar(255) NOT NULL,
    `description` varchar(255) NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `name_unique` (`name`)\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        } else {
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'role' AND column_name = 'name'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `role` ADD COLUMN `name` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'role' AND column_name = 'description'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `role` ADD COLUMN `description` varchar(255) NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'role' AND column_name = 'created_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `role` ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'role' AND column_name = 'updated_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `role` ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            }
        }
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");

        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $tableExists = $this->db->query("SELECT 1 FROM information_schema.tables WHERE table_schema = 'testingkobeni' AND table_name = 'post'");
        if (empty($tableExists)) {
            $this->db->query("CREATE TABLE IF NOT EXISTS `post` (\n    `id` char(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
    `title` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `user_id` char(36) NOT NULL,
    `published_at` timestamp NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        } else {
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'title'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `title` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'content'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `content` text NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'user_id'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `user_id` char(36) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'published_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `published_at` timestamp NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'created_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'updated_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            }
        }
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");
    }
    
    public function down(): void
    {
        $this->dropTable("post");
        $this->dropTable("role");
        $this->dropTable("user");
    }
}