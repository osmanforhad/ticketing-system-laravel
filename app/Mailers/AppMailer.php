<?php
namespace App\Mailers;

use App\Ticket;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer
{
    protected $mailer;
    protected $fromAddress = 'support@supportticket.dev';
    protected $fromName = 'Support Ticket';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];
    /**
     * AppMailer constructor.
     * @param $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * method for sending ticket info
     */
    public function sendTicketInformation($user, Ticket $ticket)
    {
        $this->to = $user->email;

        $this->subject = "[Ticket ID: $ticket->ticket_id] $ticket->title";

        $this->view = 'emails.ticket_info';

        $this->data = compact('user', 'ticket');

        return $this->deliver();
    } //end of the sendTicketInformation method

    /**
     * method for comment section
     */
    public function sendTicketComments($ticketOwner, $user, Ticket $ticket, $comment)
    {

    } //end of the sendTicketsComment

    /**
     * method for ticketStatus Notification
     */
    public function sendTicketStatusNotification($ticketOwner, Ticket $ticket)
    {

    } //end of the sendTicketStatusNotification method

    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function ($message) {
            $message->from($this->fromAddress, $this->fromName)
                ->to($this->to)->subject($this->subject);
        });
    } //end of the deliver method

} //end of the class