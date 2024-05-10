<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $message=Message::all()
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
        // dd($request);
        $request['room_id']=1;
        // $request['user_id']=2;
        // $request['message']="testing aja";
        $message=$request->validate([

            'user_id'=>'required',
            'penerima_id'=>'required',
            'message'=>'required',
            ]
        );
        Message::create($message);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
$Pesan=Message::where('penerima_id',$id)->where('user_id',2)
                ->orWhere('penerima_id',2)->where('user_id',$id)->get();
return view('Dashboard.Chatting',[
    'pesan'=>$Pesan,
    // 'penerima'=>$Penerima,
    // 'pengirim'=>$Pengirim,
]);

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
