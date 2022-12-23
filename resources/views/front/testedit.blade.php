<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('/css/style.css')}}">
    <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}">
    <title>Flipbook</title>
</head>
<body>
    <ul class="nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)" id="insert_pic" data-bs-target="#picModal" data-bs-toggle="modal">เพิ่มรูปภาพ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)" id="insert_pic" data-bs-target="#linkModal" data-bs-toggle="modal">เพิ่มลิ้งค์</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">เพิ่มข้อความ</a>
        </li>
      </ul>

      <!-- Modal Image -->
<div class="modal fade" id="picModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          image
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  
      <!-- Modal Image -->
<div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Link
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

    <!-- Tab panes -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
    </div>
    
    <!-- (Optional) - Place this js code after initializing bootstrap.min.js or bootstrap.bundle.min.js -->
    <script>
        var triggerEl = document.querySelector('#navId a')
        bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
    </script>
    
    <div id="test">
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
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
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
    <script>
        $('#insert_pic').click(function(){
            console.log('eiei');
            return;
        })
    </script>
    <script>
        const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
    </script>
</body>
</html>