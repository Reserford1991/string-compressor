<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="Form">
    <meta name="author" content="Form">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" src="{{ URL::asset('css/styles.css') }}"></link>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>

<br>


<script type="text/javascript">
    var compress = "{{ route('compress')}}";
    var decompress = "{{ route('decompress')}}";
</script>

<script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>


<form action="/compress">
    <div class="form-group has-error">
        <label for="input-1">Input String</label>
        <input type="text" class="form-control" id="input-1">
    </div>
    <div class="form-group">
        <label for="compressed-1">Compressed String</label>
        <input type="password" class="form-control" id="compressed-1">
    </div>
    <button type="submit" class="btn btn-default" id="compress">Compress</button>
    <button type="reset" class="btn btn-default" value="Reset">Clear</button>
</form>

</br>
</br>
</br>

<form action="/decompress">
    <div class="form-group">
        <label for="input-1">Compressed String</label>
        <input type="text" class="form-control" id="compressed-2">
    </div>
    <div class="form-group">
        <label for="compressed-1">Input String</label>
        <input type="password" class="form-control" id="input-2">
    </div>
    <button type="submit" class="btn btn-default" id="decompress">Decompress</button>
    <button type="reset" class="btn btn-default" value="Reset">Clear</button>
</form>


</body>
</html>
