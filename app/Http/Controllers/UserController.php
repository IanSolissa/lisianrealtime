<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengguna;
use App\Events\SendMessage;
use App\Events\Testingevent;
use Illuminate\Http\Request;
use App\Broadcasting\MessageChannel;
use App\Broadcasting\TestingChannel;
// use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Redis;
use function Laravel\Prompts\password;
use function PHPUnit\Framework\returnValue;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // try {
        //     Redis::ping(); // Coba mengirim ping ke Redis
        //     echo "Koneksi ke Redis berhasil!";
        // } catch (\Exception $e) {
        //     echo "Gagal terkoneksi dengan Redis: " . $e->getMessage();
        // }

        // SendMessage::dispatch();

        // broadcast(new SendMessage())->via('reverb'); 
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
        
       
        
     $validation=$request->validate([
        'name'=>'string|required|max:20',
        'number'=>'|string|unique:penggunas',
        'password'=>'|string|required|max:15',
        
     ]
);
// dd("masuk sini");

$validation['password']=bcrypt($validation['password']);
    Pengguna::create($validation);
    // event(new SendMessage());
    return redirect('/');

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
     dd("masuk");
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
