<?php

namespace App\Listeners;

use App\Events\SendMessage;
use App\Models\Pengguna;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class SendMessageListener 
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle( $event): void
    {
//         echo "asdasd";
//  DB::table('penggunas')->insert([

//      'number'=>$event->number,
//      'name'=>$event->nama_pengguna,
//      'password'=>$event->password,
//  ]
//  );
        
    }
}
