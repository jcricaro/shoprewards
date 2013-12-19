<?php

class LoginController extends BaseController {

	public function postLogin() {
		try {
			$credentials = array(
			'email' => Input::get('username'),
			'password' => Input::get('password')
			);
			$user = Sentry::authenticate($credentials, false);
			return Response::json(array('status' => true));
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
			return Response::json(array('status' => 'Login field is required'));
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
			return Response::json(array('status' => 'Password field is required.'));
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
			return Response::json(array('status' => 'Wrong password, try again.'));
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
		    return Response::json(array('status' => 'User was not found.'));
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
			return Response::json(array('status' => 'User is not activated.'));
		}
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
			return Response::json(array('status' => 'User is suspended.'));
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
			return Response::json(array('status' => 'User is banned.'));
		}	
	}
}