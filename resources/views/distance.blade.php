<!-- resources/views/distance.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distance Between Two Pin Codes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Distance Between Two Pin Codes</h1>
        <form id="distanceForm">
            <div class="form-group">
                <label for="origin">Origin Pincode:</label>
                <input type="text" id="origin" name="origin" required>
            </div>
            <div class="form-group">
                <label for="destination">Destination Pincode:</label>
                <input type="text" id="destination" name="destination" required>
            </div>
            <button type="submit">Calculate Distance</button>
        </form>
        <div class="result" id="result"></div>
    </div>
    
    <script>
        document.getElementById('distanceForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const origin = document.getElementById('origin').value;
            const destination = document.getElementById('destination').value;

            fetch(`/distance?origin=${origin}&destination=${destination}`)
                .then(response => response.json())
                .then(data => {
                    if (data.distance) {
                        document.getElementById('result').innerText = `Distance: ${data.distance}`;
                    } else {
                        document.getElementById('result').innerText = `Error: ${data.error}`;
                    }
                })
                .catch(error => {
                    document.getElementById('result').innerText = `Error: ${error.message}`;
                });
        });
    </script>
</body>
</html>
