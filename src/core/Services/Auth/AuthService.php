<?php
	
	namespace Core\Services\Auth;

	use Tymon\JWTAuth\JWTAuth;
	use Illuminate\Contracts\Auth\Guard;
	use Response;

	class AuthService
	{

		/**
		 * @var JWTAuth
		 */
		public $jwt;

		/**
		 * AuthService constructor.
		 *
		 * @param User $user
		 */
		public function __construct()
		{
			$this->jwt = app(JWTAuth::class);
		}

		/**
		 * Method to use Auth\Guard function
		 *
		 * @return \Laravel\Lumen\Application|mixed
		 */
		public function guard()
		{
			return app(Guard::class);
		}

		/**
		 * Return User object if token is valid
		 * else return error response
		 *
		 * @return mixed
		 */
		public function getUser()
		{
			$this->tryAuthenticatedUser();
			return $this->user();
		}

		/**
		 * Verification of the jwt token with specific exception response
		 *
		 * @return mixed
		 */
		public function tryAuthenticatedUser()
		{
			try {
				if (!$user = $this->jwt->parseToken()->authenticate())
					return Response::errorException('Error Exception');
			} catch (\Tymon\JWTAuth\Exceptions\TokenBlacklistedException $e) {
				return Response::errorException('The token has been blacklisted');
			} catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
				return Response::errorException('Token expired');
			} catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
				return Response::errorException('Token invalid');
			} catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
				return Response::errorException('Token absent');
			}
		}

		/**
		 * Get User object without check token
		 * If user don't exist response not found error
		 *
		 * @return mixed
		 */
		public function user()
		{
			$user = $this->guard()->user();
			if (!$user)
				return Response::errorNotFound("User not found");

			return $user;
		}

		/**
		 * Check token and invalidate it
		 * Response with message
		 *
		 * @param bool $force
		 * @return mixed
		 * @throws \Tymon\JWTAuth\Exceptions\JWTException
		 */
		public function invalidate($force = false)
		{
			$this->tryAuthenticatedUser();
			$this->jwt->parseToken()->invalidate($force);
			return Response::success('The token has been invalidated');
		}

		/**
		 * Refresh token and invalidate old token
		 *
		 * @param bool $force
		 * @return mixed
		 * @throws \Tymon\JWTAuth\Exceptions\JWTException
		 */
		public function refresh($force = false, $resetClaims = false)
		{
			$token = $this->jwt->parseToken()->refresh($force, $resetClaims);
			return Response::success(compact('token'));
		}
	}
