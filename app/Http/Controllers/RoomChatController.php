<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class RoomChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return dd("masuk");
        $user=Pengguna::all();
        $messages=Message::all();
        return view('Dashboard.layouts.roomchat',[
            'user'=>$user,
            // 'Room'=>$room,
            'messages'=>$messages,
        ]);
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
        //
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
