
<nav class="navbar_chat">
        {{ \Carbon\Carbon::setlocale('id') }}
        <div class="icon-kontak">
            <div class="photo-profile">
                <a class="redirect-profile" href="/lisianchat">
                    @if ($user->photo)
                    <img src="/upload_profile/{{ $user->photo }}" alt="">
                    
                    @else
                        <img src="/default_profile/image.png" alt="">
                    @endif
                </a>
            </div>
            <svg width="35px" class="cursor-pointer"  onclick="onlistContact()"  version="1.1" id="Layer_1" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="256px" height="256px" viewBox="0 0 54 64" enable-background="new 0 0 54 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Contact-book-2</title> <desc>Created with Sketch.</desc> <g id="Page-1" sketch:type="MSPage"> <g id="Contact-book-2" transform="translate(1.000000, 1.000000)" sketch:type="MSLayerGroup"> <path id="Shape_1_" sketch:type="MSShapeGroup" fill="none" stroke="#ffffff" stroke-width="2" d="M47,7h3c1.1,0,2,0.9,2,2v8 c0,1.1-0.9,2-2,2h-3"></path> <path id="Shape_2_" sketch:type="MSShapeGroup" fill="none" stroke="#ffffff" stroke-width="2" d="M47,24h3c1.1,0,2,0.9,2,2v8 c0,1.1-0.9,2-2,2h-3"></path> <path id="Shape_3_" sketch:type="MSShapeGroup" fill="none" stroke="#ffffff" stroke-width="2" d="M47,41h3c1.1,0,2,0.9,2,2v8 c0,1.1-0.9,2-2,2h-3"></path> <path id="Shape" sketch:type="MSShapeGroup" fill="none" stroke="#ffffff" stroke-width="2" d="M0,2c0-1.1,0.9-2,2-2h44 c1.1,0,2,0.9,2,2v58c0,1.1-0.9,2-2,2H2c-1.1,0-2-0.9-2-2V2L0,2z"></path> <path id="Shape_4_" sketch:type="MSShapeGroup" fill="none" stroke="#ffffff" stroke-width="2" d="M6,3v56"></path> <path id="Shape_5_" sketch:type="MSShapeGroup" fill="none" stroke="#ffffff" stroke-width="2" d="M20.8,38 c1.3-0.6,3.1-1.7,3.1-2.7c0-0.5-0.2-0.9-0.4-1c-2.5-1.4-2.9-5.8-3.1-5.8c-0.8,0-1.4-2.1-1.4-3.4c0-1.1,0.3-1.1,0.9-1.4v-0.2 c0-3.6,2.3-6.5,6-6.5s6.3,3,6.3,6.6v0.2c0.6,0.3,0.8,0.5,0.8,1.6c0,1.4-0.5,3.3-1.3,3.3c-0.2,0-0.8,4.3-3.2,5.7 c-0.2,0.1-0.4,0.3-0.4,0.8c0,1.2,1.9,2.2,3.2,2.8c1.6,0.8,8.7,1.5,8.7,9H11.9C11.9,39.5,18.8,39,20.8,38L20.8,38z"></path> </g> </g> </g></svg>

            <svg class="plus-message" onclick="onlistgroup()" width="65px" fill="#d1d1d1" viewBox="-3 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#d1d1d1"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>group</title> <path d="M20.906 20.75c1.313 0.719 2.063 2 1.969 3.281-0.063 0.781-0.094 0.813-1.094 0.938-0.625 0.094-4.563 0.125-8.625 0.125-4.594 0-9.406-0.094-9.75-0.188-1.375-0.344-0.625-2.844 1.188-4.031 1.406-0.906 4.281-2.281 5.063-2.438 1.063-0.219 1.188-0.875 0-3-0.281-0.469-0.594-1.906-0.625-3.406-0.031-2.438 0.438-4.094 2.563-4.906 0.438-0.156 0.875-0.219 1.281-0.219 1.406 0 2.719 0.781 3.25 1.938 0.781 1.531 0.469 5.625-0.344 7.094-0.938 1.656-0.844 2.188 0.188 2.469 0.688 0.188 2.813 1.188 4.938 2.344zM3.906 19.813c-0.5 0.344-0.969 0.781-1.344 1.219-1.188 0-2.094-0.031-2.188-0.063-0.781-0.188-0.344-1.625 0.688-2.25 0.781-0.5 2.375-1.281 2.813-1.375 0.563-0.125 0.688-0.469 0-1.656-0.156-0.25-0.344-1.063-0.344-1.906-0.031-1.375 0.25-2.313 1.438-2.719 1-0.375 2.125 0.094 2.531 0.938 0.406 0.875 0.188 3.125-0.25 3.938-0.5 0.969-0.406 1.219 0.156 1.375 0.125 0.031 0.375 0.156 0.719 0.313-1.375 0.563-3.25 1.594-4.219 2.188zM24.469 18.625c0.75 0.406 1.156 1.094 1.094 1.813-0.031 0.438-0.031 0.469-0.594 0.531-0.156 0.031-0.875 0.063-1.813 0.063-0.406-0.531-0.969-1.031-1.656-1.375-1.281-0.75-2.844-1.563-4-2.063 0.313-0.125 0.594-0.219 0.719-0.25 0.594-0.125 0.688-0.469 0-1.656-0.125-0.25-0.344-1.063-0.344-1.906-0.031-1.375 0.219-2.313 1.406-2.719 1.031-0.375 2.156 0.094 2.531 0.938 0.406 0.875 0.25 3.125-0.188 3.938-0.5 0.969-0.438 1.219 0.094 1.375 0.375 0.125 1.563 0.688 2.75 1.313z"></path> </g></svg>

            <h1 class="plus-message" onclick="onCreateContact()">+</h1>
        </div>

        {{-- searching --}}
        <div class="search-message">
            <div class="kotak-search">

                <input id="inputsearching" type="text">
            </div>
            <div class="submit-search">
                <button onclick='searching("inputsearching") ' class="cursor-pointer ">Search</button>
            </div>
            <div class="submit-search">
                <button onclick='closesearch()' class="cursor-pointer ">X</button>
            </div>
        </div>
        <div class="list-menu-sidebar">
            <div class="semua">
<button class="cursor-pointer " onclick="arsipchatgrup(true,'chat-grup',true,'chat-kontak',true)">Semua</button>
            </div>
            <div class="kontak">
                <button class="cursor-pointer " onclick="arsipchatgrup(false,'chat-grup',true,'chat-kontak',false)" >kontak</button>
            </div>
            <div class="Grup">
                <button class="cursor-pointer " onclick="arsipchatgrup(true,'chat-grup',false,'chat-kontak',false)">Grup</button>
            </div>
        </div>

        {{--  --}}
        @if ($grups)
            @foreach ($grups as $grup)
                <a href="/lisianchat/grup/{{ $grup->id_grup }}">

                    <div class="kontainer-kontak " id="chat-grup">
                        <div class="gambar-profile">
                            @if ($grup->grup->photo)
                                <img src="/profile_grup/{{ $grup->grup->photo }}" alt="Gambar">
                            @else
                                <img src="/default_profile/image.png" alt="Gambar">
                            @endif
                        </div>
                        <ul>
                            {{-- {{ $kontak }} --}}

                            <li ><input readonly class="nama-user listchat-grup" style="border: none;background:none;" value="{{ $grup->grup->name }}"></input></li>

                            {{-- <li>{{ $contacts[1] }}    </li> --}}
                            @if ($grup->grup->last_message != null)
                                <li>{{ $grup->grup->last_message }}</li>
                            @else
                                <li>"Tidak Ada Pesan Terbaru"</li>
                                {{-- <li>{{ $kontak->last_message }}</li> --}}
                            @endif
                            <li class="jam-pesan">{{ $grup->updated_at->diffForHumans() }}</li>
                        </ul>
                    </div>
                </a>
                {{-- @endif --}}
            @endforeach
        @endif

        @foreach ($percakapan_sidebar as $kontak)
            <a href="/lisianchat/{{ $kontak->number }}">

                <div class="kontainer-kontak" id="chat-kontak">
                    <div class="gambar-profile">
                        
                        @if ($kontak->profile->photo)
                                    
                        <img src="/upload_profile/{{ $kontak->profile->photo  }}" alt="Gambar">
                        @else
                        
                        <img src="/default_profile/image.png" alt="Gambar">
                        @endif
                    </div>
                    <ul>
                        {{-- {{ $kontak }} --}}

                        <li class="nama-user">{{ $kontak->name }}</li>

                        {{-- <li>{{ $contacts[1] }}    </li> --}}
                        @if ($kontak->last_messages != null)
                        @if ($kontak->message->message)
                            
                        <li>{{ $kontak->message->message }}</li>
                        @else
                        <li>{{ $kontak->message->path_file }}</li>

                        @endif
                        @else
                            <li>"Tidak Ada Pesan Terbaru"</li>
                            {{-- <li>{{ $kontak->last_message }}</li> --}}
                        @endif
                        <li class="jam-pesan">{{ $kontak->updated_at->diffForHumans() }}</li>
                    </ul>
                </div>
            </a>
            {{-- @endif --}}
        @endforeach
    </nav>


    {{-- List kontak --}}

    <div id="list-contact" class="list-contact">
        <div class="kontainer">
            <h1 onclick="closelistContact()" id="close-list-contact" class="close-list-kontak">X</h1>
            <ul class="ul-kontainer-list-contact">
                {{-- <li class="gambar-tambah-kontak">
            </li> --}}
                <li class="form-listUser">
                    <div class="kontianer-list-kontak">
                        <h1>
                            List Kontak
                        </h1>
                        <ul class="ul-search-list-kontak">
                            <li class="li-ul-search-list-kontak-input">
                                <input type="text">
                            </li>
                            <li class="li-ul-search-list-kontak-search cursor-pointer">
                                search
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="li3-ul-search-list-kontak">
                    @foreach ($contacts as $kontak)
                        <div class="kontainer-list-kontak">
                            <div class="kontainer-gambar-profile">

                                @if ($kontak->photo)
                                    <img class="gambar-profile-image"
                                        src="/upload_profile/{{ $kontak->profile->photo }}" alt="Gambar">
                                @else
                                    <img class="gambar-profile-image" src="/default_profile/image.png" alt="Gambar">
                                @endif
                            </div>
                            <ul class="ul-kontainer-list-kontak">
                                {{-- {{ $kontak }} --}}
                                <li class="nama-user">{{ $kontak->name }}</li>

                                {{-- <li>{{ $contacts[1] }}    </li> --}}

                                <li> Created At :{{ $kontak->created_at->diffForHumans() }}</li>
                                <li class="icon-list-kontak">
                                    <div>

                                        <a href="/lisianchat/{{ $kontak->number }}">
                                            <h3 class="position-abosolut">pesan(icon)</h3>
                                        </a>
                                        {{-- <a href="/lisianchat/{{ $kontak->number }}">
                                    <h3 class="position-abosolut">Edit</h3>
                                </a> --}}

                                        <h3 class="position-abosolut">delete(icon)</h3>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    @endforeach
                </li>


            </ul>
        </div>
    </div>
    {{-- End --}}

    {{-- List grup --}}

    <div id="list-group" class="list-group">
        <div class="kontainer">
            <h1 onclick="closelistgroup()" id="close-list-group" class="close-list-kontak">X</h1>
            <ul class="ul-kontainer-list-group">
                {{-- <li class="gambar-tambah-kontak">
            </li> --}}
                <li class="form-listUser">
                    <div class="kontianer-list-kontak">
                        <h1>
                            List Group
                        </h1>
                        <ul class="ul-search-list-kontak">
                            <li class="li-ul-search-list-kontak-input">
                                <input type="text">
                            </li>
                            <li class="li-ul-search-list-kontak-search cursor-pointer">
                                search
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="li3-ul-search-list-kontak">
                    @foreach ($grups as $kontak)
                        <div class="kontainer-list-kontak">
                            <div class="kontainer-gambar-profile">
                                @if ($kontak->photo)
                                    
                                <img class="gambar-profile-image" src="/profile_grup/{{ $kontak->photo }}" alt="Gambar">
                                @else
                                
                                <img class="gambar-profile-image" src="/default_profile/image.png" alt="Gambar">
                                @endif
                            </div>
                            <ul class="ul-kontainer-list-kontak">
                                {{-- {{ $kontak }} --}}

                                <li class="nama-user">{{ $kontak->grup->name }}</li>

                                {{-- <li>{{ $contacts[1] }}    </li> --}}

                                <li> Created At :{{ $kontak->created_at->diffForHumans() }}</li>
                                <li class="icon-list-kontak">
                                    <div>

                                        <a href="/lisianchat/grup/{{ $kontak->id }}">
                                            <h3 class="position-abosolut">pesan(icon)</h3>
                                        </a>
                                        {{-- <a href="/lisianchat/{{ $kontak->number }}">
                                    <h3 class="position-abosolut">Edit</h3>
                                </a> --}}

                                        <h3 class="position-abosolut">delete(icon)</h3>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    @endforeach
                </li>


            </ul>
        </div>
    </div>
    {{-- End --}}


    {{-- create - kontak --}}
    <div id="create-contact" class="create-contact">
        <div class="kontainer">
            <div class="header-kontainer-create-contact-group">
                <div class="redirect-create-contact">

                    <h1 id="item-redirect-kontak" class="header-item-create-contact-group" onclick="onCreateContact()">
                        Kontak</h1>
                    <h1 id="item-redirect-group" class="header-item-create-contact-group"
                        onclick="onCreateContactGroup()">Group</h1>
                </div>
                <h1 onclick="closeCreateContact()" id="close-create-contact" class="close-tambahkan-kontak">X</h1>
            </div>
            <ul>
                <li class="gambar-tambah-kontak">
                    <img src="/default_profile/image.png" alt="Gambar" width="100px" height="200px">
                </li>
                <li class="form-createUser">
                    <h1> Tambahkan Kontak</h1>
                    <form action="/lisianchat/contact" method="post">
                        @csrf

                        Nama Kontak
                        <input name="name">

                        Nomor Pengguna
                        <input name="number">
                        <input type="hidden" name="id_user">

                        <input name="id_kontak" value="{{ auth()->user()->id }}" type="hidden">

                        <button type="submit">
                            Submit
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>

    {{-- End --}}

    {{-- Create Group --}}

    <div id="create-contact-group" class="create-contact-group">
        <div class="kontainer">
            <div class="header-kontainer-create-contact-group">
                <div class="redirect-create-contact">

                    <h1 id="item2-redirect-kontak" class="header-item-create-contact-group"
                        onclick="onCreateContact()">Kontak</h1>
                    <h1 id="item2-redirect-Group" class="header-item-create-contact-group"
                        onclick="onCreateContactGroup()">Group</h1>
                </div>
                <h1 onclick="closeCreateContactGrup()" id="close-create-contact-group"
                    class="close-tambahkan-kontak-group">X</h1>
            </div>
            <ul>
                <li class="gambar-tambah-kontak-group">
                    <img src="/default_profile/image.png" alt="Gambar">
                </li>
                <li class="form-createUser-group">
                    <h1> Tambahkan Group</h1>
                    <form action="/lisianchat/grup" method="post">
                        @csrf
                        Nama Group
                        <input type="text" name="name">
                        <input type="hidden" name="owner" value="{{ auth()->user()->id }}">

                        {{-- Tambahkan Pengguna
                    <select name="number" id="">
                        <option readonly disabled selected>Select User </option>
                        @foreach ($contacts as $item)
                            
                        <option value="{{ $item->name }}">
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select> --}}


                        <button type="submit">
                            Submit
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>

    {{-- End Group --}}
    <script>
        let createContact = document.getElementById('create-contact')
        let listContact = document.getElementById('list-contact')
        let listGroup = document.getElementById('list-group')
        let createContactGroup = document.getElementById('create-contact-group')
        let itemheadercontact = document.getElementById('item-redirect-kontak')
        let itemheadergroup = document.getElementById('item-redirect-group')
        let item2headercontact = document.getElementById('item2-redirect-kontak')
        let item2headergroup = document.getElementById('item2-redirect-group')

        // Contact
        function onlistContact() {
            listContact.style.display = "flex"
        }

        function closelistContact() {
            listContact.style.display = "none"
        }


        function onlistgroup() {
            listGroup.style.display = "flex"
        }

        function closelistgroup() {

            listGroup.style.display = "none"
        }

        function onCreateContact() {
            createContact.style.display = "flex"
            createContactGroup.style.display = "none"
            itemheadercontact.style.background = '#818182'
            itemheadergroup.style.background = 'none'

        }

        function closeCreateContact() {
            createContact.style.display = "none"
        }

        // Group
        function onCreateContactGroup() {
            createContactGroup.style.display = "flex"
            createContact.style.display = "none"
            item2headercontact.style.background = 'none'
            item2headergroup.style.background = 'grey'
        }

        function closeCreateContactGrup() {
            createContactGroup.style.display = "none"
        }

        function arsipchatgrup(status,target,status2,target2,statusall){
            chatgrup=document.querySelectorAll("#"+target)
            chatkontak=document.querySelectorAll("#"+target2)
            if (statusall) {
                for (let index = 0; index < chatgrup.length; index++) {
                chatgrup[index].style.display="flex"
            }
            for (let index = 0; index < chatkontak.length; index++) {
                chatkontak[index].style.display="flex"
            }
                
            } else {
                if(status){
            for (let index = 0; index < chatgrup.length; index++) {
                chatgrup[index].style.display="flex"
            }
            for (let index = 0; index < chatkontak.length; index++) {
                chatkontak[index].style.display="none"
            }
}       
else{
    chatgrup=document.querySelectorAll("#"+target)
            for (let index = 0; index < chatgrup.length; index++) {
                chatgrup[index].style.display="none"
            }
            
            for (let index = 0; index < chatkontak.length; index++) {
                chatkontak[index].style.display="flex"
            }
}
                
            }
        }
    </script>
