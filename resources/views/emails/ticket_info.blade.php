<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Support Ticket Information</title>
    </head>
    <body>
        <p>
            Thank you {{ucfirst($user->name)}} for contacting for our support team. A support ticket has been opened for you.
            You will be notified when a response is made by email. The details of your ticket are shown  below:
        </p>

    <p>Title: {{$ticket->title}}</p>
    <p>Priority: {{$ticket->priority}}</p>
    <p>Status: {{$ticket->status}}</p>

    <p>
        You can view the ticket any time at {{url('tickets/'.$ticket->ticket_id)}}
    </p>
    </body>
</html>