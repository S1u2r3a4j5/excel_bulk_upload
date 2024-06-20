<form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <br> <br>
    
    <input type="submit" value="Submit">
</form>
<br>

<a href="{{ route('export') }}" class="btn btn-primary">Export</a>
