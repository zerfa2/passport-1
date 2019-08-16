<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>CLIENTE API</title>
</head>
<body>
        {{-- <br> --}}

    <div class="container justify-content-center mt-4">
        <h4>WEB SERVICE CLIENT</h4>
        <div class="row">
            <div class="col-md-4">
                <form action="{{ route('passport.clients.store')}}" method="POST">
                        @csrf
                    <div class="form-group">
                        <label for="">Name:</label>
                        <input type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Redirect:</label>
                        <input type="text" name="redirect">
                    </div>
        
                    <input type="submit" name="send" id="" value="Enviar" class="btn btn-success">
        
                </form>
        
                {{-- {{ $client }} --}}
            </div>
           
            <div class="table table-responsive mt-5">
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Redirect</td>
                            <td>Secret</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            
                        <tr>
                            <td>{{$client->id}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{$client->redirect}}</td>
                            <td>{{$client->secret}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
</body>
</html>