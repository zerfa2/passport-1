<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Api</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <input type="text" name="email" id="email">
            <input type="password" name="password" id="password" placeholder="***********">
            <button type="submit" class="btn btn-primary" id="login">Ingresar</button>
        </form>
    </div>
    <script>
        (function(){
            'use-strict';
            const clientId=4;
            const clientSecret='T4Djp4JgWCY3Ohxgp3F3TkhqBd59eJwZVEAMfVLH';
            const grantType='password';

            let login = document.getElementById('login');
            login.addEventListener('click', e =>{
                e.preventDefault();
                fetch('http://apilaravel/oauth/token',{
                    method: 'POST',
                    body: JSON.stringify({
                        client_id: clientId,
                        client_secret: clientSecret,
                        grant_type: grantType,
                        username: document.getElementById('email').value,
                        password: document.getElementById('password').value
                    }),
                    headers: { 'Content-Type': 'application/json'}
                })
                .then(response =>{
                    return response.json();
                })
                .then(data => console.log(data));
                // const response = await fetch('https://apilaravel/oauth/token");
                // const jsonq = await response.json();
                console.log("yess");
            })
        })
    </script>
</body>
</html>