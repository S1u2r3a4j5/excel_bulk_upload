<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .navbar.navbar-expand-lg.navbar-light.bg-dark .navbar-nav .nav-link {
            color: white;
        }
    </style>
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#" style="color: white">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/navbar') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/customer/create') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/customer/view') }}">Customer</a>
                </li>
            </ul>

        </div>
    </nav>

    {{-- <form action="{{ url('/') }}/customer" method="post"> --}}
    <form action="{{ $url }}" method="post">
        @csrf

        <div class="container mt-4 card p-3 bg-white">
            {{-- <h3 class="text-center text-primary">Customer Registration</h3> --}}
            <h3 class="text-center text-primary">{{ $title }}</h3>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Name:</label>
                    <input type="text" class="form-control" name="name" id=""
                        value="{{ $customer->name }}">
                    {{-- <input type="text" class="form-control" name="name" id="" value="{{ isset($customer) ? $customer->name : '' }}"> --}}
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Email:</label>
                    <input type="text" class="form-control" name="email" id=""
                        value="{{ $customer->email }}">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Password:</label>
                    <input type="password" class="form-control" name="password" id="" placeholder="">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Confirm Password:</label>
                    <input type="password" class="form-control" name="confirm_password" id="" placeholder="">
                    <span class="text-danger">
                        @error('confirm_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Country:</label>
                    <input type="text" class="form-control" name="country" id=""
                        value="{{ $customer->country }}">
                    <span class="text-danger">
                        @error('country')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group col-md-6">
                    <label for="">State:</label>
                    <input type="text" class="form-control" name="state" id="" placeholder=""
                        value="{{ $customer->state }}">
                    <span class="text-danger">
                        @error('state')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Address:</label>
                    <input type="text" class="form-control" name="address" id="" placeholder=""
                        value="{{ $customer->address }}">
                    <span class="text-danger">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Gender:</label>
                    {{-- <input type="radio" class="form-control" name="gender" id="" aria-describedby="helpId"
                        placeholder=""> --}}
                    <br>
                    <input type="radio" name="gender" value="M"
                        {{ $customer->gender == 'M' ? 'checked' : '' }}>
                    Male
                    </label>
                    <input type="radio" name="gender" value="F"
                        {{ $customer->gender == 'F' ? 'checked' : '' }}>
                    Female
                    </label>
                    <input type="radio" name="gender" value="O"
                        {{ $customer->gender == 'O' ? 'checked' : '' }}>
                    Other

                    <span class="text-danger">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Date of birth:</label>
                    <input type="date" class="form-control" name="dob" id="" placeholder=""
                        value="{{ $customer->dob }}">
                    <span class="text-danger">
                        @error('dob')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>


    </form>
</body>

</html>
