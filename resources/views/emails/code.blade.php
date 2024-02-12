@include('partials.header')
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

                        <div class="row">
                            <div class="col-md-12 mb-3">

                                <h2>2-Step Verification</h2>
                                <p>Enter the code for verification.</p>

                            </div>
                            <div class="col-sm-2 col-3 ms-auto">
                                <div class="mb-3">
                                    <input type="text" class="form-control opt-input">
                                </div>
                            </div>
                            <div class="col-sm-2 col-3">
                                <div class="mb-3">
                                    <input type="email" class="form-control opt-input">
                                </div>
                            </div>
                            <div class="col-sm-2 col-3">
                                <div class="mb-3">
                                    <input type="text" class="form-control opt-input">
                                </div>
                            </div>
                            <div class="col-sm-2 col-3 me-auto">
                                <div class="mb-3">
                                    <input type="text" class="form-control opt-input">
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="mb-4">
                                    <button class="btn btn-secondary w-100">VERIFY</button>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="text-center">
                                    <p class="mb-0">Didn't receive the code ? <a href="javascript:void(0);" class="text-warning">Resend</a></p>
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
