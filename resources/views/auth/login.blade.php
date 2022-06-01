<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="robots" content="noindex,nofollow" />
    <title>Login - Proiect Scolar</title>

    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{ asset('assets/images/favicon.png') }}"
    />

    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" />

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>

<body class="bg-dark">
<div class="main-wrapper">

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div
        class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
          bg-dark
        "
    >
        <div class="auth-box bg-dark border-top border-secondary">
            <div id="loginform">
                <div class="text-center pt-3 pb-3">
              <span class="db">
                  <h3 class="text-white">Logare Proiect Scolar</h3>
              </span>
                </div>
                <!-- Form -->
                <form
                    class="form-horizontal mt-3"
                    id="loginform"
                    action="{{ route('login') }}"
                    method="POST"
                >
                    @csrf
                    <div class="row pb-4">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                      <span
                          class="input-group-text bg-success text-white h-100"
                          id="basic-addon1"
                      ><i class="mdi mdi-account fs-4"></i
                          ></span>
                                </div>
                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    placeholder="Email"
                                    aria-label="Email"
                                    id="email"
                                    name="email"
                                    required=""
                                />
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                      <span
                          class="input-group-text bg-warning text-white h-100"
                          id="basic-addon2"
                      ><i class="mdi mdi-lock fs-4"></i
                          ></span>
                                </div>
                                <input
                                    type="password"
                                    class="form-control form-control-lg"
                                    placeholder="Password"
                                    aria-label="Password"
                                    id="password"
                                    name="password"
                                    required=""
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="pt-3 text-center">
                                    <button
                                        class="btn btn-success text-white"
                                        type="submit"
                                    >
                                        Login
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>

<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>

<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<script>
    $(".preloader").fadeOut();
</script>
</body>
</html>
