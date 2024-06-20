<!doctype html>
<html lang="en">
  <head>
    <title>w3 Jquery</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('input').focus(function(){
                $(this).css('background-color', 'red');
            });
            $('input').blur(function(){
                $(this).css('background-color', 'green');
            });
            

            $('input').mouseenter(function(){
                $(this).css('background-color', 'lightgray');
            });
            $('input').mouseleave(function(){
                $(this).css('background-color', 'lightblue');
            });
            $('input').click(function(){
                $(this).css('background-color', 'yellow');
            });
        });
    </script>
  </head>
  <body>
  <div class="container" style="display:flex; flex-direction: column">
    Name: <input type="text" name="name">
    Email: <input type="email" name="email">
  </div>


  
  </body>
</html>