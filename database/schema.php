<?php

use KobeniFramework\Database\Schema\Schema;

return [
    // 'Author' => function ($model) {
    //     $model->id()
    //         ->string('name')
    //         ->text('biography', true)
    //         ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //         ->datetime('updated_at');
    // },

    // 'Book' => function ($model) {
    //     $model->id()
    //         ->string('title')
    //         ->string('isbn')->unique()
    //         ->decimal('price')
    //         ->text('description', true)
    //         ->integer('stock')
    //         ->foreignId('author_id')
    //         ->relation('author', 'Author', [
    //             'fields' => ['author_id'],
    //             'references' => ['id']
    //         ])
    //         ->datetime('published_at', true)
    //         ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //         ->datetime('updated_at');
    // },

    // 'Category' => function ($model) {
    //     $model->id()
    //         ->string('name')->unique()
    //         ->text('description', true)
    //         ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //         ->datetime('updated_at');
    // },

    // 'BookCategory' => function ($model) {
    //     $model->id()
    //         ->foreignId('book_id')
    //         ->foreignId('category_id')
    //         ->relation('book', 'Book', [
    //             'fields' => ['book_id'],
    //             'references' => ['id']
    //         ])
    //         ->relation('category', 'Category', [
    //             'fields' => ['category_id'],
    //             'references' => ['id']
    //         ])
    //         ->datetime('created_at')->default('CURRENT_TIMESTAMP');
    // }

    // 'User' => function ($model) {
    //     $model->id()
    //         ->string('name')->unique()
    //         ->string('email')->unique()
    //         ->string('password')
    //         ->string('profile', true)
    //         ->foreignId('role_id')         
    //         ->relation('role', 'Role', [
    //             'fields' => ['role_id'],
    //             'references' => ['id']
    //         ])
    //         ->datetime('deleted_at', true)
    //         ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //         ->datetime('updated_at');
    // },

    // 'Role' => function ($model) {
    //     $model->id()
    //         ->string('name')->unique()
    //         ->string('description', true)
    //         ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //         ->datetime('updated_at');
    // }

    'example' => function($model){
        $model->id()
        ->string('name')->unique()
        ->datetime('created_at')->default('CURRENT_TIMESTAMP')
        ->datetime('updated_at');
    }
];
