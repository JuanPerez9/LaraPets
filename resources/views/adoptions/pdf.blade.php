<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Adoptions</title>
    <style>
        table {
            border: 2px solid #aaa;
            border-collapse: collapse;
            width: 100%;
        }
        table th, table td {
            font-family: sans-serif;
            font-size: 10px;
            border: 2px solid #ccc;
            padding: 4px;
        }
        table tr:nth-child(odd) {
            background-color: #eee;
        }
        table th {
            background-color: #666;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 style="font-family: sans-serif; font-size: 14px;">All Adoptions</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Adopter</th>
                <th>Document</th>
                <th>Email</th>
                <th>Pet</th>
                <th>Kind</th>
                <th>Breed</th>
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
                <td>{{ $adopt->pet->name }}</td>
                <td>{{ $adopt->pet->kind }}</td>
                <td>{{ $adopt->pet->breed }}</td>
                <td>{{ $adopt->created_at->format('Y-m-d') }}</td>
                <td>
                    @php $ext = substr($adopt->user->photo, -4); @endphp
                    @if ($ext != 'webp' && $ext != '.svg')
                        <img src="{{ public_path() . '/images/' . $adopt->user->photo }}" width="50px">
                    @else
                        Webp|SVG
                    @endif
                </td>
                <td>
                    @php
                        $extension = substr($adopt->pet, -4);
                    @endphp
                    @if ($extension != 'webp' && $extension != '.svg')
                        <img src="{{ public_path().'/images/'.$adopt->pet->image}}" width="96px">
                    @else
                        Webp|SVG
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
