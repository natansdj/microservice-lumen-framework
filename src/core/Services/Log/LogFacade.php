<?php
	
	namespace Core\Services\Log;

	use Illuminate\Support\Facades\Facade;

	class LogFacade extends Facade
	{
		protected static function getFacadeAccessor()
		{
			return 'service.log';
		}
	}
