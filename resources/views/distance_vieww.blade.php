<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Distance Calculator Result</title>
{{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> --}}
<style>
    .container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
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

</style>
</head>
<body>

<div class="container">
  <h2>Distance Calculator Result</h2>
  <div id="result">
    Distance: {{ $distance }} km
  </div>
  <br>
  <a href="{{ route('calculate.distance.form') }}">Back to Calculator</a>
</div>

</body>
</html>
