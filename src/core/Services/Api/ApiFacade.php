<?php

	namespace Core\Services\Api;

	use Illuminate\Support\Facades\Facade;

	class ApiFacade extends Facade
	{
		protected static function getFacadeAccessor()
		{
			return 'service.api';
		}
	}
