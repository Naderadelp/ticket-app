<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if($this->include('tickets')){
            $users = User::with('tickets')->paginate(10);
        }else{
            $users = User::paginate(10);
        }
        return UserResource::collection($users);
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
        if($this->include('ticket')){
            $user = User::query()
            ->with('tickets')
            ->findOrFail($id);
        }else{
            $user = User::findOrFail($id);
        }
        return UserResource::make($user);
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
