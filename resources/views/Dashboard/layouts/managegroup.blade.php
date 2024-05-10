<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Group</title>
    <link rel="stylesheet" href="/css/managegroup.css">
</head>

<body>
    <header>
        <nav class="nav-managegroup">
            <h1> Lisian Chat
            </h1>
        </nav>
    </header>
    
    <section class="manage-group">
        <form action="/lisianchat/grup/{{ $profile->id}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="kontainer-manage-group">
                
                <div class="content1-kontainer-manage-group">
@if ($profile->photo)
    
<img src="/profile_grup/{{ $profile->photo }}" alt="">  
@else
<img src="/default_profile/image.png" alt="">  
    
@endif
                    
                </div>
                
                <ul class="content2-kontainer-manage-group">
                    <li>
                        <div class="kontainer-content2-manage-group">
                            <label for="name">
                                Group Name : 
                                <input name="name" type="text" value="{{ $profile->name }}"> 
                            </label>
                    
                            <a href="/lisianchat">Exit</a>
                        </div>
                    </li>
                    <li>
                        <label for="photo">
                            Photo Group :
                            <input name="photo" type="file">
                        </label>
                    </li>
                    <li>
                        
                        <h5>Created At : {{ $profile->created_at }}  By : {{ $profile->pemilik->name }}</h5>
                    </li>
                    {{-- <button type="submit">Submit</button> --}}
                    {{-- </form> --}}
                </ul>
                
            </div>
            
            <section class="header-isigroup">
                <div class="kontainer-header-isigroup">
                    <a class="href" style="color: black;" href="/lisianchat/grup/{{ $profile->id }}/edit">
                        <h1>Manage Grup</h1>
                        </a>
                    <a href="/lisianchat/grup/{{ $profile->id }}/file" class="href" style="color: black;">
                        <h1>File</h1>
                    </a>
                    <a class="href" style="color: black;" href="/lisianchat/grup/{{ $profile->id }}/addmember">
                        <h1>Tambahkan Anggota</h1>
                        </a>
                </div>
            </section>
            
            @yield('member')
            @yield('addmember') 
            @yield('filegrup') 
    </section>
</body>

</html>
