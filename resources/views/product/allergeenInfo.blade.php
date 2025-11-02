@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allergenen info</title>
</head>

<body class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4">

        <h1 class="text-3xl font-bold text-gray-800 mb-4 border-b-2 border-gray-300 pb-2">{{ $title }}</h1>

        <!-- Leverancier info als normale tekst boven de tabel -->
        <div class="mb-6 text-gray-700">
            @forelse ($productenInfo as $PRODinfo)
                <p><strong>Naam:</strong> {{ $PRODinfo->Productnaam }}</p>
                <p><strong>Barcode:</strong> {{ $PRODinfo->ProductBarcode }}</p>
                @break
            @empty
                <p>Geen product informatie beschikbaar.</p>
            @endforelse
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg mb-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Omschrijving</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($allergenenInfo as $AGinfo)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-700">{{ $AGinfo->Naam }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $AGinfo->Omschrijving }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken
                            </td>
                            <meta http-equiv="refresh" content="4;url={{ route('home') }}">
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('home') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Terug naar alle producten
        </a>

    </div>
</body>

</html>
