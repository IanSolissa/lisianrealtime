<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="FormLogin">
        
        <header>
            <h1>
                <p>
                    Private    
                </p>
                <p class="chat">
                    
                    Chat
                </p>
            </h1>
        </header>

        {{-- Register --}}
        <div id="kontainer_register"  class="kontainer-formLogin">
            <ul>
                <li class="li-judul-formlogin">
                    <h1>Register</h1>
                </li>
                
                <li class="li-login">
                    <form class="login" action="/register" method="POST">
                        @csrf
                        <label for="number">Name
                            <input type="text" name="name">
                        </label>
                        <label for="number">Number
                            <input type="text" name="number">
                        </label>
                        <label for="password">
                            Password
                            <input type="password" name="password">
                        </label>
                        <h1 id="login">Login?</h1>
                        <div class="kontainer-submit">
                            
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>

        <div id=kontainer_login class="kontainer-formLogin">
            <ul>
                <li class="li-judul-formlogin">
                    <h1>Login</h1>
                </li>
                
                <li class="li-login">
                    <form class="login" action="/" method="POST">
                        @csrf
                        <label for="number">Number
                            <input type="text" name="number">
                        </label>
                        <label for="password">
                            Password
                            <input type="password" name="password">
                        </label>
                        <h1 id="register">Register?</h1>
                        <div class="kontainer-submit">
                            
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>

        <footer>
            footer
        </footer>
    </div>
</body>
<script src="/js/login.js"></script>


</html>
