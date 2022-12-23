<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Index Book</title>

 <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/starter-template.css') }}" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">
<div class="starter-template">
        <h1>รายการหนังสือ</h1>
      </div>
<div class="row">
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('flipbook.create') }}" class="btn btn-primary">เพิ่มหนังสือ</a>
  </div>




{{-- {{ $eiei = asset(public_path('images/'.$fb->id.'/'.$fb->Name)); }}
{{ dd($eiei); }} --}}
<div class="table-responsive">
  <table class="table table-bordered">
    <thead class="table-primary">
      <tr>
        <th class="col text-center">ลำดับ</th></th>
        <th scope="col">FlipBook</th>
        <th scope="col">Last Modified</th>
        <th scope="col">จัดการ</th>
        <th scope="col">สถานะ</th>
      </tr>
    </thead>
    @foreach($flipbooks as $fb)
    <tbody>
      <tr class="">
        <td class="text-center">{{ $fb->id  }}</td>
        <td scope="row"><img class="img-thumbnail" style="width: 80px; height: 90px;" src="{{ url('images/'.$fb->id.'/'.$fb->Name)  }}" data-holder-rendered="true"> {{ $fb->name  }}</td>
        <td> {{ $fb->updated_at }} </td>
        <td>
          <button class="btn btn-sm btn-warning"></button>
        </td>
        <td>
        @if ($fb->status == '1')
           <p class="text-success">เผยแพร่</p>
        @else
          <p class="text-danger">ไม่เผยแพร่</p>
        @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{-- <a href="{{ route('flipbook.show',$fb->id) }}" style="float: left;clear: both;">

<img class="img-thumbnail" style="width: 200px; height: 200px;" src="{{ url('images/'.$fb->id.'/'.$fb->Name)  }}" data-holder-rendered="true">
{{ $fb->name  }}

</a>   --}}


</div>
</div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('js/jquery.min.js') }}"><\/script>')</script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
</body>
</html>