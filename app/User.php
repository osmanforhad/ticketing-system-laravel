<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relation betweent user to comment
     *
     * which is one to many relation
     *
     * because one user can make many comment
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    } //end of the comments method

    /**
     * Relation betweent user to comment
     *
     * which is one to many relation
     *
     * because one user could buy many comment
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    } //end of the tickets method

} //end of the class