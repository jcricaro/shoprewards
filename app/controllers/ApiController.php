<?php

class ApiController extends BaseController {
	function postIndex() {
		return Response::json(array('status' => Request::get('foo')));
	}
}