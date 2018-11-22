<?php

	namespace Core\Http\GraphQL\Type;

	use GraphQL\Type\Definition\Type;
	use Folklore\GraphQL\Support\Type as GraphQLType;

	class PaginationMetaType extends GraphQLType
	{
		protected $attributes = [
			'name' => 'PaginationMeta',
			'description' => 'Fields of meta pagination'
		];

		public function fields()
		{
			return [
				'total' => [
					'type' => Type::int(),
				],
				'per_page' => [
					'type' => Type::int(),
				],
				'current_page' => [
					'type' => Type::int(),
				],
				'last_page' => [
					'type' => Type::int(),
				],
				'first_page_url' => [
					'type' => Type::string(),
				],
				'from' => [
					'type' => Type::string(),
				],
				'last_page_url' => [
					'type' => Type::string(),
				],
				'next_page_url' => [
					'type' => Type::string(),
				],
				'path' => [
					'type' => Type::string(),
				],
				'prev_page_url' => [
					'type' => Type::string(),
				],
				'to' => [
					'type' => Type::string(),
				]
			];
		}
	}
