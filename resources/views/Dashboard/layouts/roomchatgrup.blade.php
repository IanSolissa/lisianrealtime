@extends('Dashboard.Dashboardindex')
@section('roomchat')
    <script>
        function autoResize(textarea) {
            // Mendapatkan jumlah baris
            var rows = textarea.value.split('\n').length;

            // Mengatur tinggi textarea berdasarkan jumlah baris
            textarea.style.height = rows * 1.5 + 'em';
        }
    </script>

<section class="roomchat">
        @include('Dashboard.layouts.layoutmanagegroup.listmember')


        <div class="header-roomchat">
            
            <div class="profile-roomchat">
                @if ($profile->photo)
                    
                <img class="profile-roomchat-header" src="/profile_grup/{{ $profile->photo }}" alt="Gambar">
                @else
                <img class="profile-roomchat-header" src="/default_profile/image.png" alt="Gambar">
                    
                @endif
            </div>
            
            <div class="info-profile-roomchat">
                <ul>
                    <li>{{ $profile->name }}<br>online</li>
                </ul>
            </div>

            <div class="icon-profile-roomchat">
                <ul>
                    <li>Search</li>
                    <li class="cursor-pointer menu-target">
                        <h1 onclick="openUl()">:</h1>
                    </li>
                    
                </ul>
                
            </div>
            
            
            
        </div>
        <div id="kontainer-menu-target-kanan" class="kontainer-menu-target-kanan">
            <ul class="ul-menu-target">
                <li class="close-menu-target">
                    <p onclick="closeUl()" id="close-ul-menu-target">X</p>
                </li>
                <li class="cursor-pointer">
                    @if ($anggota[0]->admin )
                    <a style="color: aliceblue;text-decoration: none;" href="/lisianchat/grup/{{ $profile->id }}/edit">Manage Member</a>
                    @endif
                    
                </li>
                <li class="cursor-pointer">
                    <p onclick="onlistmember()">Lihat Member</p>
                </li>
                @if ($anggota[0]->admin == false)
                <li>
                    Keluar Grup
                    
                </li>
                @else
                <li>
                    Hapus Grup
                    
                </li>
                @endif
            </ul>
        </div>


        @if ($profile->last_message == null)

        <div id="id_body_chat" class="body-chat-null">


                <div class="kontainer-chat-null">
                    <h1 class="lisian_chat">Lisian Chat</h1>
                    <h1 class="welcome_chat">Welcome To Lisian Chat</h1>
                    <h3 class="subwelcome_chat">Komunikasi Dengan Rekan mu, Dimana pun...</h3>

                </div>

                {{--  --}}

                {{-- penerima --}}

            </div>
        @else
            <div id="id_body_chat" class="body-chat">


                @foreach ($percakapan as $chat)
                    {{-- Pengirim --}}
                    {{-- jika yang menerima pesan adalah user --}}
                    @if ($chat->user_id != auth()->user()->id)
                    <div class="kontainer-chat">
                        <div class="gambar-profil-chat">
                            @if ($chat->pengguna->photo)
                                    
                            <img src="/upload_profile/{{ $chat->pengguna->photo }}" alt="Gambar">
                            @else
                            <img src="/default_profile/image.png" alt="Gambar">
                            
                            @endif
                        </div>
                        <div class="list-roomchat-kiri">
                            
                        </div>
                            <div class="chat-kiri">
                              @if ($chat->path_file)
                                  
                              <ul class="list-chat-kiri">
                                  <li class="nama-user-chatroom">
                                      {{ $chat->pengguna->name }}
                                      {{-- {{ $chat->pengguna->name }} --}}
                                  </li>
                                  <li id="BroadcastMessage" class="message-chatroom">
                                      <a href="/upload_grup/{{ $chat->path_file }}" download="/upload_grup/{{ $chat->path_file }}">
                                        <img width="200px" src="/upload_grup/{{ $chat->path_file }}" alt="">
                                      </a>
                                      
                                      {{-- {{ $chat->message }} --}}
                                  </li>
                                  <li id="BroadcastMessage" class="message-chatroom">
                                    <a target="blank" href="/upload_grup/{{ $chat->path_file }}" style="color: black;text-decoration: none;">lihat gambar</a>
                                      
                                      {{-- {{ $chat->message }} --}}
                                  </li>
                                  <li id="BroadcastMessage" class="message-chatroom">
                                      {{ $chat->message }}
                                      {{-- {{ $chat->message }} --}}
                                  </li>
                                  <li class="waktu-jam">
                                      {{ \Carbon\Carbon::parse($chat->created_at)->format('g:i a') }}
                                  </li>
                              </ul>
                              @else
                                  
                              <ul class="list-chat-kiri">
                                  <li class="nama-user-chatroom">
                                      {{ $chat->pengguna->name }}
                                      {{-- {{ $chat->pengguna->name }} --}}
                                  </li>
                                  <li id="BroadcastMessage" class="message-chatroom">
                                      {{ $chat->message }}
                                      {{-- {{ $chat->message }} --}}
                                  </li>
                                  <li class="waktu-jam">
                                      {{ \Carbon\Carbon::parse($chat->created_at)->format('g:i a') }}
                                  </li>
                              </ul>
                              @endif
                            </div>

                        </div>
                    @else
                    <div class="kontainer-chat-kanan">
                        <div class="chat-kanan">
                            @if ($chat->path_file)
                            <ul class="list-chat-kanan">
                                <li class="nama-user-chatroom">
                                    {{ $chat->pengguna->name }}
                                    {{-- {{ $chat->pengguna->name }} --}}
                                </li>
                                <li id="BroadcastMessageKanan" class="message-chatroom-chatkanan">
                                    <a download="/upload_grup/{{ $chat->path_file }}">
                                        <img width="200px" src="/upload_grup/{{ $chat->path_file }}" alt="">
                                      </a>
                                    {{-- {{ $chat->message }} --}}
                                </li>
                                <li id="BroadcastMessageKanan" class="message-chatroom-chatkanan">
                                    {{ $chat->message }}
                                    {{-- {{ $chat->message }} --}}
                                </li>
                                <li class="waktu-jam">
                                    {{ \Carbon\Carbon::parse($chat->created_at)->format('g:i a') }}
                                </li>
                            </ul>
                            @else
                            {{-- Kalau Misalnya Gaada Gambar Cuman Text Aja --}}
                            <ul class="list-chat-kanan">
                                <li class="nama-user-chatroom">
                                    {{ $chat->pengguna->name }}
                                    {{-- {{ $chat->pengguna->name }} --}}
                                </li>
                                <li id="BroadcastMessageKanan" class="message-chatroom-chatkanan">
                                    {{ $chat->message }}
                                    {{-- {{ $chat->message }} --}}
                                </li>
                                <li class="waktu-jam">
                                    {{ \Carbon\Carbon::parse($chat->created_at)->format('g:i a') }}
                                </li>
                            </ul>
                            @endif    
                                
                            </div>
                            <div class="list-roomchat-kanan">

                            </div>


                            <div class="gambar-profil-chat">
                                @if ($chat->pengguna->photo)
                                    
                                <img src="/upload_profile/{{ $chat->pengguna->photo }}" alt="Gambar">
                                @else
                                <img src="/default_profile/image.png" alt="Gambar">
                                
                                @endif
                            </div>


                        </div>
                    @endif
                @endforeach
                <div id="kotak_broadcast" class="kontainer-chat">
                    <div class="gambar-profil-chat">
                        @if ($chat->pengguna->photo)
                        <img src="/upload_profile/{{ $chat->pengguna->photo }}" alt="Gambar">
                        @else
                        
                        <img src="/default_profile/image.png" alt="Gambar">
                        @endif
                    </div>
                    <div class="list-roomchat-kiri">

                    </div>
                    <div class="chat-kiri">
                        <ul class="list-chat-kiri">
                            <li class="nama-user-chatroom">
                                Pesan Baru
                            </li>
                            <li id="updatepesan" class="message-chatroom">

                            </li>
                            <li class="waktu-jam">
                                12.00pm
                            </li>
                        </ul>
                    </div>

                </div>
        @endif
        {{--  --}}

        {{--  --}}
        {{-- penerima --}}


        <form enctype="multipart/form-data" action="/lisianchat/grup/{{ $profile->id }}" id="form_kirimpesan" method="POST">

            @csrf

            
            <input type="hidden" name="message_grup" ></input>
            <input type="hidden"  name="id_user" value="{{ auth()->user()->id }}" placeholder="user_id">
            <input type="hidden" name="id_grup" value="{{ $profile->id }}" placeholder="Penerima">
            
                <div class="kirim-pesan-roomchat">
                    
                    <div class="kirim-file-roomchat">
                        <input type="file" name="path_file">
                    </div>

                    <div class="kontainer-pesan">
                        <textarea autofocus name="message" id="pesan_kirim" rows="1" oninput="autoResize(this)"></textarea>
                    </div>
                    <div class="kirim-chat">
                        <button id="submit_form" type="submit">kirim</button>
                    </div>
            </form>

            </div>
        <script>
            function focusToBottom() {
                var container = document.getElementById('id_body_chat');
                container.scrollTop = container.scrollHeight;

            }

            // Panggil fungsi setelah halaman dimuat
            window.onload = focusToBottom;
        </script>



    </section>

    {{-- Lisetener broadcast --}}

    @vite('resources/js/app.js')


    {{-- <script src="/js/Broadcast.js"></script> --}}
    <script>
        targetUl=document.getElementById('kontainer-menu-target-kanan')
        function closeUl() {
            targetUl.style.display='none'
        }
        function openUl() {
            targetUl.style.display='flex'
        }
        form = document.getElementById('submit_form')
        message = document.getElementById('pesan_kirim')

        testing_div = document.getElementById('testing_contain');
        input = document.getElementById('testing2');
        textarea = document.getElementById('testing');

        let shiftPressed = false;
        // alert(testing_div)

        message.addEventListener("keydown", function(event) {
            if (event.keyCode === 16) { // keyCode untuk tombol Shift adalah 16
                shiftPressed = true;
            }
        });
        message.addEventListener("keyup", function(event) {
            // sementara=textarea.value;
            // input.value=textarea.content         ;

            //   alert("sad")
            if (event.keyCode === 13 && shiftPressed === false) {
                form.click()
            }


            if (event.keyCode === 16) { // keyCode untuk tombol Shift adalah 16
                shiftPressed = false;
            } else if (event.keyCode === 13 && shiftPressed) { // keyCode untuk tombol Enter adalah 13
                // Tombol Enter ditekan bersamaan dengan Shift

            } else {

            }

        });
        function onlistmember(params) {
            let closelistmember=document.getElementById('list-member-grup')
            closelistmember.style.display="flex";
    
    }
        </script>
<script>
</script>



@endsection
