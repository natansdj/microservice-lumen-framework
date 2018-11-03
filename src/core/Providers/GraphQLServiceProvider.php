<?php

	namespace Core\Providers;

	use GraphQL;
	use Illuminate\Support\ServiceProvider;

	class GraphQLServiceProvider extends ServiceProvider
	{
		public function boot()
		{
			$this->bootConfig();
		}

		/**
		 * Load config
		 */
		protected function bootConfig()
		{
			$this->app->configure('graphql');
			$this->app->configure('graphql_type');
		}

		/**
		 * Register any application services.
		 *
		 * @return void
		 */
		public function register()
		{
			$this->registerProviders();
			$this->registerContractsQL();
			$this->registerTypeQL();

			//load alias TypeRegistry
			class_alias(\Core\Http\GraphQL\Type\TypeRegistry::class, 'TypeRegistry');
		}

		/**
		 * Register providers dependency
		 */
		protected function registerProviders()
		{

			$this->app->register(\Folklore\GraphQL\LumenServiceProvider::class);
		}

		/**
		 * Load Type of GraphQL without use config file
		 */
		protected function registerContractsQL()
		{
			if (app()->environment('graphql_type.contracts')) {
				$contracts = config('graphql_type.contracts');
				foreach ($contracts as $key => $contract) {
					GraphQL::addType($contract, $key);
				}
			}
		}

		/**
		 * Load Type of GraphQL without use config file
		 */
		protected function registerTypeQL()
		{
			if (app()->environment('graphql_type.model')) {
				$models = config('graphql_type.model');
				foreach ($models as $key => $model) {
					GraphQL::addType($model, $key);
				}
			}
		}
	}
