

<div id="list-member-grup" class="list-member-grup">
    
    <ul class="ul-list-member-grup">
        <li class="content-ul-list-member-grup">
            <div class="kontainer-content-ul-list-member-group">
                <img class="gambar-ul-list-member-grup" src="/img/sidebar-kontak/profil.png" alt="Gambar" >
            </div>

            <div class="kontainer2-content-ul-list-member-group">
           <div>

               <h2>{{ $profile->name }}</h2>
               <h2 onclick="closelistmember()" class="cursor-pointer" style="color: red;">X</h2>
           </div>
           <h2>Owner:{{ $profile->pemilik->name }}</h2>
           <h2 class="tanggal-kontainer2-content-ul-list-member-group">{{ $profile->created_at }}</h2>
            </div>
            
        </li>
        <li class="content2-ul-list-member-grup">
            <div class="kontainer-content2-ul-list-member-grup">
                <input type="text">
                <button>search</button>
            </div>
        </li>
        <li class="content3-ul-list-member-grup">
            <div class="kontainer-content3-ul-list-member-grup">
                @foreach ($list_anggotagrups as $user)
    
            <ul class="ul-content3-ul-list-member-grup">
                @if ($user->pengguna->photo)
                <li class="li-ul-content3-ul-list-member-grup">
                    <img class="gambar-ul-content3-list-member-grup" src="/upload_profile/{{$user->pengguna->photo}}" alt="Photo Profile" >
                </li>    
                @else
                <li class="li-ul-content3-ul-list-member-grup">
                    <img class="gambar-ul-content3-list-member-grup" src="/img/sidebar-kontak/profil.png" alt="Photo Profile" >
                </li>    
                    
                @endif
                
                <li class="li2-ul-content3-ul-list-member-grup">
                    <p>{{ $user->pengguna->name }}
                        </p>
                        @if ($user->admin)
                        <p>Admin</p>
                        
                        @else
                        <p>Member</p>
                        
                        @endif
                        <p class="tanggal-li2-ul-content3-ul-list-member-group">
                            {{ $user->created_at }}
                        </p>
                    </li>
                    
                </ul>    
                @endforeach
            </div>
        </li>
    </ul>
  </div>
<script>
    function closelistmember() {
        let closeitem=document.getElementById('list-member-grup')
        closeitem.style.display="none";        
        
    }
    
</script>
  {{-- End --}}
