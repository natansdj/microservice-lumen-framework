<?php


return [
    'prefix' => 'api/graph',

    'domain' => null,

    'routes' => '{graphql_schema?}',

    'controllers' => \Folklore\GraphQL\GraphQLController::class.'@query',

    'variables_input_name' => 'variables',

    'middleware' => [],

    'middleware_schema' => [
        'default' => [],
        'v1' => [],
    ],

    'headers' => [],

    'json_encoding_options' => 0,

    'schema' => env('API_STABLE_VERSION', 'default'),

    'schemas' => [
	    'default' => [
		    'query' => [],
		    'mutation' => []
	    ],
	    //Version Graph API
	    'v1' => [
		    'query' => [],
		    'mutation' => []
	    ]
    ],

    'resolvers' => [
        'default' => [
        ],
    ],

    'defaultFieldResolver' => null,

    'error_formatter' => [\Folklore\GraphQL\GraphQL::class, 'formatError'],

    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ]
];
