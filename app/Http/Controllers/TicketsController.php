<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mailers\AppMailer;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TicketsController extends Controller
{

    /**
     * constructor method
     */
    public function __construct()
    {
        $this->middleware('auth');
    } //end of the constructor method

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate(10);
        return view('tickets.index', compact('tickets'));
    } //end of the index method

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('tickets.create', compact('categories'));
    } //end of the create method

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'message' => 'required',
        ]);

        $ticket = new Ticket([
            'title' => $request->input('title'),
            'user_id' => Auth::user()->id,
            'ticket_id' => strtoupper(str_random(10)),
            'category_id' => $request->input('category'),
            'priority' => $request->input('priority'),
            'message' => $request->input('message'),
            'status' => "Open",
        ]);

        $ticket->save();

        //$mailer->sendTicketInformation(Auth::user(), $ticket);

        return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
    } //end of the store method

    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('tickets.user_tickets', compact('tickets'));
    } //end of the userTickets method

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        return view('tickets.show', compact('ticket'));
    } //end of the show method

} //end of the class