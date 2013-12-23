<?php

class ApiController extends BaseController {

	function beaconNotFound() {
		exit(Response::json(array('status' => false, 'message' => 'Beacon not registered'), 200));
	}

	function actionNotFound() {
		exit(Response::json(array('status' => false, 'message' => 'Action not available'), 200));
	}
	
	function checkAction($type, $trigger) {
		$action = Action::where('type', $type)->where('trigger_id', $trigger)->first();
		if($action)
			return $action;
		$this->actionNotFound();
	}

	function checkBeacon($uuid, $major, $minor) {
		$beacon = Beacon::where('uuid', $uuid)->where('major', $major)->where('minor', $minor)->first();
		if($beacon)
			return $beacon;	
		$this->beaconNotFound();
	}

	public function postBeacons() {
		$uuid = Input::get('uuid', NULL);
		$major = Input::get('major', NULL);
		$minor = Input::get('minor', NULL);
		(Input::get('state') == 1) ? $state = 2 : $state = 3;
		switch (Input::get('state', null)) {
			case '1':
				//enter region
				$state = 2;
				break;
			case '-1':
				//exit region
				$state = 3;
				break;
			default:
				$state = null;
				break;
		}

		$range = Input::get('range', NULL);
		$timestamp = Input::get('timestamp', NULL);

		$beacon = $this->checkBeacon($uuid, $major, $minor);
		$action = $this->checkAction($state, $beacon->id);
		
		//giff point to user ei?
		$point = new Point;
		$point->user_id = Session::get('user_id');
		$point->action_id = $action->id;
		$point->value = $action->value;
		$point->save();


		$response = array(
			'beacon' => $beacon->title,
			'message_title' => 'Hi',
			'message_text' => 'Welcome to our store. You just earned '.$action->value.' Points',
			'message_value' => '100'
			);
		return Response::json($response, 200);
	}
}