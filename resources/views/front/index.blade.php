<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <title>Flipbook</title>
</head>
<body>
    <div id='con' class="container p-4">
        <div class="row g-4">
            @foreach ($data as $val)
                <div class="col-4 justify-content-center align-items-center d-flex">
                    <div class="card" style="width: 18rem;">
                        <img src="{{url('/images/'.$val->idbook.'/'.$val->imgname)}}" class="card-img-top">
                        <div class="card-body justify-content-center align-items-center d-flex">
                            <a href="{{url('/front/flipbook/'.$val->idbook)}}" class="open">{{$val->namebook}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://kit.fontawesome.com/97a4ddb345.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <script src="{{url('/lib/turn.js')}}"></script>
    <script>
        $('#book').turn({gradient:true,acceleration:true});
    </script>
</body>
</html>