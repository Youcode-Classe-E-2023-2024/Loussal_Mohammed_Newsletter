@include('partials.header')
@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
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
<body class="form">

<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

<div class="auth-container d-flex h-100">

    <div class="container mx-auto align-self-center">

        <div class="row">

            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">

                        <form action="{{ route('sendCode') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">

                                    <h2>2-Step Verification</h2>
                                    <p>Enter the code for verification.</p>

                                </div>
                                <div>
                                    <input type="hidden" name="email" value="{{ session('email') }}">
                                </div>
                                <div class="col-sm-2 col-3 ms-auto">
                                    <div class="mb-3">
                                        <input type="text" class="form-control opt-input" name="num1">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-3">
                                    <div class="mb-3">
                                        <input type="text" class="form-control opt-input" name="num2">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-3">
                                    <div class="mb-3">
                                        <input type="text" class="form-control opt-input" name="num3">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-3 me-auto">
                                    <div class="mb-3">
                                        <input type="text" class="form-control opt-input" name="num4">
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <div class="mb-4">
                                        <button class="btn btn-secondary w-100" type="submit">VERIFY</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                            <div class="col-12">
                                <div class="text-center">
                                    <form action="{{url('forgetPassword')}}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{session('email')}}" name="email">
                                        <p class="mb-0">Didn't receive the code ? <button type="submit" class="text-warning border-0" style="background-color: #191e3a">Resend</button></p>
                                    </form>
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
