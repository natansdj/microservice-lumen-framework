<?php

	namespace Core\Http\Policies;


	abstract class AbstractPolicy
	{
		/**
		 * Check id user with id in request url
		 *
		 * @param int $userId
		 * @param string $id
		 * @return bool
		 */
		protected function checkId(int $userId, string $id) :bool
		{
			return strval($userId) === $id;
		}
	}
