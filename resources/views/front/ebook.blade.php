<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('/css/style.css')}}">
    <title>Flipbook</title>
</head>
<body>
    <div id="test">
        <div class='tools'>
            <i id='qrcode' class="fa-solid fa-qrcode" style="font-size: 40px;"></i>
            <a href="{{url('/front/flipbook')}}"><i id='close' class="fa-regular fa-circle-xmark" style="font-size: 40px;"></i></a>
        </div>
        <div id="opqrcode">
            <div>
                {!! QrCode::size(300)->generate(url('/front/flipbook/'.$val)) !!}
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
    <script src="https://kit.fontawesome.com/97a4ddb345.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    <script src="{{url('/lib/turn.js')}}"></script>
    <script>
        $(document).ready(function(){
            // $('.open').click(function(){
            //     $('#test').css('display','block');
            //     $('#con').css('display','none');
            // });
            // $('#close').click(function(){
                // $('#test').css('display','none');
                // $('#con').css('display','flex');
            // });
            $('#qrcode').click(function(){
                $('#opqrcode').css('display','flex');
                $('#book').css('display','none');
                $('.tools').css('display','none');
            });
        });
        $('#book').turn({gradient:true,acceleration:true});
    </script>
</body>
</html>