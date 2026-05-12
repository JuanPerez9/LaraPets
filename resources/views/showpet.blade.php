<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pet->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-emerald-900 p-12">

    <div class="max-w-md mx-auto bg-base-100 rounded-box shadow-lg p-8 flex flex-col items-center gap-4">
        
        {{-- Imagen huella --}}
        <img src="{{ asset('images/huella.jpg') }}" alt="huella" class="w-24 h-24 object-contain">

        <h1 class="text-2xl font-bold text-emerald-700">{{ $pet->name }}</h1>

        <table class="table w-full">
            <tbody>
                <tr>
                    <th class="text-emerald-600">ID</th>
                    <td>{{ $pet->id }}</td>
                </tr>
                <tr>
                    <th class="text-emerald-600">Kind</th>
                    <td>{{ $pet->kind }}</td>
                </tr>
                <tr>
                    <th class="text-emerald-600">Breed</th>
                    <td>{{ $pet->breed }}</td>
                </tr>
                <tr>
                    <th class="text-emerald-600">Weight</th>
                    <td>{{ $pet->weight }}</td>
                </tr>
                <tr>
                    <th class="text-emerald-600">Age</th>
                    <td>{{ $pet->age }}</td>
                </tr>
                <tr>
                    <th class="text-emerald-600">Location</th>
                    <td>{{ $pet->location }}</td>
                </tr>
                <tr>
                    <th class="text-emerald-600">Description</th>
                    <td>{{ $pet->description }}</td>
                </tr>
                <tr>
                    <th class="text-emerald-600">Status</th>
                    <td>{{ $pet->status }}</td>
                </tr>
            </tbody>
        </table>

        {{-- Botón volver --}}
        <a href="{{ url('view/allpets') }}" class="btn bg-emerald-600 text-white hover:bg-emerald-400 mt-4">
            ← Back to list
        </a>

    </div>

</body>
</html>