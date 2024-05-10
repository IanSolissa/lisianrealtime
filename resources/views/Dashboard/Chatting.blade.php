<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="background: grey">

        <h1>masuk</h1>
        <ul style="background: rgb(202, 200, 200)">
            @foreach ($pesan as $Pesan)
            @if ($Pesan->user_id==2)
            
            <li style="width: inherit; justify-content: end; align-items: center; padding: 20px; color: white; margin:20px; background: green; display: flex">
                {{-- dari : {{ $Pesan->pengguna->name }}<br> 
                ke :{{ $Pesan->penerima->name }}<br> --}}
                {{ $Pesan->message }}<br>
                {{ $Pesan->created_at->diffForHumans() }}
            </li>
            @else
            <li style="width: inherit; justify-content: start; align-items: center; padding: 20px; color: white; margin:20px; background: rgb(68, 81, 68); display: flex">
                {{ $Pesan->message }}<br>
                {{ $Pesan->created_at->diffForHumans() }}
            </li>
            
            @endif
            @endforeach
        </ul>
    </div>
    </body>
</html>