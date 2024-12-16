<?php

use KobeniFramework\Database\Schema\Schema;

return [
    'example' => function($model){
        $model->id()
        ->string('name')->unique()
        // ->text('text',true)
        ->datetime('created_at')->default('CURRENT_TIMESTAMP')
        ->datetime('updated_at');
    }

    // 'User' => function($model) {
    //     $model->id()
    //           ->string('name')->unique()
    //           ->string('email')->unique()
    //           ->string('password')
    //           ->belongsTo('Role') 
    //           ->hasMany('Post') 
    //           ->belongsToMany('Project', 'user_projects')
    //           ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //           ->datetime('updated_at');
    // },
    
    // 'Role' => function($model) {
    //     $model->id()
    //           ->string('name')->unique()
    //           ->string('description', true)
    //           ->hasMany('User')
    //           ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //           ->datetime('updated_at');
    // },
    
    // 'Post' => function($model) {
    //     $model->id()
    //           ->string('title')
    //           ->text('content')
    //           ->belongsTo('User')
    //           ->datetime('published_at', true)
    //           ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //           ->datetime('updated_at');
    // },
    
    // 'Project' => function($model) {
    //     $model->id()
    //           ->string('name')
    //           ->text('description', true)
    //           ->belongsToMany('User', 'user_projects')
    //           ->datetime('created_at')->default('CURRENT_TIMESTAMP')
    //           ->datetime('updated_at');
    // }
];
