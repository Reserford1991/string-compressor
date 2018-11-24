<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>String compress and decompress</title>
    <meta name="description" content="Form">
    <meta name="author" content="Form">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
</head>

<br>


<script type="text/javascript">
    var compress = "{{ route('compress')}}";
    var decompress = "{{ route('decompress')}}";
</script>

<script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>

<div class="container">

    <div class="error-message alert alert-danger row">
        <p class="error-message-p col-md-12"></p>
    </div>

    <form action="/compress" class="row">
        <div class="form-group col-md-6">
            <label for="input-1">Input String</label>
            <input type="text" class="form-control" id="decompressed-1">
        </div>
        <div class="form-group col-md-6">
            <label for="compressed-1">Compressed String</label>
            <input type="text" class="form-control" id="compressed-1" disabled>
        </div>
        <div class="col-md-3 button">
            <button type="submit" class="btn btn-default" id="compress">Compress</button>
        </div>
        <div class="col-md-3 button">
            <button type="reset" class="btn btn-default" value="Reset">Clear</button>
        </div>
    </form>

    </br>
    </br>
    </br>

    <form action="/decompress" class="row">
        <div class="form-group col-md-6">
            <label for="input-1">Compressed String</label>
            <input type="text" class="form-control" id="compressed-2">
        </div>
        <div class="form-group col-md-6">
            <label for="compressed-1">Input String</label>
            <input type="text" class="form-control" id="decompressed-2" disabled>
        </div>
        <div class="col-md-3 button">
            <button type="submit" class="btn btn-default" id="decompress">Decompress</button>
        </div>
        <div class="col-md-3 button">
            <button type="reset" class="btn btn-default" value="Reset">Clear</button>
        </div>
    </form>

</div>


</body>
</html>
