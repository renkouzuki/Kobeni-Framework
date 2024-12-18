<?php

use KobeniFramework\Database\Migration;

class Migration_2024_12_17_164708 extends Migration
{
    public function up(): void
    {
        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $tableExists = $this->db->query("SELECT 1 FROM information_schema.tables WHERE table_schema = 'testingkobeni' AND table_name = 'example'");
        if (empty($tableExists)) {
            $this->db->query("CREATE TABLE IF NOT EXISTS `example` (\n    `id` char(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
    `name` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `name_unique` (`name`)\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        } else {
            $currentColumns = $this->db->query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'example'");
            $existingColumns = array_column($currentColumns, "COLUMN_NAME");
            $schemaColumns = array(
                0 => 'id',
                1 => 'name',
                2 => 'created_at',
                3 => 'updated_at',
            );
            $columnsToRemove = array_diff($existingColumns, $schemaColumns);
            foreach ($columnsToRemove as $column) {
                if ($column !== "id") {
                    $this->db->query("ALTER TABLE `example` DROP COLUMN `$column`");
                }
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'example' AND column_name = 'name'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `example` ADD COLUMN `name` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `example` MODIFY COLUMN `name` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'example' AND column_name = 'created_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `example` ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `example` MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'example' AND column_name = 'updated_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `example` ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `example` MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            }
        }
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");

        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $tableExists = $this->db->query("SELECT 1 FROM information_schema.tables WHERE table_schema = 'testingkobeni' AND table_name = 'user'");
        if (empty($tableExists)) {
            $this->db->query("CREATE TABLE IF NOT EXISTS `user` (\n    `id` char(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `role_id` char(36) NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `name_unique` (`name`),
    UNIQUE KEY `email_unique` (`email`)\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        } else {
            $currentColumns = $this->db->query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'user'");
            $existingColumns = array_column($currentColumns, "COLUMN_NAME");
            $schemaColumns = array(
                0 => 'id',
                1 => 'name',
                2 => 'email',
                3 => 'password',
                4 => 'role_id',
                5 => 'created_at',
                6 => 'updated_at',
            );
            $columnsToRemove = array_diff($existingColumns, $schemaColumns);
            foreach ($columnsToRemove as $column) {
                if ($column !== "id") {
                    $this->db->query("ALTER TABLE `user` DROP COLUMN `$column`");
                }
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'user' AND column_name = 'name'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `name` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `user` MODIFY COLUMN `name` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'user' AND column_name = 'email'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `email` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `user` MODIFY COLUMN `email` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'user' AND column_name = 'password'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `password` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `user` MODIFY COLUMN `password` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'user' AND column_name = 'role_id'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `role_id` char(36) NULL");
            } else {
                $this->db->query("ALTER TABLE `user` MODIFY COLUMN `role_id` char(36) NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'user' AND column_name = 'created_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `user` MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'user' AND column_name = 'updated_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `user` ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `user` MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            }
            $this->db->query("ALTER TABLE `user` MODIFY COLUMN `role_id` char(36) NULL");
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
            $currentColumns = $this->db->query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'role'");
            $existingColumns = array_column($currentColumns, "COLUMN_NAME");
            $schemaColumns = array(
                0 => 'id',
                1 => 'name',
                2 => 'description',
                3 => 'created_at',
                4 => 'updated_at',
            );
            $columnsToRemove = array_diff($existingColumns, $schemaColumns);
            foreach ($columnsToRemove as $column) {
                if ($column !== "id") {
                    $this->db->query("ALTER TABLE `role` DROP COLUMN `$column`");
                }
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'role' AND column_name = 'name'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `role` ADD COLUMN `name` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `role` MODIFY COLUMN `name` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'role' AND column_name = 'description'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `role` ADD COLUMN `description` varchar(255) NULL");
            } else {
                $this->db->query("ALTER TABLE `role` MODIFY COLUMN `description` varchar(255) NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'role' AND column_name = 'created_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `role` ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `role` MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'role' AND column_name = 'updated_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `role` ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `role` MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            }
        }
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");

        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $tableExists = $this->db->query("SELECT 1 FROM information_schema.tables WHERE table_schema = 'testingkobeni' AND table_name = 'post'");
        if (empty($tableExists)) {
            $this->db->query("CREATE TABLE IF NOT EXISTS `post` (\n    `id` char(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
    `title` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `content` text NOT NULL,
    `user_id` char(36) NOT NULL,
    `category_id` char(36) NOT NULL,
    `published_at` timestamp NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        } else {
            $currentColumns = $this->db->query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post'");
            $existingColumns = array_column($currentColumns, "COLUMN_NAME");
            $schemaColumns = array(
                0 => 'id',
                1 => 'title',
                2 => 'description',
                3 => 'content',
                4 => 'user_id',
                5 => 'category_id',
                6 => 'published_at',
                7 => 'created_at',
                8 => 'updated_at',
            );
            $columnsToRemove = array_diff($existingColumns, $schemaColumns);
            foreach ($columnsToRemove as $column) {
                if ($column !== "id") {
                    $this->db->query("ALTER TABLE `post` DROP COLUMN `$column`");
                }
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'title'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `title` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `post` MODIFY COLUMN `title` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'description'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `description` text NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `post` MODIFY COLUMN `description` text NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'content'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `content` text NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `post` MODIFY COLUMN `content` text NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'user_id'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `user_id` char(36) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `post` MODIFY COLUMN `user_id` char(36) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'category_id'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `category_id` char(36) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `post` MODIFY COLUMN `category_id` char(36) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'published_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `published_at` timestamp NULL");
            } else {
                $this->db->query("ALTER TABLE `post` MODIFY COLUMN `published_at` timestamp NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'created_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `post` MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'post' AND column_name = 'updated_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `post` ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `post` MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            }
            $this->db->query("ALTER TABLE `post` MODIFY COLUMN `user_id` char(36) NOT NULL");
            $this->db->query("ALTER TABLE `post` MODIFY COLUMN `category_id` char(36) NOT NULL");
        }
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");

        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $tableExists = $this->db->query("SELECT 1 FROM information_schema.tables WHERE table_schema = 'testingkobeni' AND table_name = 'category'");
        if (empty($tableExists)) {
            $this->db->query("CREATE TABLE IF NOT EXISTS `category` (\n    `id` char(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
    `name` varchar(255) NOT NULL,
    `slug` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        } else {
            $currentColumns = $this->db->query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'category'");
            $existingColumns = array_column($currentColumns, "COLUMN_NAME");
            $schemaColumns = array(
                0 => 'id',
                1 => 'name',
                2 => 'slug',
                3 => 'created_at',
                4 => 'updated_at',
            );
            $columnsToRemove = array_diff($existingColumns, $schemaColumns);
            foreach ($columnsToRemove as $column) {
                if ($column !== "id") {
                    $this->db->query("ALTER TABLE `category` DROP COLUMN `$column`");
                }
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'category' AND column_name = 'name'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `category` ADD COLUMN `name` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `category` MODIFY COLUMN `name` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'category' AND column_name = 'slug'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `category` ADD COLUMN `slug` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `category` MODIFY COLUMN `slug` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'category' AND column_name = 'created_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `category` ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `category` MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'category' AND column_name = 'updated_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `category` ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `category` MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            }
        }
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");

        $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
        $tableExists = $this->db->query("SELECT 1 FROM information_schema.tables WHERE table_schema = 'testingkobeni' AND table_name = 'project'");
        if (empty($tableExists)) {
            $this->db->query("CREATE TABLE IF NOT EXISTS `project` (\n    `id` char(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
    `name` varchar(255) NOT NULL,
    `description` text NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        } else {
            $currentColumns = $this->db->query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'project'");
            $existingColumns = array_column($currentColumns, "COLUMN_NAME");
            $schemaColumns = array(
                0 => 'id',
                1 => 'name',
                2 => 'description',
                3 => 'created_at',
                4 => 'updated_at',
            );
            $columnsToRemove = array_diff($existingColumns, $schemaColumns);
            foreach ($columnsToRemove as $column) {
                if ($column !== "id") {
                    $this->db->query("ALTER TABLE `project` DROP COLUMN `$column`");
                }
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'project' AND column_name = 'name'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `project` ADD COLUMN `name` varchar(255) NOT NULL");
            } else {
                $this->db->query("ALTER TABLE `project` MODIFY COLUMN `name` varchar(255) NOT NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'project' AND column_name = 'description'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `project` ADD COLUMN `description` text NULL");
            } else {
                $this->db->query("ALTER TABLE `project` MODIFY COLUMN `description` text NULL");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'project' AND column_name = 'created_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `project` ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `project` MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
            $columnExists = $this->db->query("SELECT 1 FROM information_schema.columns WHERE table_schema = 'testingkobeni' AND table_name = 'project' AND column_name = 'updated_at'");
            if (empty($columnExists)) {
                $this->db->query("ALTER TABLE `project` ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            } else {
                $this->db->query("ALTER TABLE `project` MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
            }
        }
        $this->db->query("SET FOREIGN_KEY_CHECKS=1;");
    }

    public function down(): void
    {
        $this->dropTable("project");
        $this->dropTable("category");
        $this->dropTable("post");
        $this->dropTable("role");
        $this->dropTable("user");
        $this->dropTable("example");
    }
}
