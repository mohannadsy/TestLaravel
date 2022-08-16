<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


</head>
<body>

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">


            <form action='/upload' method="post" enctype="multipart/form-data">

                {{csrf_field()}}
                @csrf

                <div class="form-group">
                    <input type="file" class="form-control" name="path">
                </div>
                <br>

                <div class="form-group">
                    <input type="submit" class="form-control">

                </div>

            </form>

        </div>
    </div>
</div>
</body>
</html>
