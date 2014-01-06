<?php

class ApiController extends BaseController {

	function beaconNotFound() {
		exit(Response::json(array('status' => false, 'message' => 'Beacon not registered'), 200));
	}

	function actionNotFound() {
		exit(Response::json(array('status' => false, 'message' => 'Action not available'), 200));
	}

	function productNotFound() {
		exit(Response::json(array('status' => false, 'message' => 'Product not available'), 200));
	}

	function rewardNotFound() {
		exit(Response::json(array('status' => false, 'message' => 'Reward not available'), 200));
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

	function checkProduct($ean) {
		$product = Product::where('ean', $ean)->first();
		if($product)
			return $product;
		$this->productNotFound();
	}

	function checkReward($reward_id) {
		$reward = Reward::find($reward_id);
		if($reward)
			return $reward;
		$this->rewardNotFound();
	}

	public function getBeacons() {
		$response = array('status' => false);
		return Response::json($response);
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
		//get from store the points
		$store = new StoreRedeem;
		$store->store_id = $action->store_id;
		$store->user_id = Session::get('user_id');
		$store->value = $action->value;
		$store->save();


		$response = array(
			'message_type' => 0,
			'message_title' => 'Hi '.Session::get('first_name'),
			'message_text' => 'Welcome to our store. You just earned {0} Points',
			'message_value' => $action->value
			);
		return Response::json($response, 200);
	}

	public function postProducts() {
		$action = Input::get('action', null);
		$ean = Input::get('ean', null);
		$timestamp = Input::get('timestamp', null);

		$product = $this->checkProduct($ean);


		switch ($action) {
			case 'scan':
				$action = $this->checkAction(4, $product->id);
				$response = array(
					'message_type' => 1,
					'message_title' => 'Hi '.Session::get('first_name'),
					'message_text' => 'Scan of {0} just earned you {1} Points',
					'message_value' => array($product->title, $action->value)
					);
				break;
			case 'fav':
				$action = $this->checkAction(5, $product->id);
				$response = array(
					'message_type' => 2,
					'message_title' => 'Hi '.Session::get('first_name'),
					'message_text' => 'You earned {1} points by favorising {0}',
					'message_value' => array($product->title, $action->value)
					);
				break;
			case 'buy':
				$action = $this->checkAction(6, $product->id);
				$response = array(
					'message_type' => 4,
					'message_title' => 'Hi '.Session::get('first_name'),
					'message_text' => 'Thanks for buying {0}. It earned you {1} Points',
					'message_value' => array($product->title, $action->value)
					);
				break;
			case 'list':

				break;
			default:
				
				break;
		}

		return Response::json($response, 200);
	}

	public function postRewards() {
		$action = Input::get('action', null);

		switch ($action) {
			case 'redeem':

				$reward = $this->checkReward(Input::get('reward_id', null));

				if(User::find(Session::get('user_id'))->getCurrentPoints() >= Reward::find($reward->id)->value) {
					//okay the user can actually afford this shit
					$redeem = new Redeem;
					$redeem->user_id = Session::get('user_id');
					$redeem->reward_id = $reward->id;
					$redeem->value = $reward->value;

					if($redeem->save()) {
						$response = array(
							'message_type' => 5,
							'redemption_id' => $redeem->id,
							'qr_image' => 'hurdur'
							);
					}
				}
				else {
					$response = array(
						'status'	=> false,
						'message'	=> 'Not enough points'
						);
				}
				break;
			case 'list':
				break;
			default:
				
				break;
		}

		return Response::json($response, 200);
	}
}