<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        *{
            margin: 0%;
            padding: 0%;
            box-sizing: border-box;
        }
        img {
            width: 8.3in;
            height: 11.69in;
        }
    </style>
</head>
<body>
    @foreach ($val as $img)
        <img src="{{url('/images/'.$val[0]->idbook.'/'.$img->imgname)}}">
    @endforeach
</body>
</html>