<?php

return [
    'plural' => 'Reasons',
    'trashedplural' => 'Deleted Reasons',
    'singular' => 'Reason',
    'empty' => 'There are no Reasons',
    'select' => 'Select Reason',
    'perPage' => 'Count Results Per Page',
    'reason' => 'How did you know us',
    'actions' => [
        'list' => 'List Reasons',
        'show' => 'Show Reason',
        'create' => 'Create Reason',
        'new' => 'New',
        'edit' => 'Edit Reason',
        'delete' => 'Delete Reason',
        'trashed' => 'List Deleted Reasons',
        'restore' => 'Restore Reason',
        'force' => 'Force Delete Reason',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The Reason has been created successfully.',
        'updated' => 'The Reason has been updated successfully.',
        'deleted' => 'The Reason has been deleted successfully.',
        'restored' => 'The Reason has been restored successfully.',
        'fdeleted' => 'The Reason has been deleted permanently successfully.',
    ],
    "attributes" => [
        'reason' => 'Reason',
        'created_at' => 'Created at',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the Reason?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'force' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the Reason permanently?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        "restore" => [
            'title' => 'Attention !',
            'info' => 'Are you sure you want to restore the Reason?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ]
    ],
];
