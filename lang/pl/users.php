<?php

return [
    'attributes' => [
        'name' => 'Imię i nazwisko',
        'email' => 'Email',
        'email_verified_at' => 'Email zweryfikowano',
        'roles' => 'Role',
    ],
    'actions' => [
        'assign_admin_role' => 'Ustaw rolę admina',
        'remove_admin_role' => 'Odbierz rolę admina',
        'assign_user_role' => 'Ustaw rolę użytkownika',
        'remove_user_role' => 'Odbierz rolę użytkownika',
    ],
    'messages' => [
        'successes' => [
            'admin_role_assigned' => 'Ustawiono rolę admina',
            'admin_role_removed' => 'Odebrano rolę admina',
            'user_role_assigned' => 'Ustawiono rolę użytkownika',
            'user_role_removed' => 'Odebrano rolę użytkownika',
        ]
    ]
];
