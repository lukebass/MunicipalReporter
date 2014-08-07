<?php

class Problem extends Eloquent {

	protected $table = 'problems';

	public function user()
    {
        return $this->belongsTo('User');
    }

    public function markers()
    {
        return $this->hasMany('Marker');
    }

}
