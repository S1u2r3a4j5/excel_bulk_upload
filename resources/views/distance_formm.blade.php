<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distance Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }

        .form-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: #f8f9fa;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .table-container {
            margin-top: 20px;
        }

        th, td {
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12 form-container">
            <h2>Distance Search</h2>
            <form action="{{ route('calculate.distance') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="pincode1">From Pincode :</label>
                    <input type="text" class="form-control" id="pincode1" name="pincode1" value="{{ old('pincode1') }}">
                    <span class="text-danger" style="color: red">
                        @error('pincode1')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="pincode2">To Pincode :</label>
                    <input type="text" class="form-control" id="pincode2" name="pincode2" value="{{ old('pincode2') }}">
                    <span class="text-danger" style="color: red">
                        @error('pincode2')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-primary">Calculate Distance</button>
            </form>

            @isset($distance)
                <div class="table-container">
                    {{-- <h2>Distance Result</h2> --}}
                    <table class="tblGetinDetails table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center bg-primary p-2" colspan="3" style="color:#fff;font-size: 16px;">
                                    Pincode Distance
                                </th>
                            </tr>
                            <tr>
                                <th>From Pincode</th>
                                <th>To Pincode</th>
                                <th>Distance (KM)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $pincode1 }}</td>
                                <td>{{ $pincode2 }}</td>
                                <td>{{ $distance }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endisset
        </div>
    </div>
</div>

</body>

</html>
