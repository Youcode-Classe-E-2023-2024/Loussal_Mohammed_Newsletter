@include('partials.header')
<body class="form">
<!-- ... Other parts of your view ... -->

@if(session('logout'))
    <div class="alert alert-success">
        {{ session('logout') }}
    </div>
@endif

@if(session('errorLogin'))
    <div class="alert alert-danger">
        {{ session('errorLogin') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- ... Other parts of your view ... -->
<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

<div class="auth-container d-flex">

    <div class="container mx-auto align-self-center">

        <div class="row">

            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12 mb-3">

                                <h2>Sign In</h2>
                                <p>Enter your email and password to login</p>

                            </div>
                            <form action="{{ route('login.reset') }}" method="post">
                                @csrf

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" value=" {{old('email')}} " name="email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input me-3" type="checkbox" id="form-check-default" name="remember_token">
                                            <label class="form-check-label" for="form-check-default">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-4">
                                        <button class="btn btn-secondary w-100" type="submit">SIGN IN</button>
                                    </div>
                                </div>
                            </form>

                            <div class="col-12 mb-4">
                                <div class="">
                                    <div class="seperator">
                                        <hr>
                                        <div class="seperator-text"> <span>Or continue with</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-12">
                                <div class="mb-4">
                                    <button class="btn  btn-social-login w-100 ">
                                        <img src="https://designreset.com/cork/html/src/assets/img/google-gmail.svg" alt="" class="img-fluid">
                                        <span class="btn-text-inner">Google</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-sm-4 col-12">
                                <div class="mb-4">
                                    <button class="btn  btn-social-login w-100">
                                        <img src="https://designreset.com/cork/html/src/assets/img/github-icon.svg" alt="" class="img-fluid">
                                        <span class="btn-text-inner">Github</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-sm-4 col-12">
                                <div class="mb-4">
                                    <button class="btn  btn-social-login w-100">
                                        <img src="https://designreset.com/cork/html/src/assets/img/twitter.svg" alt="" class="img-fluid">
                                        <span class="btn-text-inner">Twitter</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="text-center">
                                    <p class="mb-0">Dont't have an account ? <a href="{{route('register.index')}}" class="text-warning">Sign Up</a></p>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="text-center">
                                    <p class="mb-0">Forgot Password? <a href="{{ route('forgetPassword.index') }}" class="text-warning">Reset Password</a></p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
</body>
@include('partials.footer')
