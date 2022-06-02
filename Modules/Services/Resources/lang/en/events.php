<?php

return [
    'singular' => 'Event',
    'plural' => 'Events',
    'empty' => 'There are no Events yet.',
    'count' => 'Events count',
    'search' => 'Search',
    'select' => 'Select Event',
    'perPage' => 'Events Per Page',
    'filter' => 'Search for Event',
    'actions' => [
        'list' => 'List all',
        'create' => 'Add Event',
        'show' => 'Show Event',
        'edit' => 'Edit Event',
        'delete' => 'Delete Event',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The Event has been created successfully.',
        'updated' => 'The Event has been updated successfully.',
        'deleted' => 'The Event has been deleted successfully.',
        'images_note' => 'Supported types: jpeg, png,jpg | Max File Size:10MB',
    ],
    'attributes' => [
        'name' => 'Event Name',
        'description' => 'Event Description',
        'image' => 'Image',

    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete this Event ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
];
