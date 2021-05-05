<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{asset('css/frontend/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/frontend/select2-bootstrap4.min.css')}}">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<body>
  <div class="container-fluid">
    <div class="row no-gutter">
      <!-- The image half -->
      <div class="col-md-6 d-none d-md-flex bg-image"></div>


      <!-- The content half -->
      <div class="col-md-6 bg-light">
        <div class="login d-flex align-items-center py-5">

          <!-- Demo content-->
          <div class="container">
            <div class="row">
              <div class="col-lg-10 col-xl-7 mx-auto">
                <h3 class="display-4">Register</h3>
                <p class="text-muted mb-4">Register design by Electro</p>
                <form method="POST">
                  <div class="form-group mb-3">
                    <input id="name" name="name" type="text" placeholder="Họ và tên" required="" class="form-control @error('name') is-invalid @enderror rounded-pill border-0 shadow-sm px-4">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group mb-3">
                    <input id="phone" name="phone" type="number" placeholder="Số điện thoại" required="" class="form-control @error('phone') is-invalid @enderror rounded-pill border-0 shadow-sm px-4">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group mb-3">
                    <input id="email" name="email" type="email" placeholder="Địa chỉ Email" required="" autofocus="" class="form-control @error('email') is-invalid @enderror rounded-pill border-0 shadow-sm px-4">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="input-group mb-3">
                    <input id="password" name="password" type="password" placeholder="Password" required="" class="form-control @error('password') is-invalid @enderror border-0 shadow-sm px-4 text-primary" style="border-radius: 40px 0px 0px 40px;">
                    <div class="input-group-append" style="cursor: pointer;" onclick="showhide('password')">
                      <div class="input-group-text" style="border-radius: 0px 40px 40px 0px; border:0 ">
                        <span class="fas fa-eye"></span>
                      </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="input-group mb-3">
                    <input id="rePassword" name="rePassword" type="password" placeholder="Password" required="" class="form-control @error('rePassword') is-invalid @enderror border-0 shadow-sm px-4 text-primary" style="border-radius: 40px 0px 0px 40px;">
                    <div class="input-group-append" style="cursor: pointer;" onclick="showhide('rePassword')">
                      <div class="input-group-text" style="border-radius: 0px 40px 40px 0px; border:0 ">
                        <span class="fas fa-eye"></span>
                      </div>
                    </div>
                    @error('rePassword')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group mb-3">
                    <input id="address" name="address" type="text" placeholder="Address" required="" class="form-control @error('address') is-invalid @enderror rounded-pill border-0 shadow-sm px-4 text-primary">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group mb-3">
                    <select name="province" id="province" class="form-control rounded-pill border-0 shadow-sm px-4">
                      <option value="0" selected disabled>---Chọn tỉnh---</option>
                      @foreach($pr as $province)
                      <option value="{{$province->id}}">{{ucfirst($province->province)}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <select name="district" id="district" class="form-control rounded-pill border-0 shadow-sm px-4" placeholder="Select Sub Category">
                      <option value="0" selected disabled>---Chọn Quận(Huyện)---</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                  {{ csrf_field() }}
                </form>
              </div>
            </div>
          </div><!-- End -->

        </div>
      </div><!-- End -->

    </div>
  </div>
  <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="{{ asset('js/frontend/jquery.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script src="{{ asset('js/frontend/select2.full.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <style type="text/css">
    /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
    .login,
    .image {
      min-height: 100vh;
    }

    .bg-image {
      background-image: url('https://res.cloudinary.com/mhmd/image/upload/v1555917661/art-colorful-contemporary-2047905_dxtao7.jpg');
      background-size: cover;
      background-position: center center;
    }
  </style>
  <script>
    function showhide(key) {
      var x = document.getElementById(key);
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    $(function() {

      $('#district').select2({
        theme: 'bootstrap4',

      })

      $('#province').select2({
        theme: 'bootstrap4',
      });
    })

    $(document).ready(function() {
      $('#province').on('change', function() {
        let id = $(this).val();
        $('#district').empty();
        $('#district').append(`<option value="0" disabled selected>Processing...</option>`);
        $.ajax({
          type: 'GET',
          url: 'GetSubCatAgainstMainCatEdit/' + id,
          success: function(response) {
            var response = JSON.parse(response);
            console.log(response);
            $('#district').empty();
            response.forEach(element => {
              $('#district').append(`<option value="${element['id']}">${element['district_name']}</option>`);
            });
          }
        });
      });
    });
  </script>

</body>

</html>