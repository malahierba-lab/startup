<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

//Facades
use Hash;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var string
     */
    protected $dates = ['deleted_at'];

    ////////////////////////////////////
    // RelationShips
    ////////////////////////////////////

    ////////////////////////////////////
    // Mutators
    ////////////////////////////////////

    /**
     * Set the format for the email
     *
     * @param   string  $value
     * @return  void
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = mb_strtolower($value, 'UTF-8');
    }

    /**
     * Set the format for the name
     *
     * @param   string  $value
     * @return  void
     */
    public function setNameAttribute($value)
    {
        $name = trim($value);
        $name = preg_replace('/\s\s+/', ' ', $name);

        $this->attributes['name'] = $name;
    }

    /**
     * Set the format for the username
     *
     * @param   string  $value
     * @return  void
     */
    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = mb_strtolower($value, 'UTF-8');
    }

    /**
     * Set the hash for the password
     *
     * @param   string  $value
     * @return  void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
