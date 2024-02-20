<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="row">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register!</h1>
                                    </div>
                                    <form class="user" method="post" action="{{ url('/register') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col">
                                                <input type="text" class="form-control form-control-user" id="Name" placeholder="Name" name="NAMA_USER">
                                                </div>
            
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Username" value="" name="USERNAME" class="form-control form-control-user 
                                            @error('USERNAME')
                                             is-invalid
                                            @enderror
                                            "
                                                id="USERNAME" aria-describedby="usernameHelp">
                                                @error('USERNAME')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                  @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email" value="{{ old('email') }}" name="email" class="form-control form-control-user 
                                            @error('email')
                                             is-invalid
                                            @enderror
                                            "
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email">
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                  </div>
                                                  @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user  
                                            @error('password')
                                             is-invalid
                                            @enderror"
                                                id="exampleInputPassword" placeholder="Password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>
            
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register Account
                                        </button>
            
                                    </form>
                                    <hr>
                                 
                                    <div class="text-center">
                                        <a class="small" href="{{ url('login/') }}">Already have acoount!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>