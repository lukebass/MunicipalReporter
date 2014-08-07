<?php

class Marker extends Eloquent {

	protected $table = 'markers';

	public function problem()
    {
        return $this->belongsTo('Problem');
    }

}
