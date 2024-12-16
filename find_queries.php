<?php

// Example queries showing the flexibility we want:

// 1. Find users with specific posts
$users = $db->findMany('user', [
    'role_id' => 1
], [
    'select' => ['id', 'name'],
    'orderBy' => ['created_at', 'desc'],
    'include' => [
        'post' => [
            'where' => [
                'published_at' => ['>=', '2024-01-01'],
                'title' => ['LIKE', '%test%']
            ],
            'select' => ['id', 'title'],
            'orderBy' => ['published_at', 'desc'],
            'take' => 5
        ]
    ]
]);

// 2. Find role with active users who have published posts
$role = $db->findUnique('role', ['id' => 1], [
    'select' => ['id', 'name'],
    'include' => [
        'user' => [
            'where' => [
                'active' => true,
                'created_at' => ['>', '2024-01-01']
            ],
            'include' => [
                'post' => [
                    'where' => [
                        'published_at' => ['NOT NULL'],
                        'status' => 'published'
                    ],
                    'select' => ['title', 'content'],
                    'orderBy' => ['published_at', 'desc']
                ],
                'profile' => [
                    'select' => ['avatar']
                ]
            ]
        ]
    ]
]);

// 3. Complex nested query with OR conditions
$posts = $db->findMany('post', [
    'OR' => [
        ['status' => 'published'],
        ['user_id' => $currentUserId]
    ]
], [
    'include' => [
        'comment' => [
            'where' => [
                'OR' => [
                    ['status' => 'approved'],
                    ['user_id' => $currentUserId]
                ]
            ],
            'include' => [
                'user' => [
                    'select' => ['name', 'avatar']
                ]
            ]
        ]
    ]
]);

// 4. Advanced filtering with multiple conditions
$users = $db->findMany('user', [], [
    'where' => [
        'AND' => [
            ['role_id' => 1],
            ['status' => 'active'],
            ['OR' => [
                ['email' => ['LIKE', '%@gmail.com']],
                ['email' => ['LIKE', '%@company.com']]
            ]]
        ]
    ],
    'include' => [
        'post' => [
            'where' => [
                'AND' => [
                    ['status' => 'published'],
                    ['views' => ['>', 100]],
                    ['OR' => [
                        ['featured' => true],
                        ['premium' => true]
                    ]]
                ]
            ]
        ]
    ]
]);

// 5. Relationship conditions with aggregates
$roles = $db->findMany('role', [], [
    'include' => [
        'user' => [
            'where' => [
                'posts_count' => ['>', 5]  // Requires support for relationship counts
            ],
            'include' => [
                'post' => [
                    'where' => [
                        'comments_count' => ['>', 10]
                    ]
                ]
            ]
        ]
    ]
]);