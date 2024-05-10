<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Type\Integer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('penggunas')->insert([
            'name' => "Yosua Solissa",
            'number' => '085774059572',
            
            'password' => Hash::make('password'),
        ]);

        // DB::table('users')->insert([
        //     'name' => "Yosua Solissa",
        //     'number' => '085774059572',
        //     'password' => Hash::make('password'),
        // ]);

        DB::table('penggunas')->insert([
            'name' => "Jelianvero Solissa",
            'number' => '085774059573',
            'password' => Hash::make('password'),
        ]);

        // DB::table('users')->insert([
        //     'name' => "Jelianvero Solissa",
        //     'number' => '085774059573',
        //     'password' => Hash::make('password'),
        // ]);

        DB::table('penggunas')->insert([
            'name' => "Anonymous",
            'number' => '085774059571',
            'password' => Hash::make('password'),
        ]);
        // DB::table('users')->insert([
        //     'name' => "Anonymous",
        //     'number' => '085774059571',
        //     'password' => Hash::make('password'),
        // ]);

        DB::table('penggunas')->insert([
            'name' => "Anonymous2",
            'number' => '085774059570',
            'password' => Hash::make('password'),
        ]);
        DB::table('contacts')->insert([
            'name'=>'Yosua Solissa',
            'number'=>'085774059572',
            'id_kontak'=>1,
            'id_user'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            
        ]);
        DB::table('contacts')->insert([
            'name'=>'Lisian',
            'number'=>'085774059573',
            'id_kontak'=>1,
            'id_user'=>2,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            
        ]);

        DB::table('contacts')->insert([
            'name'=>'Anonymous',
            'number'=>'085774059571',
            'id_kontak'=>1,
            'id_user'=>3,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            
        ]);
        DB::table('contacts')->insert([
            'name'=>'Vero',
            'number'=>'085774059573',
            'id_kontak'=>2,
            'id_user'=>2,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('room_chats')->insert([
            'user' => Str::random(10),
        ]);
        
        // ketika dia membuat grup, maka dia menjadi user pertama
        DB::table('grups')->insert([
            'name' => "Example Group",
            'owner' => 1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            // 'last_message' => "hai",
           ]);
        
        DB::table('anggota__grups')->insert([
            'id_grup' => 1,
            'id_user' => 1,
            'admin'=>true,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            // 'last_message' => "hai",
           ]);
        DB::table('anggota__grups')->insert([
            'id_grup' => 1,
            'id_user' => 2,
            'admin'=>false,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            // 'last_message' => "hai",
           ]);
        DB::table('anggota__grups')->insert([
            'id_grup' => 1,
            'id_user' => 3,
            'admin'=>false,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            // 'last_message' => "hai",
           ]);

        // DB::table('messages')->insert([
        //     'message' => "testing aja",
        //     'user_id' => 2,
        //     'penerima_id'=>1,
        // ]);
        // DB::table('messages')->insert([
        //     'message' => "wkwkwk",
        //     'user_id' => 2,
        //     'penerima_id'=>1,
        // ]);

        // DB::table('messages')->insert([
        //     'message' => "hai",
        //     'user_id' => 1,
        //     'penerima_id'=>3,
        //     'anonymous'=>1,
        // ]);
        // DB::table('messages')->insert([
        //     'message' => "iya kenapa",
        //     'user_id' => 3,
        //     'penerima_id'=>1,
        //     'anonymous'=>1,
        // ]);
        // DB::table('messages')->insert([
        //     'message' => "update",
        //     'user_id' => 3,
        //     'penerima_id'=>1,
        //     'anonymous'=>1,
        // ]);

        // DB::table('messages')->insert([
        //     'message' => "Anonymous 2",
        //     'user_id' => 4,
        //     'penerima_id'=>1,
        //     'anonymous'=>1,
        // ]);

    }
}
