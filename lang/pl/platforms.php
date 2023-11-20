<?php

return [
    'attributes' => [
        'name' => 'Nazwa',
    ],
    'actions' => [
        'create' => 'Dodaj platformę',
        'edit' => 'Edytuj platformę',
        'destroy' => 'Usuń platformę',
        'restore' => 'Przywróć platformę',
    ],
    'labels' => [
        'create_form_title' => 'Tworzenie nowej platformy',
        'edit_form_title' => 'Edycja platformy',
    ],
    'messages' => [
        'successes' => [
            'stored' => 'Dodano platformę :name',
            'updated' => 'Zaktualizowano platformę :name',
            'destroyed' => 'Usunięto platformę :name',
            'restored' => 'Przywrócono platformę :name',
        ]
    ],
    'dialogs' => [
        'soft_deletes' => [
            'title' => 'Usuwanie platformy',
            'description' => 'Czy na pewno usunąć platformę :name',
        ],
        'restore' => [
            'title' => 'Przywracanie platformy',
            'description' => 'Czy na pewno przywrócić platformę :name',
        ],
    ],
];
