<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if($this->include('author')){
            $tickets = Ticket::with('user')->paginate(10);
        }else{
            $tickets = Ticket::query()->paginate(10);
        }
        return TicketResource::collection($tickets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if($this->include('author')){
            $ticket = Ticket::with('user')->findOrFail($id);
        }else{
            $ticket = Ticket::findOrFail($id);
        }
        return  TicketResource::make($ticket);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
