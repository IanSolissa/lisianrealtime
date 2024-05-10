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

        {{ \Carbon\Carbon::setlocale('id') }}
        <div class="header-roomchat">

            <div class="profile-roomchat">
                @if ($profile_target[0]->profile->photo)
                    <img class="profile-roomchat-header" src="/upload_profile/{{ $profile_target[0]->profile->photo }}"
                        alt="Gambar">
                @else
                    <img class="profile-roomchat-header" src="/default_profile/image.png" alt="Gambar">
                @endif
            </div>

            <div class="info-profile-roomchat">
                <ul>
                    <li>{{ $name_kontak }}<br>online</li>
                </ul>
            </div>

            <div class="icon-profile-roomchat">
                <ul>
                    <li>Manage Profile</li>
                    <li class="menu-target">
                        <h1>:</h1>
                    </li>
                </ul>

            </div>

        </div>
        <div class="kontainer-menu-target-kanan">
            <ul class="ul-menu-target">
                <li class="close-menu-target">
                    <p>X</p>
                </li>
                <li>
                    <p>Hapus Kontak</p>
                </li>
                <li>
                    Hapus Chat

                </li>
            </ul>
        </div>


        @if ($status_percakapan == null)
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
                    @if ($chat->penerima->id == $Pengguna)
                        {{-- @if ($chat->anonymous)
                            {{ $chat->message }}
                        @endif --}}
                        @if ($chat->path_file)
                        
                        <div class="kontainer-chat">
                            <div class="gambar-profil-chat">
                                @if ($user->photo)
                                    <img class="profile-roomchat-header" src="/upload_profile/{{ $user->photo }}"
                                        alt="Gambar">
                                @else
                                    <img class="profile-roomchat-header" src="/default_profile/image.png" alt="Gambar">
                                @endif
                            </div>
                            <div class="list-roomchat-kiri">

                            </div>
                            <div class="chat-kiri">
                                <ul class="list-chat-kiri">
                                    <li class="nama-user-chatroom">
                                        {{ $chat->pengguna->name }}
                                    </li>
                                    <li id="BroadcastMessage" class="message-chatroom">
                                        @if ($chat->message)
                                        <a  href="/upload_chat/{{ $chat->path_file }}" download="/upload_chat/{{ $chat->path_file }}">
                                            <img width="200px" src="/upload_chat/{{ $chat->path_file }}" alt="">
                                          </a>
                                          <a target="__blank" class="href_black" href="/upload_chat/{{ $chat->path_file }}">
                                              <h5 >lihat gambar</h5>
                                            </a>
                                          {{ $chat->message }}
                                        @else
                                        <a href="/upload_chat/{{ $chat->path_file }}" download="/upload_chat/{{ $chat->path_file }}">
                                            <img width="200px" src="/upload_chat/{{ $chat->path_file }}" alt="">
                                          </a>
                                          <a target="__blank" class="href_black" href="/upload_chat/{{ $chat->path_file }}">
                                              <h5 >lihat gambar</h5>
                                            </a>
                                        @endif
                                    </li>
                                    <li class="waktu-jam">
                                        {{ \Carbon\Carbon::parse($chat->created_at)->locale('IDN')->format('g:i a') }}
                                    </li>
                                </ul>
                            </div>

                        </div>
                        @else
                        <div class="kontainer-chat">
                            <div class="gambar-profil-chat">
                                @if ($user->photo)
                                    <img class="profile-roomchat-header" src="/upload_profile/{{ $user->photo }}"
                                        alt="Gambar">
                                @else
                                    <img class="profile-roomchat-header" src="/default_profile/image.png" alt="Gambar">
                                @endif
                            </div>
                            <div class="list-roomchat-kiri">

                            </div>
                            <div class="chat-kiri">
                                <ul class="list-chat-kiri">
                                    <li class="nama-user-chatroom">
                                        {{ $chat->pengguna->name }}
                                    </li>
                                    <li id="BroadcastMessage" class="message-chatroom">
                                        {{ $chat->message }}
                                    </li>
                                    <li class="waktu-jam">
                                        {{ \Carbon\Carbon::parse($chat->created_at)->locale('IDN')->format('g:i a') }}
                                    </li>
                                </ul>
                            </div>

                        </div>
                        @endif
                    @else
                        {{-- @if ($chat->anonymous)
                            {{ $chat->message }}
                        @endif --}}

                        @if ($chat->path_file)
                            <div class="kontainer-chat-kanan">

                                <div class="chat-kanan">
                                    <ul class="list-chat-kanan">
                                        <li class="nama-user-chatroom">
                                            {{ $chat->pengguna->name }}
                                        </li>
                                        <li id="BroadcastMessageKanan" class="message-chatroom-chatkanan">
                                            @if ($chat->message)
                                            <a  href="/upload_chat/{{ $chat->path_file }}" download="/upload_chat/{{ $chat->path_file }}">
                                                <img width="200px" src="/upload_chat/{{ $chat->path_file }}" alt="">
                                              </a>
                                              <a target="__blank" class="href_black" href="/upload_chat/{{ $chat->path_file }}">
                                                  <h5 >lihat gambar</h5>
                                                </a>
                                              {{ $chat->message }}
                                            @else
                                            <a href="/upload_chat/{{ $chat->path_file }}" download="/upload_chat/{{ $chat->path_file }}">
                                                <img width="200px" src="/upload_chat/{{ $chat->path_file }}" alt="">
                                              </a>
                                              <a target="__blank" class="href_black" href="/upload_chat/{{ $chat->path_file }}">
                                                  <h5 >lihat gambar</h5>
                                                </a>
                                            @endif
                                        </li>
                                        <li class="waktu-jam">
                                            {{ \Carbon\Carbon::parse($chat->created_at)->locale('id')->format('g:i a') }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="list-roomchat-kanan">

                                </div>


                                <div class="gambar-profil-chat">
                                    @if ($user->photo)
                                        <img class="profile-roomchat-header" src="/upload_profile/{{ $user->photo }}"
                                            alt="Gambar">
                                    @else
                                        <img class="profile-roomchat-header" src="/default_profile/image.png"
                                            alt="Gambar">
                                    @endif
                                </div>


                            </div>
                        @else
                            <div class="kontainer-chat-kanan">

                                <div class="chat-kanan">
                                    <ul class="list-chat-kanan">
                                        <li class="nama-user-chatroom">
                                            {{ $chat->pengguna->name }}
                                        </li>
                                        <li id="BroadcastMessageKanan" class="message-chatroom-chatkanan">
                                            {{ $chat->message }}
                                        </li>
                                        <li class="waktu-jam">
                                            {{ \Carbon\Carbon::parse($chat->created_at)->locale('id')->format('g:i a') }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="list-roomchat-kanan">

                                </div>


                                <div class="gambar-profil-chat">
                                    @if ($user->photo)
                                        <img class="profile-roomchat-header" src="/upload_profile/{{ $user->photo }}"
                                            alt="Gambar">
                                    @else
                                        <img class="profile-roomchat-header" src="/default_profile/image.png"
                                            alt="Gambar">
                                    @endif
                                </div>


                            </div>
                        @endif
                    @endif
                @endforeach


                {{-- pesan broadcast --}}
                <div id="kotak_broadcast" class="kontainer-chat">
                    <div class="gambar-profil-chat">
                        @if ($user->photo)
                            <img class="profile-roomchat-header" src="/upload_profile/{{ $user->photo }}" alt="Gambar">
                        @else
                            <img class="profile-roomchat-header" src="/default_profile/image.png" alt="Gambar">
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
                                {{ \Carbon\Carbon::now()->format('g:i a') }}
                            </li>
                        </ul>
                    </div>

                </div>
        @endif
        {{--  --}}

        {{--  --}}
        {{-- penerima --}}


        <form enctype="multipart/form-data" action="/lisianchat" id="form_kirimpesan" method="POST">

            @csrf

            <input type="hidden" name="number" value={{ $nomor_target }}>

            {{-- <input type="hidden" value="{{ $id_pengirim }}" name="user_id" placeholder="user_id">
                <input type="hidden" name="penerima_id" value="{{ $Pengguna   }}"> --}}
            <input type="hidden" value="{{ $Pengguna }}" name="user_id" placeholder="user_id">
            <input type="hidden" name="penerima_id" value="{{ $id_pengirim }}" placeholder="Penerima">

            <div class="kirim-pesan-roomchat">

                <div >
                    <input type="file" name="path_file" >
                </div>

                <div class="kontainer-pesan">
                    {{-- <input type="text">     --}}
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
            // if (sementara) {
            //     input.value += textarea.value + br
            //     sementara = false
            // } else {
            //     input.value = textarea.value
            // }
        });
    </script>




@endsection
