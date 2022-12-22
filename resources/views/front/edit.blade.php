<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('/css/style.css')}}">
    <title>Flipbook</title>
    <style>
        #book {
            /* position: fixed; */
            width: 400px;
            height: 500px;
            margin: 20px;
        }
    </style>
</head>
<body>
    {{-- {{dd($val)}} --}}
    <div id="test">
        <div class="test">
            <div id="book">
                @foreach ($val as $img)
                    @if ($img->Page == 1)
                        <div style="background:url('{{url('/images/'.$val[0]->idbook.'/'.$img->imgname)}}'); background-size:100% 100%;"></div>              
                    @else
                        <div style="background:url('{{url('/images/'.$val[0]->idbook.'/'.$img->imgname)}}'); background-size:cover;"></div>
                    @endif
                @endforeach
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
                // $('.tools').css('display','none');
            });
        });
        $('#book').turn({gradient:true,acceleration:true});
        $('#book').turn('display','single');
        $('#book').turn('page',1);
    </script>
</body>
</html>