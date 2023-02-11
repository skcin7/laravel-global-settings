<?php

/**
 * Global settings use-case-specific configuration may be specified here.
 *
 * @var array
 *
 * @key string database
 * @key string routes
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Global Settings - Database Configuration
    |--------------------------------------------------------------------------
    |
    | Settings for the database where the global settings are stored.
    |
    */

    'database' => [
        // The connection used where the global settings table is stored.
        // Set to null to use the default database configuration, or a string of the specific connection to use.
        'connection' => null,

        // Name of the table that stores the global settings.
        'table_name' => 'global_settings',

        // Column names of the individual global setting attributes.
        'key_column' => 'key',
        'value_column' => 'value',
        'type_column' => 'type',
    ],


    /*
    |--------------------------------------------------------------------------
    | Global Settings - Routes Configuration
    |--------------------------------------------------------------------------
    |
    | Settings for the routes of where the global settings may be managed/updated.
    |
    */

    'routes' => [
        // List of middleware that are checked before the global settings routes may be enabled.
        'middleware' => [
            'mastermind'
        ],

        // A string to prepend global settings named routes by.
        'name_prefix' => 'web.global_settings.',

        // Namespace where the global settings controllers are stored.
        'namespace' => 'Skcin7\LaravelGlobalSettings\Http\Controllers',

        // A prefix to prepend all global settings routes by in the HTTP request.
        'prefix' => 'global_settings',
    ],

];
