<html>
	<head>
		<meta charset="utf-8" />
		<title>Create Your Flip Book</title>


  <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Ajax -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

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
         <h1>สร้างหนังสือ</h1>
         <p class="lead">เพิ่มหน้าปก</p>
       </div>

		<form class="register-form" action="{{ route('flipbook.store') }}" method="POST"  enctype="multipart/form-data">
          @csrf
    <div class="row">
        <div class="col-lg-3">
          <label>ชื่อหนังสือ<span class="required text-danger"> * </span></label></div>
        <div class="col-lg-9">
          <input class="form-control" type="text" placeholder="กรอกชื่อหนังสือ" name="book_name">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
          <label>รายละเอียดเกี่ยวกับหนังสือ</label>
        </div>
        <div class="col-lg-9">   
          <input class="form-control" type="text" placeholder="รายละเอียดเกี่ยวกับหนังสือ" name="desc" value="">
        </div>
    </div>
    
    <div class="row">
      <div class="col-sm-3">
        เพิ่มรูปภาพ<span class="required text-danger"> * </span>
      </div>
      <div class="col-md-9">
        <div class="form-group">
        <input type="file" name="flip_img[]" id="images" placeholder="Choose images" multiple/>
        </div>
      @error('images')
      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
      @enderror
      </div>
      <div class="col-sm-3">

      </div>
      <div class="col-md-9">
        <div class="images-preview-div img-thumbnail" width="200px;" height="200px;"></div>
      </div>
    </div>

<hr>
    <div class="row">
      <div class="col-lg-offset-3 pull-right">
        <button class="btn btn-lg btn-primary" type="submit">Create Flip Book</button>
    </div>

</div>

</form>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
<script >
  $(function() {
  // Multiple images preview with JavaScript
  var previewImages = function(input, imgPreviewPlaceholder) {
  if (input.files) {
  var filesAmount = input.files.length;
  for (i = 0; i < filesAmount; i++) {
  var reader = new FileReader();
  reader.onload = function(event) {
  $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
  }
  reader.readAsDataURL(input.files[i]);
  }
  }
  };
  $('#images').on('change', function() {
  previewImages(this, 'div.images-preview-div');
  });
  });
  </script>
</html>