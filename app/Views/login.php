<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?= base_url(); ?>images/logo3.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DE PERKASA</title>
    <link rel="stylesheet" href="">
    <style>* {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: #138a97;
    }
    
    .container {
        width: 785%;
        display: flex;
        max-width: 850px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }
    
    .login {
        width: 400px;
    }
    
    form {
        width: 250px;
        margin: 60px auto;
    }
    
    h1 {
        margin: 20px;
        text-align: center;
        font-weight: bolder;
        text-transform: uppercase;
    }
    
    hr {
        border-top: 2px solid #ffa12c;
    }
    
    p {
        text-align: center;
        margin: 10px;
    }
    
    .right img {
        width: 450px;
        height: 100%;
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }
    
    form label {
        display: block;
        font-size: 16px;
        font-weight: 600;
        padding: 5px;
    }
    
    input {
        width: 100%;
        margin: 2px;
        border: none;
        outline: none;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid gray;
    }
    
    button {
        border: none;
        outline: none;
        padding: 8px;
        width: 252px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        margin-top: 20px;
        border-radius: 5px;
        background: #0175e9;
    }
    
    button:hover {
        background: #0175e9;
    }
    
    
    @media (max-width: 880px) {
        .container {
            width: 100%;
            max-width: 750px;
            margin-left: 20px;
            margin-right: 20px;
        }
    
        form {
            width: 300px;
            margin: 20px auto;
        }
    
        .login {
            width: 400px;
            padding: 20px;
        }
    
        button {
            width: 100%;
        }
    
        .right img {
            width: 100%;
            height: 100%;
        }
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="login">
            <form action="<?= base_url('auth/auth'); ?>" method="post">
                <h1>Login</h1>
                <hr>
                <p>DE PERKASA FITNESS CENTER</p>
                <label for="">Username</label>
                <input name="username" type="text" placeholder="Masukan username">
                <label for="">Password</label>
                <input name="password" type="password" placeholder="Masukan Password">
                <button type="submit">login</button></a>
                <p>
                    <div class="register-link m-t-15 text-center">
                        <p>Belum Punya Akun ? <a href="<?= base_url(); ?>auth/register"> Daftar Disini</a></p>
                    </div>
                </p>
            </form>
        </div>
        <div class="right">
            <img src="<?= base_url(); ?>images/gym.jpg" alt="">
        </div>
    </div>
</body>

</html>
