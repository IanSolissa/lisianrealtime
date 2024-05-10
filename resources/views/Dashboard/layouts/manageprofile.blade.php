@extends('Dashboard.layouts.homepage')
@section('manage_profile')
<div class="kontainer-manage-profile">

    <div id="manage-profile" class="manage-profile">
        <div class="kontainer">
        <div class="header-kontainer-manage-profile-group">
            <h1 onclick="closeManageProfile()" id="close-manage-profile" class="close-tambahkan-kontak">X</h1>
        </div>
        <ul>
            <li class="gambar-tambah-kontak-manageprofile">
                @if ($profile->photo)
                <img src="/upload_profile/{{$profile->photo}}" alt="Gambar">
                    
                @else
                <img src="/img/sidebar-kontak/profil.png" alt="Gambar">
                    
                @endif
            </li>
            <li class="form-createUser">
<h1>                Manage Profile</h1>
                <form enctype="multipart/form-data" action="/lisianchat/contact" method="post">
                    @csrf
                    @method('PUT')

                    Profile Name
                    <input name="name" value="{{ $profile->name }}">
                    
                    Profile Number
                    <input readonly name="number" value="{{ $profile->number }}">
                    
                    <input name="id_kontak" value="{{ auth()->user()->id }}" type="hidden">
                    <label for="photo">
<h3>Photo</h3>
                        <input name="photo" type="file">
                    </label>
                    <button type="submit">
                Submit
            </button>
        </form>
            </li>
            
        </ul>
    </div>
</div>


</div>
<script>
    let manageProfile=document.getElementById('manage-profile')
    
    function closeManageProfile(){        
manageProfile.style.display="none"
    }
</script>
@endsection