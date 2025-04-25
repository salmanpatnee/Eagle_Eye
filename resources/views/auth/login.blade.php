<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css" />
    <style>
        body {
            background: linear-gradient(to right,
                    #203864,
                    #2e74b6);
        }

        button.btn[type="submit"] {
            background-color: #203864;
            transition: background-color ease-in .35s;
            font-size: 20px;
        }

        button.btn[type="submit"]:hover {
            background-color: #000;
        }

        .ArbLabel {
            font-size: 15px;
            float: right;
        }

        .TitleBox {
            background: #203864;
            color: white;
            width: 100%;
            /* height: 100px; */
            padding-block: 15px;
            /* margin-left: -11px; */
            /* margin-top: -23px; */
            margin-bottom: 30px;
            border-radius: 10px;
        }

        .TitleBox h1 {
            font-size: 28px
        }

        .bottontxt {
            margin-top: 10px;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <section id="login-form-wrapper" class="align-items-center d-flex justify-content-center vh-100">
        <div class="bg-white my-3 p-5 rounded-3 shadow-lg w-50">
            <div class="TitleBox">
                <h1 class="text-center">تسجيل الدخول</h1>
                <h1 class="text-center">Login</h1>
            </div>
            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                {{-- <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control form-control-lg" id="username" name="username" required>
                </div> --}}
                <div class="mb-3">
                    <h1 class="ArbLabel">اسم المستخدم</h1>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control form-control-lg" id="username" name="username"
                        value="{{ old('username') }}" required>
                    @error('username')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <h1 class="ArbLabel">أدخل كلمة المرور</h1>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control form-control-lg" id="password" name="password" required>
                    @error('password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-grid gap-2 col-6 mx-auto mt-5">
                    <button type="submit" class="btn text-light text-uppercase fw-bold  btn-lg">
                        <p class="bottontxt">اضغط هنا
                            للدخول<br>Click here to Enter</p>
                    </button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
