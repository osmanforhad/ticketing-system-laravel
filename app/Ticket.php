<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'ticket_id', 'title', 'priority', 'message', 'status',
    ];

    /**
     * Relation between Tickect to Category
     *
     * which is one to one relation
     *
     * cause any tickct could one category only
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    } //end of the category method

    /**
     * Relation between Ticket to Comment
     *
     * which is one to many relation
     *
     * cause any ticket could many comment
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    } //end of the comments method

    /**
     * Relation between Ticket to user
     *
     * which is one to one relation
     *
     * cause one ticket can buy one user only
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    } //end of the user method

} //end of the class