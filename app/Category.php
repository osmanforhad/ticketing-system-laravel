<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
     *Relation between category to ticket
     *
     *which is one to many relation
     *
     * because one category would many tickect
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    } //end of the tickets method

} //end of the class