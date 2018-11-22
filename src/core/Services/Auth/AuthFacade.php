<?php
	
	namespace Core\Services\Auth;

	use Illuminate\Support\Facades\Facade;

	class AuthFacade extends Facade
	{
		protected static function getFacadeAccessor()
		{
			return 'service.auth';
		}
	}
