<?php

return [
    'singular' => 'Album',
    'plural' => 'Albums',
    'empty' => 'There are no Albums yet.',
    'count' => 'Albums count',
    'search' => 'Search',
    'select' => 'Select Image',
    'perPage' => 'Albums Per Page',
    'filter' => 'Search for Image',
    'actions' => [
        'list' => 'List all',
        'create' => 'Add Image',
        'show' => 'Show Image',
        'edit' => 'Edit Image',
        'delete' => 'Delete Image',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The Image has been created successfully.',
        'updated' => 'The Image has been updated successfully.',
        'deleted' => 'The Image has been deleted successfully.',
        'images_note' => 'Supported types: jpeg, png,jpg | Max File Size:10MB',
    ],
    'attributes' => [
        'name' => 'Album Name',
        'description' => 'Album Description',
        'image' => 'Image',

    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the Image ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
];
