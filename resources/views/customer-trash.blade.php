<!doctype html>
<html lang="en">

<head>
    <title>Customer trash</title>
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

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#" style="color: white">
            @if(session()->has('user_name'))
                {{ session()->get('user_name') }}
            @else
                Guest
            @endif    
        </a>
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
    <div class="container">
        <a href="{{ route('customer.create') }}">
            <button class="btn btn-primary m-2 float-right">Add</button>
        </a> 
        <a href="{{ url('/customer/view') }}">
            <button class="btn btn-primary m-2 float-right">Customer View</button>
        </a>
        <table class="table">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            @if ($customer->gender == 'M')
                                Male
                            @elseif($customer->gender == 'F')
                                Female
                            @elseif($customer->gender == 'O')
                                Other
                            @endif
                        </td>
                        {{-- <td>{{ get_formatted_date($customer->dob, "d-M-Y" ) }}</td> --}}
                        <td>{{ $customer->dob }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->state }}</td>
                        <td>{{ $customer->country }}</td>
                        <td>
                            @if ($customer->status == '1')
                                <a href="">
                                    <span class="badge badge-success">Active</span>
                                </a>
                            @else
                                <a href="">
                                    <span class="badge badge-danger">Inactive</span>
                                </a>
                            @endif

                        </td>
                        <td>
                            <a href="{{ route('customer.force.delete', ['id' => $customer->customer_id]) }}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                            <a href="{{ route('customer.restore', ['id' => $customer->customer_id]) }}">
                                <button class="btn btn-info">Restore</button>
                            </a>
                           
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</body>

</html>
