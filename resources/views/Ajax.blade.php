<!doctype html>
<html lang="en">

<head>
    <title>Ajax -</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h4 class="text-center">Ajax Searching</h4>
    <div class="container">
        <div class="head">
            <div class="row">
                <div class="form-group col-6">
                    <label for=""></label>
                    <select class="form-control" name="" id="">
                        <option>Dehli</option>
                        <option>Noida</option>
                        <option selected>Indore</option>
                        <option>Jabalpur</option>
                    </select>
                </div>

                <div class="form-group col-2" style="margin-top: 23px;">
                    <input type="search" class="form-control" placeholder="search" id="search">
                </div>
            </div>
        </div>
        {{-- <div id="result"></div> --}}
        <div class="mid">
            <table class="table">
                <thead>
                    <tr>
                        <th><button id="delhi" class="btn" style="font-weight:bold">Dehli</button> </th>
                        <th><button id="noida" class="btn" style="font-weight:bold">Noida</button> </th>
                        <th><button id="indore" class="btn" style="font-weight:bold">Indore</button> </th>
                        <th><button id="jabalpur" class="btn" style="font-weight:bold">Jabalpur</button> </th>
                       
                    </tr>
                </thead>
            </table>
        </div>

        <div>
            {{-- <button id="button">Click me</button> --}}
        </div>

        <div id="result"></div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#button').on('click', function() {
                $.ajax({
                    type: 'get',
                    url: "/JqueryAjax",
                    success: function(response) {
                        console.log(response);
                        // $('#search').val(response.name);
                        $('#result').html(response);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            })
        });

        $(document).ready(function() {
            $('#delhi').on('click', function() {
                $.ajax({
                    type: 'get',
                    url: "/delhiAjax",
                    success: function(response) {
                        console.log(response);
                        // $('#search').val(response.name);
                        $('#result').html(response);
                        // $('#result').text(response);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            })
        });

        $(document).ready(function() {
            $('#noida').on('click', function() {
                $.ajax({
                    type: 'get',
                    url: "/noidaAjax",
                    success: function(response) {
                        console.log(response);
                        // $('#search').val(response.name);
                        // $('#result').html(response);
                        $('#result').text(response);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            })
        });

        $(document).ready(function() {
            $('#indore').on('click', function() {
                $.ajax({
                    type: 'get',
                    url: "/indoreAjax",
                    success: function(response) {
                        console.log(response);
                        // $('#search').val(response.name);
                        // $('#result').html(response);
                        $('#result').text(response);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            })
        });

        $(document).ready(function() {
            $('#jabalpur').on('click', function() {
                $.ajax({
                    type: 'get',
                    url: "/jabalpurAjax",
                    success: function(response) {
                        console.log(response);
                        // $('#search').val(response.name);
                        // $('#result').html(response);
                        $('#result').text(response);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            })
        });
    </script>
</body>

</html>
