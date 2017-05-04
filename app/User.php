<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public static $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6'
    ];

    public function scopeSearch($query, $params)
    {
        return $query->when(!empty($params['q']), function ($query) use ($params) {
            return $query->where('name', 'like', '%' . $params['q'] . '%')
                ->orWhere('email', 'like', '%' . $params['q'] . '%');
        });   
    }
}
