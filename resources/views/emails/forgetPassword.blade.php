@include('partials.header')
<body class="form">
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

                        <form action="{{ url('forgetPassword') }}" method="post">
                            @csrf

                            <div class="row">
                            <div class="col-md-12 mb-3">

                                <h2>Password Reset</h2>
                                <p>Enter your email to recover your ID</p>

                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-secondary w-100" type="submit">RECOVER</button>
                                </div>
                            </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
</body>
@include('partials.footer')

