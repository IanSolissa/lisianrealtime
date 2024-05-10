<?php

namespace App\Http\Controllers;
use App\Models\Grup;
use App\Models\Contact;
use App\Models\Pengguna;
use App\Events\SendMessage;
use Illuminate\Support\Str;
use App\Models\Anggota_Grup;
use App\Models\Message_Grup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Break_;
use PHPUnit\Metadata\Api\Groups;
use Illuminate\Support\Facades\DB;
use Mockery\Generator\StringManipulation\Pass\Pass;

class GrupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
                'owner'=>'string|required',
            ]);
            Grup::create($validation);
            $last_grup= DB::table('grups')->where('owner',auth()->user()->id)->latest('id')->value('id');
            DB::table('anggota__grups')->insert([
                'id_grup' => $last_grup,
                'id_user' => auth()->user()->id,
                'admin'=>true,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
                
               ]);

            return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      
        $penggunas=Pengguna::find(auth()->user()->id);
        $listgroup=Anggota_Grup::where('id_user',auth()->user()->id)->latest('updated_at')->get();
   


        $anggota=Anggota_Grup::where('id_grup',$id)->where('id_user',auth()->user()->id)->get();
        $list_anggotagrup=Anggota_Grup::where('id_grup',$id)->get();
        $percakapan_sidebar=Contact::where('id_kontak',auth()->user()->id)->where('last_messages','!=',null)->latest('last_messages')->get();
       
        // dd($anggota);
        $grups=Grup::find($id);
      
        $percakapan=Message_Grup::where('id_grup',$grups->id)->get();
        $contacts=Contact::where('id_kontak',auth()->user()->id)->get();
        
        return view('Dashboard.layouts.roomchatgrup',[
            'user'=>$penggunas,
            'percakapan'=>$percakapan,
            'grups'=>$listgroup,
            'list_anggotagrups'=>$list_anggotagrup,
            'anggota'=>$anggota,
            'profile'=>$grups,
            'contacts'=>$contacts,
            'percakapan_sidebar'=>$percakapan_sidebar,    
     ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota=Anggota_Grup::where('id_grup',$id)->get();
       for ($i=0; $i <$anggota->count() ; $i++) { 
        $kontak[$i]=Contact::whereIn('id_user',[$anggota[$i]['id_user']])->get();
        
       }
       

        return view('Dashboard.layouts.layoutmanagegroup.managemember',[
            'profile'=>Grup::find($id),
            'anggota'=>$anggota,
            'kontak'=>$kontak,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
        $validation=$request->validate([
            'name'=>'required|string|max:20',
            'data'=>'required|array',
        ]);
        if($request->file()){
            $validation=$request->validate([
                'photo'=>'required|mimes:png,jpg,jpeg|max:1000',
            
            ]);
            $photogrup=$request->file('photo');
            $ekstension=$photogrup->extension();
            $finalname=date('Y-m-d-h-i-s').'.'.$ekstension;
            
            $photogrup->move('/home/lisianch/public_html/profile_grup/',$finalname);
            
            // $photogrup->move(public_path('profile_grup/'),$finalname);
            
            $databasegrup=Grup::find($id);
            $databasegrup->photo=$finalname;    
            $databasegrup->save();
            return back();  
        }
        foreach ($request->input('data') as $data ) {
           $data['id_user'];
           $data['admin'];
           Anggota_Grup::where('id_user',$data['id_user'])->update(['admin'=>$data['admin']]);
           Grup::where('id',$id)->update(['name'=>$request['name']]);
        }
        return back();
        // dd(Anggota_Grup::all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function message(Request $request){
                $request['message_grup']=$request['message'];
        
        if($request->file('path_file')){
            $upfile=$request->file('path_file');
            $ekstension=$upfile->extension();
            $finalname=date('y-m-d-h-i-s').'.'.$ekstension;
            $request['isfile']=true;
            
            // kalau misal nya ada pesan dari gambar tersebut
            if($request['message']){
                $validation=$request->validate([
                    'id_user' => "string|required",
                    'id_grup' => "string|required",
                    'path_file'=>'image|mimes:jpg,png,jpeg',
                    'isfile'=>'boolean|required',
                    'message_grup' => "string",
                    'message' => "string",
                ]); 
                $validation['path_file']=$finalname;
                DB::table('grups')->where('id',$validation['id_grup'])->update(['last_message'=>$validation['message']]);
                Anggota_Grup::where([
                    'id_user'=>auth()->user()->id,
                    'id_grup'=>$request['id_grup'],
                    ])->update(['updated_at'=>Carbon::now()]);
                Message_Grup::create([
                    'id_grup'=>$validation['id_grup'],
                    'user_id'=>$validation['id_user'],
                    'message'=>$validation['message'],
                    'path_file'=>$validation['path_file'],
                    'isfile'=>$validation['isfile'],
                ]);   

                $upfile->move('/home/lisianch/public_html/upload_grup/',$finalname);
                // $upfile->move(public_path('upload_grup/'),$finalname);
                
            return back();
                // dd($validation['path_file']);
            }
            // 
            $validation=$request->validate([
                'id_user' => "string|required",
                'id_grup' => "string|required",
                'path_file'=>'image|mimes:jpg,png,jpeg',
                'isfile'=>'boolean|required',
                // 'message_grup' => "string",
            ]);
            
            // Kalau misalnya gaada message
            $validation['path_file']=$finalname;
            Message_Grup::create([
                'id_grup'=>$validation['id_grup'],
                'user_id'=>$validation['id_user'],
                'path_file'=>$validation['path_file'],
                'isfile'=>$validation['isfile'],
            ]);
            $originalnamefile=$request->file('path_file')->getClientOriginalName();
            $originalnamefile=Str::limit($originalnamefile, 20, '...');
            
            DB::table('grups')->where('id',$validation['id_grup'])->update(['last_message'=>$originalnamefile]);
            DB::table('grups')->where('id',$validation['id_grup'])->update(['updated_at'=>Carbon::now()]);
            Anggota_Grup::where([
                'id_user'=>auth()->user()->id,
                'id_grup'=>$request['id_grup'],
                ])->update(['updated_at'=>Carbon::now()]);
    
            
            // dd("asd");

            $upfile->move('/home/lisianch/public_html/upload_grup/',$finalname);
            // $upfile->move(public_path('upload_grup/'),$finalname);
 
            // SendMessage::dispatch($request['user_id'],$request['message']);
            return back();
            
        }

        
        $validation=$request->validate([
            'message_grup' => "string|required",
            'id_user' => "string|required",
            'id_grup' => "string|required",
            'message' => "string|required",
        ]);


        DB::table('grups')->where('id',$validation['id_grup'])->update(['last_message'=>$validation['message']]);
        DB::table('grups')->where('id',$validation['id_grup'])->update(['updated_at'=>Carbon::now()]);
       
        Anggota_Grup::where([
            'id_user'=>auth()->user()->id,
            'id_grup'=>$request['id_grup'],
            ])->update(['updated_at'=>Carbon::now()]);
       
        
        Message_Grup::create([
            'id_grup'=>$validation['id_grup'],
            'user_id'=>$validation['id_user'],
            'message'=>$validation['message'],
        ]);
// dd($request['id_user']);
            broadcast(new SendMessage($request['id_user'],$request['message']))->toOthers();

        return redirect('lisianchat/grup/'.$request['id_grup']);
    }
public function addMember(string $id){
        $kontak=Contact::where('id_kontak',auth()->user()->id)->get();
        
        $memberGrup=Anggota_Grup::where('id_grup',$id)->get();
// $kandidat['data']=null;

        // dd($kontak[2]->profile->id);
        // dd($memberGrup[1]->pengguna->name);
        // dd(Anggota_Grup::where('id_user',3)->value('id_user'));
        $kandidat=array();
        $index=0;
        foreach ($kontak as $data) {
        //  echo $data->value('id_user');
        // dd(Anggota_Grup::all());
            if(Anggota_Grup::where('id_user',$data->profile->id)->where('id_grup',$id)->value('id_user') == null){


                $kandidat[$index]=$data;
            
            }
            $index+=1;
            
        }
        // dd($kandidat);
// dd(Anggota_Grup::where('id_user',$data->profile->id)->value('id_user'));
        return view('Dashboard.layouts.layoutmanagegroup.addMemberGroup',[
            'profile'=>Grup::find($id),
            'anggota'=>$kontak,
            'kandidat'=>$kandidat,
        ]);
    }
    public function file(string $id){
        $kontak=Contact::where('id_kontak',auth()->user()->id)->get();
        $memberGrup=Anggota_Grup::where('id_grup',$id)->get();
        
        return view('Dashboard.layouts.layoutmanagegroup.filegrup',[
            'profile'=>Grup::find($id),
            'anggota'=>$kontak,
            
        ]);
    }
    
}
