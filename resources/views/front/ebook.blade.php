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
    {{-- {{dd($val)}} --}}
    <div id="test">
        <div class='tools'>
            <a href="{{url('/zip/'.$val[0]->idbook)}}"><i class="fa-solid fa-download" style="font-size: 38px;"></i></a>
            <i id='qrcode' class="fa-solid fa-qrcode" style="font-size: 40px;"></i>
            <i id='left' class="fa-solid fa-left-long" style="font-size: 38px;"></i>
            <i id='rigth' class="fa-solid fa-right-long" style="font-size: 38px;"></i>
            <a href="{{url('/front/flipbook')}}"><i id='close' class="fa-regular fa-circle-xmark" style="font-size: 40px;"></i></a>
        </div>
        <div id="opqrcode">
            <div>
                {!! QrCode::size(300)->generate(url('/front/flipbook/'.$val[0]->idbook)) !!}
            </div>
        </div>
        <div class="test">
            <div id="book">
                @foreach ($val as $img)
                    @if ($img->Page == 1)
                            <div style="background:url('{{url('/images/'.$val[0]->idbook.'/'.$img->imgname)}}'); background-size:100% 100%;">
                            </div>
                    @else
                            <div style="background:url('{{url('/images/'.$val[0]->idbook.'/'.$img->imgname)}}'); background-size:cover;">
                                <p>{{$img->Page}}</p>
                            </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/97a4ddb345.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    <script src="{{url('/lib/turn.js')}}"></script>
    <script>
        $('#rigth').click(function(){
            $('#book').turn("next");
        });
        $('#left').click(function(){
            $('#book').turn("previous");
        });
        $('#book').turn({gradient:true,acceleration:true});
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
                // $('.tools').css('display','none');
            });
        });
        // test = "{{url('/front/flipbook/'.$val[0]->idbook.'/'.$val[0]->idbook.'/edit')}}";
        // fluk = document.location.href = test;
        // console.log(test);
    </script>
</body>
</html>