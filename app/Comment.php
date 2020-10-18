<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'ticket_id', 'user_id', 'comment',
    ];

    /**
     * Relation between comment to Ticket
     *
     * which is one to one ralation
     *
     * cause any comment belognsto any specifice ticket only
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    } //end of the ticket method

    /**
     * Relation between comment to user
     *
     * which is one to one relation
     *
     * cause any comment doing any specifice user only
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    } //end of the user method

} //end of the class