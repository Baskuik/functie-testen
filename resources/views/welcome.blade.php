<!DOCTYPE html>
<html>
<head>
    <title>Labels Overzicht</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10">
    <h1 class="text-2xl font-bold mb-5">Welkom bij de Label Maker</h1>
    
    @if(session('success'))
        <div class="bg-green-200 p-3 mb-5 text-green-800">{{ session('success') }}</div>
    @endif

    <a href="{{ route('labels.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
        Nieuw Label Aanmaken
    </a>
</body>
</html>