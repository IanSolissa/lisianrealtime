<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use LengthException;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Pengguna;
use App\Models\RoomChat;
use App\Events\SendMessage;
use App\Events\Testingevent;
use App\Models\Anggota_Grup;
use App\Models\Grup;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use function React\Promise\all;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Broadcast;

class LandingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penggunas = Pengguna::find(auth()->user()->id);
        // dd($penggunas);
        $contacts = Contact::where('id_kontak', $penggunas->id)->get();


        $percakapan_sidebar = Contact::where('id_kontak', $penggunas->id)->where('last_messages', '!=', null)->latest('last_messages')->get();
        // dd($percakapan_sidebar);
       
        $listgroup=Anggota_Grup::where('id_user',auth()->user()->id)->latest('updated_at')->get();
    //    dd($listgroup[0]->grup);

        // dd($contacts->last_messages);
        $messages_roomchat = Message::where('penerima_id', $penggunas->id)->get();


        return view('Dashboard.layouts.homepage', [
            'grups' => $listgroup,
            'user' => $penggunas,
            // 'anonymous_chat'=>$anonymous_roomchat,
            'messages' => $messages_roomchat,
            'contacts' => $contacts,
            'percakapan_sidebar' => $percakapan_sidebar,
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
        $penggunas = Pengguna::find($request['user_id']);
        $request['isfile'] = false;
        // kondisi ketika ada file
        if ($request->file('path_file')) {

            $upfile = $request->file('path_file');
            $ekstension = $upfile->extension();
            $finalname = date('y-m-d-h-i-s') . '.' . $ekstension;
            $request['isfile'] = true;
            $request['path_file'] = $finalname;
            
            // kondisi kalau ada pesan dan file
            if ($request['message']) {

                $message = $request->validate(
                    [
                        'number' => 'required',
                        'user_id' => 'required',
                        'penerima_id' => 'required',
                        'message' => 'required',
                        'path_file' => 'image|mimes:jpg,png,jpeg',
                        'isfile' => 'boolean|required',

                    ]
                );
                
            }
            // kondisi kalau gaada pesan tapi ada gambar
            else {
                // dd($finalname);
                $message = $request->validate(
                    [
                        'number' => 'required',
                        'user_id' => 'required',
                        'penerima_id' => 'required',
                        'path_file' => 'image|mimes:jpg,png,jpeg',
                        'isfile' => 'boolean|required',

                    ]
                );
                // dd($message['path_file']);
            }
        } else {
            // kalau gaada gambar
            $message = $request->validate(
                [
                    'number' => 'required',
                    'user_id' => 'required',
                    'penerima_id' => 'required',
                    'message' => 'required',

                ]
            );
        }
        if ($request['isfile']) {
          
            if ($request['message']) {
                Message::create([
                    'number' => $message['number'],
                    'user_id' => $message['user_id'],
                    'penerima_id' => $message['penerima_id'],
                    'message' => $message['message'],
                    'path_file' => $finalname,
                    'isfile' => $message['isfile'],
                ]);
        
            } 
            else {
                Message::create([
                    'number' => $message['number'],
                    'user_id' => $message['user_id'],
                    'penerima_id' => $message['penerima_id'],
                    'path_file' => $finalname,
                    'isfile' => $message['isfile'],
                ]);
                
            }
            
            $upfile->move('/home/lisianch/public_html/upload_chat/',$finalname);
            // $upfile->move(public_path('upload_chat/'),$finalname);
        } else {
            Message::create($message);
            
        }
        

        // pengecekan sesi ke 2 ( mengecek apakah kontak tersebut sudah di simpan oleh opponent?)

        // Mengecek apakah penerima memiliki atau menyimpan nomor dari pengirim?
        $Contact_pengguna = Contact::where('id_kontak', $request['penerima_id'])->where('number', $penggunas->number)->value('number');
        // kalau gaada maka lakukan ini
        if ($Contact_pengguna == null) {
            // dd("kontak ini belum terdaftar di penerima");
            // membuat contact anonymouse di daftar kontak penerima
            Contact::insert([
                'number' => $penggunas->number,
                'name' => $penggunas->number,
                'id_kontak' => $request['penerima_id'],
                'id_user' => $request['user_id'],
                'anonymouse' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            // dd("berhasil dibuat");
        }

        // pengecekan sesi ke 3, memperbarui last chat

        // update last chat nya
        if ($request['user_id'] == $penggunas->id) {
            $last_chat = Message::where('penerima_id', $request['penerima_id'])->where('user_id', $request['user_id'])->latest('id')->value('id');
       
            Contact::where('number', $request['number'])->where('id_kontak', $request['user_id'])->update(['last_messages' => $last_chat]);
            Contact::where('number', $penggunas->number)->where('id_kontak', $request['penerima_id'])->update(['last_messages' => $last_chat]);
        }
        //broadcast 
        // dd($request['user_id']);
       if($request['isfile']){
        // dd($request);
        //    SendMessage::dispatch($request['user_id'], $request['message']);
           return redirect()->back();
        }
        SendMessage::dispatch($request['user_id'], $request['message']);
        // redirect kembali
        return redirect()->back();
        
    }

    // broadcast(new SendMessage($request['user_id'],$request['penerima_id'],$request['message'],$auth,$request['number']))->toOthers();
    // broadcast(new SendMessage($request['user_id'],$request['message']))->toOthers();
    // Broadcast::socket('/lisianchat/085774059572')->emit('pesan',$message )->withoutListeners()->toOthers();



    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $penggunas = Pengguna::find(auth()->user()->id);
      
        $grups=Anggota_Grup::where('id_user',auth()->user()->id)->latest('updated_at')->get();
   
        $contacts = Contact::where('id_kontak', $penggunas->id)->get();
        $percakapan_sidebar = Contact::where('id_kontak', $penggunas->id)->where('last_messages', '!=', null)->latest('last_messages')->get();
        $name_target = Contact::where('id_kontak', $penggunas->id)->where('number', $id)->value('name');
        
        $profile_target = Contact::where('id_kontak', $penggunas->id)->where('number', $id)->take(1)->get();


        $messages_roomchat = Message::where('penerima_id', $penggunas->id)->get();

        $id_pengirim = Pengguna::where('number', $id)->value('id');
        // dd($id_pengirim,$penggunas->id);
        if ($id_pengirim) {
            $isi_percakapan = Message::where('penerima_id', $penggunas->id)->where('user_id', $id_pengirim)
                ->orWhere('penerima_id', $id_pengirim)->where('user_id', $penggunas->id)->get();
        } else {
            return back();
        }


        // status percakapan
        $status_percakapan = Message::where('penerima_id', $penggunas->id)->where('user_id', $id_pengirim)
            ->orWhere('penerima_id', $id_pengirim)->where('user_id', $penggunas->id)->take(1)->get();
        // dd($status_percakapan);

        $nama_kontak = Pengguna::where('number', $id)->value('name');

        $nomor_target = $id;
        $anonymous_roomchat = Message::where('penerima_id', $penggunas->id)->where('anonymous', 1)->latest('id')->get();
        return view('Dashboard.layouts.roomchat', [
            // 'Room'=>$room,
            'user' => $penggunas,
            'profile_target' => $profile_target,
            'grups' => $grups,
            'Pengguna' => $penggunas->id,
            'contacts' => $contacts,
            'id_pengirim' => $id_pengirim,
            'messages' => $messages_roomchat,
            'percakapan' => $isi_percakapan,
            'nama_kontak' => $nama_kontak,
            'nomor_target' => $nomor_target,
            'status_percakapan' => $status_percakapan,
            'name_kontak' => $name_target,
            'anonymous_chat' => $anonymous_roomchat,
            'percakapan_sidebar' => $percakapan_sidebar,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        // dd($penggunas);
        $contacts = Contact::where('id_kontak', $id)->get();
        $penggunas = Pengguna::find($id);
        $percakapan_sidebar = Contact::where('id_kontak', $id)->where('last_messages', '!=', null)->latest('last_messages')->get();
        // dd($percakapan_sidebar);
        $grups = Anggota_Grup::where('id_user', $id)->get();

        // dd($contacts->last_messages);
        $messages_roomchat = Message::where('penerima_id', $id)->get();


        return view('Dashboard.layouts.manageprofile', [
            'grups' => $grups,
            'user' => $penggunas,
            // 'anonymous_chat'=>$anonymous_roomchat,
            'messages' => $messages_roomchat,
            'contacts' => $contacts,
            'percakapan_sidebar' => $percakapan_sidebar,
            'profile' => Pengguna::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user()->name;
        $rules = [
            'name' => 'string||required',
            'photo' => 'image|mimes:jpg,png,jpeg|file',
        ];
        $validation = $request->validate($rules);

        if ($request->file('photo')) {



            $UPfoto = $request->file('photo');
            $ekstension = $UPfoto->extension();
            $FinalFoto = date('Y-m-d-h-i-s') . '.' . $ekstension;

            $UPfoto->move('/home/lisianch/public_html/upload_profile/', $FinalFoto);
            // $UPfoto->move(public_path('upload_profile/'),$FinalFoto);

            // $request->file('photo')->storePubliclyAs('images',$request->file('photo')->getClientOriginalName());

            $validation['photo'] = $FinalFoto;
        }

        Pengguna::where('id', auth()->user()->id)->update($validation);

        return redirect('/lisianchat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function anonymouschat(string $id, string $id_pengguna)
    {

        $penggunas = Pengguna::find(auth()->user()->id);
        // dd($penggunas);
        $contacts = Contact::where('id_kontak', $penggunas->id)->get();
        $name_target = Contact::where('id_kontak', $penggunas->id)->where('number', $id)->value('name');

        $messages_roomchat = Message::where('penerima_id', $penggunas->id)->get();

        $id_pengirim = Contact::where('id_kontak', auth()->user()->id)->where('number', $id)->value('id');

        if ($id_pengirim) {
            $isi_percakapan = Message::where('penerima_id', auth()->user()->id)->where('user_id', $id_pengirim)
                ->orWhere('penerima_id', $id_pengirim)->where('user_id', auth()->user()->id)->get();
        } else {
            $isi_percakapan = Message::where('penerima_id', auth()->user()->id)->where('user_id', $id_pengguna)
                ->orWhere('penerima_id', $id_pengguna)->where('user_id', auth()->user()->id)->get();
        }


        // status percakapan
        $status_percakapan = Message::where('penerima_id', auth()->user()->id)->where('user_id', $id_pengirim)
            ->orWhere('penerima_id', $id_pengirim)->where('user_id', auth()->user()->id)->value('message');


        $nama_kontak = Pengguna::where('number', $id)->value('name');


        $nomor_target = $id;
        $anonymous_roomchat = Message::where('penerima_id', $penggunas->id)->where('anonymous', 1)->latest('id')->get();
        return view('Dashboard.layouts.roomchat', [
            // 'Room'=>$room,
            'contacts' => $contacts,
            'id_pengirim' => $id_pengirim,
            'messages' => $messages_roomchat,
            'percakapan' => $isi_percakapan,
            'nama_kontak' => $nama_kontak,
            'nomor_target' => $nomor_target,
            'status_percakapan' => $status_percakapan,
            'name_kontak' => $name_target,
            'anonymous_chat' => $anonymous_roomchat,

        ]);
    }
}
