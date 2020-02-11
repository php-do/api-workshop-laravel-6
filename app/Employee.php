<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	public $timestamps = false;

	 /**
     * @param $query
     * @param $params
     * @return mixed
     */
    public function scopeFilter($query, $params)
    {

        if ( isset($params['name']) && trim($params['name'] !== '') )
        {
            $query->where('name', 'LIKE', trim($params['name']) . '%');
        }

        if ( isset($params['email']) && trim($params['email'] !== '') )
        {
            $query->where('email', 'LIKE', trim($params['email']) . '%');
        }

        return $query;
    }
}
