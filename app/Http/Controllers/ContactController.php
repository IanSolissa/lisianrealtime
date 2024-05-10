<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
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
        // dd($request['name']);
        // mengecek apakah pengguna sudah memiliki akun
        $pengguna=Pengguna::where('number',$request['number'])->value('number');
        // dd($pengguna);
        // mengecek apakah contact sudah tersedia atau belum
        $contacts=Contact::where('id_kontak',auth()->user()->id)->where('number',$request['number'])->value('number');
        //    dd($pengguna==$request['number'] && $contacts!=$request['number']);
        // dd($contacts);
        if($pengguna==$request['number' ] && $contacts!=$request['number']){  
            // dd('masuk');
            $request['id_user']=Pengguna::where('number',$request['number'])->value('id');
            
            $validation=$request->validate([
                'number'=>'required',
                'name'=>'',
                'id_kontak'=>'required',
                'id_user'=>'required',
            ]);


            Contact::create($validation);
            // mengecek apakah pengguna yang mengirim ini sudah terdaftar di kontak nya penerima?

            return back();
        }
        
       else {
       return redirect()->back()
                    ->withErrors("Data Tidak Dapat Diterima");
        // dd("gak masuk");
        // return back();
       }

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
