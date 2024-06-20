<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <style>
        .navbar.navbar-expand-lg.navbar-light.bg-dark .navbar-nav .nav-link {
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#" style="color: white">
            @if (session()->has('user_name'))
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


        <div class="container mt-1">
            <a href="{{ route('export') }}" class="btn btn-danger btn-sm">Download</a>
        </div>
    </nav>
    <div class="container">
        <div class="row m-2">
            <div class="col-9">
                <form action="">
                    <div class="input-group">
                        <input type="search" name="search" id="" class="form-control m-2"
                            placeholder="search here" aria-describedby="helpId" value="{{ $search }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary m-2">Search</button>
                            <a href="{{ url('/customer/view') }}">
                                <button type="button" class="btn btn-primary m-2">Reset</button>
                            </a>

                        </div>

                    </div>
                </form>
            </div>
            <div class="col-3 d-flex justify-content-end">
                <a href="{{ route('customer.create') }}">
                    {{-- <button class="btn btn-primary m-2">Add</button> --}}
                </a>


                {{-- <a href=""> --}}
                <button id="delete_all" class="btn btn-danger m-2">All <i class="fa-solid fa-trash-can"></i></button>
                {{-- </a> --}}

                <a href="{{ url('/customer/trash') }}">
                    <button class="btn btn-danger m-2">Go to trash</button>
                </a>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="container">
            <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file">
                <div class="form-group mt-2">
                    <input type="submit" value="Submit" class="btn btn-success btn-sm">
                    <a href="{{ route('export') }}" class="btn btn-primary btn-sm"
                        {{-- style="color: #fff;
                                background-color: #337ab7;
                                border-color: #2e6da4;    
                                border-radius: unset;" --}}
                                >Export</a>
                </div>
            </form>
        </div>


        <form action="{{ route('customers.deleteSelected') }}" method="get">
            <table class="table">

                <thead>
                    <tr>
                        {{-- <th><input type="checkbox" id="masterCheckbox"></th> --}}
                        <th><input type="checkbox" class="group-checkable" id="select_all_ids"
                                onclick="checkAll(this)" />
                        </th>

                        <th>Id</th>
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
                    @foreach ($customers as $key => $customer)
                        <tr data-key="{{ $key + 1 }}">
                            {{-- <td><input type="checkbox" value="" ></td> --}}
                            <td>
                                <input type="checkbox" class="checkboxes "
                                    name="checkboxes[{{ $customer->customer_id }}]"
                                    value="{{ $customer->customer_id }}" />
                            </td>
                            <td>{{ $customer->customer_id }}</td>
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
                            <td style="display: flex">
                                <a class="btn btn-danger"
                                    href="{{ route('customer.delete', ['id' => $customer->customer_id]) }}"
                                    title="Delete">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                                {{-- <a href="{{ route('customer.edit', ['id' => $customer->customer_id]) }}" title="Edit"
                                    style="margin-left: 4px;">
                                    <button class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></button>
                                </a> --}}
                                <a href="{{ route('customer.edit', [$customer->customer_id]) }}" title="Edit"
                                    style="margin-left: 4px;" class="btn btn-info">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>

            </table>
            <input type="submit" id="submit_button" style="display: none">
        </form>
        <div class="row" style="    height: 50px;">
            {{ $customers->links() }}
        </div>

    </div>

    <script>
        function checkAll(obj) {
            let selector = $('.checkboxes');
            selector.click();
        }
        $(document).ready(function() {
            var $checkboxes = $('.checkboxes');
            $checkboxes.change(function() {
                var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
                if (countCheckedCheckboxes == 0) {
                    $('#count-checked').html('');
                } else {
                    $('#count-checked').html('You have selected <b>' + countCheckedCheckboxes +
                        '</b> tickets');
                }
            });

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Event listener for delete_all button
            $('#delete_all').on('click', function() {
                // SweetAlert2 confirmation dialog
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to delete this!",
                    // timer: 3000,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {

                    if (result.isConfirmed) {

                        $('#submit_button').click();
                        // If user confirms, show success alert
                        // Swal.fire({
                        //     title: "Deleted!",
                        //     text: "Your file has been deleted.",
                        //     icon: "success"
                        // });
                    }
                });
            });
        });
    </script>
</body>

</html>
