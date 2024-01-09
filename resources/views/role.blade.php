<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="card mt-5">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Role</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataRole as $role)
                        <tr>
                            <td>{{$role->role_name}}</td>
                            <td>
                                @foreach ($role->relationToUser as $user)
                                    {{$user->nama_role}},
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </body>
</html>
