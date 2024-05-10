@extends('Dashboard.Dashboardindex')
@section('homepage')
<div class="header-roomchat">
    <div class="profile-roomchat">
        @if ($user->photo)
            
        <img class="profile-roomchat-header" src="/upload_profile/{{ $user->photo }}" alt="Gambar">
        @else
        <img class="profile-roomchat-header" src="/default_profile/image.png" alt="Gambar">
            
        @endif
    </div>
    <div class="info-profile-roomchat">
        <ul>

            <li>{{$user->name }}<br>{{ auth()->user()->number }}</li>
        </ul>
    </div>
    <div class="icon-profile-roomchat">
        <ul>
            <a href="/lisianchat/{{ auth()->user()->id }}/edit">

                <li><button class="cursor-pointer">Manage Profile</button></li>
            </a>
            <li><form action="/logout" method="post">
            @csrf
                <button type="submit">Log Out</button></form>
                </li>
        </ul>
    </div>
</div>


<div id="id_body_chat" class="body-chat-null-homepage">
           

    <div class="kontainer-chat-null-homepage">
        <h1 class="lisian_chat-homepage">Lisian Chat</h1>
        <h1 class="welcome_chat-homepage">Welcome To Lisian Chat</h1>
        <h3 class="subwelcome_chat-homepage">Komunikasi Dengan Rekan mu, Dimana pun...</h3>
        
    </div>

    {{--  --}}

    {{-- penerima --}}

</div>
@vite('resources/js/app.js')

@endsection