<?php

return [
    'attributes' => [
        'title' => 'Tytuł',
        'description' => 'Opis',
        'image' => 'Zdjęcie',
        'genre' => 'Kategoria',
        'rating' => 'Ocena',
        'year' => 'Rok',
        'numberOfEpisodes' => 'Liczba odcinków',
        'platform' => 'Platforma',
        'platforms' => 'Platformy streamingowe',
        'type' => 'Typ',
        'categories' => 'Kategorie',
        'current_episode' => 'Postęp'
    ],
    'filters' => [
        'genres' => 'Kategoria filmu lub serialu',
    ],
    'actions' => [
        'create' => 'Dodaj show',
        'increment' => 'Inkrementuj liczbe obejrzanych odcinków',
    ],
    'labels' => [
        'create_form_title' => 'Tworzenie nowego show',
        'edit_form_title' => 'Edycja show',
    ],
    'messages' => [
        'successes' => [
            'stored' => 'Dodano show :title',
            'updated' => 'Zaktualizowano show :title',
            'image_deleted' => 'Zdjęcia dla show :title zostało usunięte',
            'destroyed' => 'Usunięto show :title',
            'restored' => 'Przywrócono show :title',
        ],
        'errors' => [
            'image_deleted' => 'Nie udało się usunąć zdjęcia dla show :title',
        ]
    ],
    'dialogs' => [
        'soft_deletes' => [
            'title' => 'Usuwanie show',
            'description' => 'Czy na pewno usunąć show :title',
        ],

        'image_delete' => [
            'soft_deletes' => [
                'title' => 'Usuwanie show',
                'description' => 'Czy na pewno usunąć show :title',
            ],
            'restore' => [
                'title' => 'Przywracanie show',
                'description' => 'Czy na pewno przywrócić show :title',
            ],
            'title' => 'Usuwanie zdjęcia',
            'description' => 'Czy na pewno usunąć zdjęcie dla show :title'
        ]
    ],
    'types' => [
        'movie' => 'Film',
        'series' => 'Serial',
    ]
];


