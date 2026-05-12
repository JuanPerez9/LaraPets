<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Adoptions</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Adopter</th>
                <th>Document</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Pet Name</th>
                <th>Kind</th>
                <th>Breed</th>
                <th>Pet Age</th>
                <th>Pet Weight</th>
                <th>Location</th>
                <th>Adopted At</th>
                <th>User Photo</th>
                <th>Pet Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adopts as $adopt)
            <tr>
                <td>{{ $adopt->id }}</td>
                <td>{{ $adopt->user->fullname }}</td>
                <td>{{ $adopt->user->document }}</td>
                <td>{{ $adopt->user->email }}</td>
                <td>{{ $adopt->user->phone }}</td>
                <td>{{ $adopt->pet->name }}</td>
                <td>{{ $adopt->pet->kind }}</td>
                <td>{{ $adopt->pet->breed }}</td>
                <td>{{ $adopt->pet->age }}</td>
                <td>{{ $adopt->pet->weight }}</td>
                <td>{{ $adopt->pet->location }}</td>
                <td>{{ $adopt->created_at->format('Y-m-d') }}</td>
                <td>
                    <img src="{{ public_path() . '/images/' . $adopt->user->photo }}" width="50px">
                </td>
                <td>
                    <img src="{{ public_path() . '/images/' . $adopt->pet->image }}" width="50px">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
