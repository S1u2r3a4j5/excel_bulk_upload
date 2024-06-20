<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conditional statement</title>
</head>
<body>
<h3>hello, {{$name ?? "Guest"}}</h3>
    {{-- @if ($name == "")
        {{"Name is empty"}}
    @elseif ($name == "suraj")  
        {{"Name is Suraj"}}  
    @else
        {{"Name is incorrect"}}     
       
    @endif --}}

    {{-- @unless ($name == "wscube-tech")
        {{"The name is not wscube-tech"}}        
    @endunless --}}

    @isset($name)
    My name is <b>{{$name}}</b>
        
    @endisset
    
</body>
</html>