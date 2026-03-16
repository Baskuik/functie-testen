<!DOCTYPE html>
<html>
<head>
    <title>Nieuw Label</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10">
    <div class="max-w-md mx-auto bg-white p-8 border border-gray-300 rounded shadow-sm">
        <h2 class="text-xl font-bold mb-5">Maak een nieuw label</h2>

        <form action="{{ route('labels.store') }}" method="POST">
            @csrf <div class="mb-4">
                <label class="block mb-1">Label Naam:</label>
                <input type="text" name="label_name" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Wiki ID:</label>
                <input type="text" name="wiki_id" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="hidden" name="label_active" value="0">
                    <input type="checkbox" name="label_active" value="1" class="form-checkbox" checked>
                    <span class="ml-2">Label is actief</span>
                </label>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('welcome') }}" class="text-gray-600 hover:underline">
                    &larr; Terug
                </a>
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
</body>
</html>