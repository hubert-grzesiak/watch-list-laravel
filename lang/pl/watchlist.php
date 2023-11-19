<?php

return [
    'attributes' => [
        'name' => 'Nazwa',
    ],
    'actions' => [
        'create' => 'Dodaj kategorię',
        'edit' => 'Edytuj kategorię',
        'destroy' => 'Usuń z listy',
        'restore' => 'Przywróć z usuniętych',
    ],
    'labels' => [
        'create_form_title' => 'Tworzenie nowego tytułu',
        'edit_form_title' => 'Edycja tytułu',
    ],
    'messages' => [
        'successes' => [
            'stored' => 'Dodano tytuł :name',
            'updated' => 'Zaktualizowano tytuł :name',
            'destroyed' => 'Usunięto tytuł :name',
            'restored' => 'Przywrócono tytuł :name',
        ]
    ],
    'dialogs' => [
        'soft_deletes' => [
            'title' => 'Usuwanie tytułu',
            'description' => 'Czy na pewno usunąć ten tytuł :name',
        ],
        'restore' => [
            'title' => 'Przywracanie tytułu',
            'description' => 'Czy na pewno przywrócić tytuł :name',
        ],
    ],
];
