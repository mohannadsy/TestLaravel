<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


</head>
<body>

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">

            <table border="1px">

                <tr>
                    <th>Name</th>

                    <th> View</th>
                    <th> Download</th>


                </tr>

                @foreach($data as $data)

                    <tr>
                        <td>{{$data->name}} </td>

                        <td><a href="">View</a></td>
                        <td><a href="{{url('/download',$data->path)}}"> Download </a></td>
                        <td><a href="{{url('/delete',$data->path)}}"> Delete </a></td>

                    </tr>
                @endforeach

            </table>


        </div>

    </div>
</div>
</body>
</html>
