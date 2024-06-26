<?php

namespace App\Http\Controllers;

use App\Models\RoomChat;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $me = auth()->user()->id;
        $friend = $request->request_id;
        $room = RoomChat::where('name', $me . ":" . $friend)
            ->orWhere('name', $friend . ":" . $friend)->first();
        if ($room) {
            $dataroom = $room;
        } else {
            $dataroom = RoomChat::create([
                "name" => $me . ":" . $friend
            ]);
        }
        return response()->json([
            'succes' => true,
            'data' => $dataroom
        ]);
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
