<?php
	
	namespace Core\Services\ACL;

	use Illuminate\Support\Facades\Facade;

	class ACLFacade extends Facade
	{
		protected static function getFacadeAccessor()
		{
			return 'service.acl';
		}
	}
