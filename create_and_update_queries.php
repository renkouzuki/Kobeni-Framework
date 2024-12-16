<?php

// Example of insert and update queries flexibility:

// 1. Create
$user = $db->create('user', [
    'name' => 'John Doe',
    'email' => 'john@example.com'
]);

// 2. Create with relationships
$user = $db->create('user', [
    'name' => 'John Doe',
    'email' => 'john@example.com'
], [
    'include' => [
        'post' => [
            [
                'title' => 'First Post',
                'content' => 'Content here'
            ],
            [
                'title' => 'Second Post',
                'content' => 'More content'
            ]
        ],
        'role' => 'admin-role-id'  // For belongsTo relationships
    ],
    'return' => true  // Return the created record with relationships
]);

// 3. Batch create
$users = $db->create('user', [
    ['name' => 'John', 'email' => 'john@example.com'],
    ['name' => 'Jane', 'email' => 'jane@example.com']
]);

// 4. Update with conditions
$db->update('user', 
    ['role_id' => 'admin-role-id'],  // where condition
    ['status' => 'active'],          // data to update
    ['return' => true]               // options
);

// 5. Update with relationships
$db->update('user', 'user-id', [
    'name' => 'Updated Name'
], [
    'include' => [
        'projects' => [
            'sync' => true,           // Clear existing relationships
            'attach' => ['project-1', 'project-2']  // Add new relationships
        ],
        'posts' => [
            [
                'id' => 'post-1',     // Update existing post
                'title' => 'Updated Title'
            ],
            [                         // Create new post
                'title' => 'New Post',
                'content' => 'Content'
            ]
        ]
    ]
]);