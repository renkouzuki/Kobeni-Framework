<?php

return [
    'models' => [
        'User' => [
            'fields' => [
                'id' => ['type' => 'string', 'primary' => true, 'default' => 'uuid()'],
                'name' => ['type' => 'string', 'unique' => true],
                'email' => ['type' => 'string', 'unique' => true],
                'password' => ['type' => 'string'],
                'profile' => ['type' => 'string', 'nullable' => true],
                'roleId' => ['type' => 'string'],
                'deleted_at' => ['type' => 'datetime', 'nullable' => true],
                'createdAt' => ['type' => 'datetime', 'default' => 'now()'],
                'updatedAt' => ['type' => 'datetime', 'updatedAt' => true]
            ],
            'relations' => [
                'role' => [
                    'type' => 'belongsTo',
                    'model' => 'Role',
                    'foreignKey' => 'roleId',
                    'references' => 'id'
                ],
                'auth_session' => [
                    'type' => 'hasMany',
                    'model' => 'Session'
                ]
            ],
            'indexes' => [
                'main_index' => ['name', 'email', 'roleId']
            ]
        ],

        'Role' => [
            'fields' => [
                'id' => ['type' => 'string', 'primary' => true, 'default' => 'uuid()'],
                'name' => ['type' => 'string', 'unique' => true]
            ],
            'relations' => [
                'users' => [
                    'type' => 'hasMany',
                    'model' => 'User'
                ],
                'permissions' => [
                    'type' => 'belongsToMany',
                    'model' => 'Permission',
                    'through' => 'RolePermission'
                ]
            ]
        ],

        'Invoice' => [
            'fields' => [
                'id' => ['type' => 'string', 'primary' => true, 'default' => 'uuid()'],
                'invoiceNumber' => ['type' => 'string', 'unique' => true],
                'date' => ['type' => 'datetime'],
                'expirationDate' => ['type' => 'datetime', 'nullable' => true],
                'status' => ['type' => 'string', 'default' => 'pending'],
                'subTotal' => ['type' => 'decimal', 'precision' => 10, 'scale' => 2],
                'deposit' => ['type' => 'decimal', 'precision' => 10, 'scale' => 2],
                'deliveryFee' => ['type' => 'decimal', 'precision' => 10, 'scale' => 2],
                'finalPayment' => ['type' => 'decimal', 'precision' => 10, 'scale' => 2],
                'bankName' => ['type' => 'string'],
                'accountName' => ['type' => 'string'],
                'accountNumber' => ['type' => 'string'],
                'customerId' => ['type' => 'string'],
                'deleted_at' => ['type' => 'datetime', 'nullable' => true],
                'createdAt' => ['type' => 'datetime', 'default' => 'now()'],
                'updatedAt' => ['type' => 'datetime', 'updatedAt' => true]
            ],
            'relations' => [
                'items' => [
                    'type' => 'hasMany',
                    'model' => 'InvoiceItem'
                ],
                'customer' => [
                    'type' => 'belongsTo',
                    'model' => 'Customer',
                    'foreignKey' => 'customerId',
                    'references' => 'id'
                ]
            ],
            'indexes' => [
                'date_number_index' => ['createdAt DESC', 'invoiceNumber']
            ]
        ]
    ]
];