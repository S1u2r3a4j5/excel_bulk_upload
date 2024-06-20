<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JavaScript</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
       
        .parent{
            text-align: center;
            display: flex;  
        }
        .parent button, .parent .count{
            font-size: 30px;
            padding: 10px 30px;
        }
    </style>
</head> 
<body>

    <div class="container">
        <div class="parent">

            <div class="minus-button">
                <button class="btn btn-primary">-</button>
            </div>

            <div class="count">
                0
            </div>

            <div class="plus-button">
                <button class="btn btn-info">+</button>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function(){
            var count = $('.count');
            var minus = $('.minus-button');
            var plus = $('.plus-button');

            minus.on('click', function(){
                var val = count.text();
                var finalVal = parseInt(val) - 1;
                
                if(parseInt(val) > 0){
                    count.text(finalVal);
                }else{
                    alert('Please enter value greater than 0')
                }

            });

            plus.on('click', function(){
                var val = count.text();
                var finalVal = parseInt(val) + 1;
                
                if(parseInt(val) < 10){
                    count.text(finalVal);
                }else{
                    alert('Please enter value less than 11')
                }
            })
        })
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>