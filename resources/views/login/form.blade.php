<html>

<head>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <style>
        .spacer {
            margin-top: 20px;
            margin-bottom: 20px;

        }

        .tengah {
            margin: auto;

            width: 50%;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container spacer">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-4 tengah">
                    <form method="POST" action="{{url('/login')}}">
                        <div class="card">
                            <div class="card-header">
                                FORM LOGIN
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="label">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" />
                                </div>
                                <div class="form-group">
                                    <label class="label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password" />
                                    @csrf
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">LOGIN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>