<!DOCTYPE html>
<html>
<head>
    {{-- <title>Contact Search</title> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        {{-- <h1 class="text-center">Search Contact</h1> --}}
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form id="search-form">
                            <div class="form-group">
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="+91" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </form>
                    </div>
                </div>
                <div id="result" class="mt-3"></div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $('#search-form').on('submit', function(e) {
            e.preventDefault();
            var phoneNumber = $('#phone_number').val();

            // Disable the form to prevent multiple submissions
            $('#search-form button').attr('disabled', true);

            // Add a delay of 1 second (1000 milliseconds) before making the request
            setTimeout(function() {
                $.ajax({
                    url: '/contacts/search',
                    type: 'GET',
                    data: { phone_number: phoneNumber },
                    success: function(data) {
                        $('#result').html(
                            '<div class="card"><div class="card-body">' +
                            '<p><strong>Country:</strong> ' + data.country + '</p>' +
                            '<p><strong>Location:</strong> ' + data.location + '</p>' +
                            '<p><strong>Carrier:</strong> ' + data.carrier + '</p>' +
                            '<p><strong>Line Type:</strong> ' + data.line_type + '</p>' +
                            '</div></div>'
                        );
                    },
                    error: function() {
                        $('#result').html('<div class="alert alert-danger">Contact not found</div>');
                    },
                    complete: function() {
                        // Re-enable the form after the request is complete
                        $('#search-form button').attr('disabled', false);
                    }
                });
            }, 1000); // 1 second delay
        });
    </script>
</body>
</html>
