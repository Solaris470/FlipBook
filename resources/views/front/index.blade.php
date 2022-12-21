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
    {{-- @if(isset($val))
    <div id="test">
        <div class='tools'>
            <i id='qrcode' class="fa-solid fa-qrcode" style="font-size: 40px;"></i>
            <i id='close' class="fa-regular fa-circle-xmark" style="font-size: 40px;"></i>
        </div>
        <div id="opqrcode">
            <div>
                {!! QrCode::size(300)->generate(url('/')) !!}
            </div>
        </div>
        <div class="test">
            <div id="book">
                <div style="background:url('{{url('/img/'.$val.'/01.jpg')}}'); background-size:100% 100%;"></div>
                <div style="background:url('{{url('/img/'.$val.'/02.jpg')}}'); background-size:cover;"></div>
                <div style="background:url('{{url('/img/'.$val.'/03.jpg')}}'); background-size:cover;"></div>
                <div style="background:url('{{url('/img/'.$val.'/04.jpg')}}'); background-size:cover;"></div>
                <div style="background:url('{{url('/img/'.$val.'/05.jpg')}}'); background-size:cover;"></div>
                <div style="background:url('{{url('/img/'.$val.'/06.jpg')}}'); background-size:cover;"></div>
            </div>
        </div>
    </div>
    @endif --}}
    <div id='con' class="container p-4">
        <div class="row g-4">
            <div class="col-4 justify-content-center align-items-center d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{url('/img/'.$data.'/01.jpg')}}" class="card-img-top">
                    <div class="card-body justify-content-center align-items-center d-flex">
                        <a href="{{url('/flipbook/'.$data)}}" class="open">ชื่อหนังสือ</a>
                    </div>
                </div>
            </div>
            <div class="col-4 justify-content-center align-items-center d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{url('/img/01.jpg')}}" class="card-img-top">
                    <div class="card-body justify-content-center align-items-center d-flex">
                        <a class="open">ชื่อหนังสือ</a>
                    </div>
                </div>
            </div>
            <div class="col-4 justify-content-center align-items-center d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{url('/img/01.jpg')}}" class="card-img-top">
                    <div class="card-body justify-content-center align-items-center d-flex">
                        <p class="open">ชื่อหนังสือ</p>
                    </div>
                </div>
            </div>
            <div class="col-4 justify-content-center align-items-center d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{url('/img/01.jpg')}}" class="card-img-top">
                    <div class="card-body justify-content-center align-items-center d-flex">
                        <p class="open">ชื่อหนังสือ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/97a4ddb345.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <script src="{{url('/js/turn.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.open').click(function(){
                $('#test').css('display','block');
                $('#con').css('display','none');
            });
            $('#close').click(function(){
                $('#test').css('display','none');
                $('#con').css('display','flex');
            });
            $('#qrcode').click(function(){
                $('#opqrcode').css('display','flex');
                $('#book').css('display','none');
                $('#qrcode').css('display','none');
            });
        });
        $('#book').turn({gradient:true,acceleration:true});
    </script>
</body>
</html>