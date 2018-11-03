<?php
	return [
		/*
		 * Load Type graphQL
		 */
		'model' => [],

		/*
		 * Load contracts type
		 */
		'contracts' => [
			'PaginationMeta' =>  Core\Http\GraphQL\Type\PaginationMetaType::class,
			'Timestamp' =>  Core\Http\GraphQL\Type\TimestampType::class,
		],
	];