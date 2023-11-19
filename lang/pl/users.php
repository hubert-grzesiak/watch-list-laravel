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
        'assign_editor_role' => 'Ustaw rolę edytora',
        'remove_editor_role' => 'Odbierz rolę edytora',
    ],
    'messages' => [
        'successes' => [
            'admin_role_assigned' => 'Ustawiono rolę admina',
            'admin_role_removed' => 'Odebrano rolę admina',
            'editor_role_assigned' => 'Ustawiono rolę edytora',
            'editor_role_removed' => 'Odebrano rolę edytora',
        ]
    ]
];
