<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Models\Anggota_Grup;
class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penggunas=Pengguna::find(1);
        // dd($penggunas);
        $grups=Anggota_Grup::where('id_user',$penggunas->id)->get();
        
        $contacts=Contact::where('id_kontak',$penggunas->id)->get();
        $messages_roomchat=Message::where('penerima_id',$penggunas->id)->get();
        return view('Dashboard.layouts.homepage',[
            'grups'=>$grups,
            'messages'=>$messages_roomchat,
            'contacts'=>$contacts,
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
