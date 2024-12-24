<?php

use KobeniFramework\Database\Schema\Schema;

return [
    // 'example' => function ($model) {
    //     $model->id()
    //         ->string('name')->unique()
    //         // ->text('text',true)
    //         ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //         ->datetime('updated_at');
    // },

    // 'User' => function ($model) {
    //     $model->id()
    //         ->string('name')->unique()
    //         ->string('email')->unique()
    //         ->string('password')
    //         ->belongsTo('Role', null, 'id', true)
    //         ->hasMany('Post')
    //         ->belongsToMany('Project', 'user_projects')
    //         ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //         ->datetime('updated_at');
    // },

    // 'Role' => function ($model) {
    //     $model->id()
    //         ->string('name')->unique()
    //         ->string('description', true)
    //         ->hasMany('User')
    //         ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //         ->datetime('updated_at');
    // },

    // 'Post' => function ($model) {
    //     $model->id()
    //         ->string('title')
    //         ->text('description')
    //         ->text('content')
    //         ->belongsTo('User')
    //         ->belongsTo('Category')
    //         ->datetime('published_at', true)
    //         ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //         ->datetime('updated_at');
    // },

    // 'Category' => function ($model) {
    //     $model->id()
    //         ->string('name')
    //         ->string('slug')
    //         ->hasMany('Post')
    //         ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //         ->datetime('updated_at');
    // },

    // 'Project' => function ($model) {
    //     $model->id()
    //         ->string('name')
    //         ->text('description', true)
    //         ->belongsToMany('User', 'user_projects')
    //         ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //         ->datetime('updated_at');
    // }

    'User' => function ($model) {
        $model->id()
            ->string('name')
            ->string('email')->unique()
            ->string('password')
            ->hasMany('Refresh_tokens')
            ->datetime('created_at')->default('CURRENT_TIMESTAMP')
            ->datetime('updated_at');
    },

    'Refresh_tokens' => function ($model) {
        $model->id()
            ->string('token')
            ->belongsTo('User')
            ->integer('revoked')->default(0)
            ->datetime('expires_at')
            ->datetime('created_at')->default('CURRENT_TIMESTAMP')
            ->datetime('updated_at');
    },
];
