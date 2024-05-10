@extends('Dashboard.layouts.managegroup')
@section('member')
<section class="list-member-manage-group">
    <div class="kontainer-list-member-manage-group">
        <div class="content-list-member-manage-group">
            <h1>List Member {{ $profile->name }}</h1>
        </div>
        <div class="action-manage-Group">
            <div class="kontainer-action-manage-group">

                <a class="href" href="/lisianchat/grup/{{ $profile->id }}/addmember">
                        <h1>Add Member +</h1>
                </a>
                <button type="submit">Update</button>
                <h1 type="submit">Delete Grup</h1>
            </div>

        </div>
<div class="table-isi-member-group">
<table>
    {{-- Head --}}
    <tr>
         <th>No</th>
        <th>Name</th>
        <th>Number</th>
        <th>Join Grup</th>
        <th>Role</th>
        <th colspan="2">Action</th>
            </tr>
            {{-- Body --}}
            {{-- <form action="/lisianchat/grup/{{ $profile->id}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf --}}
            
           @foreach ($anggota as $user )
               @if($user->pengguna->id!=$profile->owner)
           <tr>
               <td> <input class="input-manage-group" type="text" readonly name="data[{{ $loop->iteration }}][id_user]" value="{{ $user->id }}"></td>
               <td>{{ $kontak[$loop->iteration-1][0]->name }}</td>
               <td>{{ $user->pengguna->number }}</td>
               <td>{{ $user->created_at->diffForHumans() }}</td>
               @if ($user->admin)
                   
               <td>Admin</td>
               @else
               <td>Member</td>
                   
               @endif
               <td>
                   <select name="data[{{ $loop->iteration }}][admin]"  type='number' id="">
                       <option readonly disabled value="">Add Role</option>
                       @if ($user->admin)
                       <option  value=1 selected>Admin</option>
                       <option  value=0>Member</option>
                       
                       @else
                       <option  value=1 >Admin</option>
                       <option  value=0 selected>Member</option>
                           
                       @endif
                       </select>
                </td>
                <td>Delete</td>
            </tr>
            @endif
            @endforeach
            
            
            
            
        </table>
    </form>
    </div>            
</div>
</section>
@endsection