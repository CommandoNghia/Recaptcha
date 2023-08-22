<html>
<head>
    <title>Laravel 9 How to integrate Google reCAPTCHA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Laravel 9 How to integrate Google reCAPTCHA</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Errors!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h3 class="card-header text-center">Register User</h3>
                <div class="card-body">
                    <form  action="{{url('users/store')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="User name">
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="User email">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="password" class="form-control" placeholder="User Password">
                        </div>
                        <div class="form-group mb-3">
                            <strong>Google recaptcha :</strong>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-dark btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
