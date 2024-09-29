<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- {{ $datas }} --}}
    <div class="table">
        <table>
            <thead>
                <th>SN</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </thead>

            <tbody>
                @foreach ($datas as $index=>$data)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <a href="{{ route('user.edit',['id'=>$data->id]) }}"><button>Edit</button></a>
                            <a href="{{ route('user.delete', ['id'=>$data->id]) }}"><button>Delete</button></a>
                            <a href="{{ route('user.view',['id'=>$data->id]) }}"><button>View</button></a>
                            
                        </td>
                    </tr>
                @endforeach
                <tr></tr>
                <tr></tr>
                <tr></tr>
            </tbody>
        </table>
    </div>
</body>
</html>