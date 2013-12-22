<?php
class ActionType extends Eloquent {
	protected $table = "action_types";
	protected $fillable = array('id', 'text', 'trigger');

	public function action() {
		return $this->hasOne('Action');
	}
}