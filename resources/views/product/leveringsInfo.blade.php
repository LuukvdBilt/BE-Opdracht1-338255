@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
</head>

<body class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4">

        <h1 class="text-3xl font-bold text-gray-800 mb-4 border-b-2 border-gray-300 pb-2">{{ $title }}</h1>

        <!-- Leverancier info als normale tekst boven de tabel -->
        <div class="mb-6 text-gray-700">
            @forelse ($leverancierInfo as $LCinfo)
                <p><strong>Naam Leverancier:</strong> {{ $LCinfo->Naam }}</p>
                <p><strong>Contactpersoon leverancier:</strong> {{ $LCinfo->Contactpersoon }}</p>
                <p><strong>Leverancier nummer:</strong> {{ $LCinfo->Leveranciernummer }}</p>
                <p><strong>Mobiel:</strong> {{ $LCinfo->Mobiel }}</p>
            @empty
                <p>Geen leverancier informatie beschikbaar.</p>
            @endforelse
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg mb-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datum Laatste Levering</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aantal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Eerstvolgende Levering</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($leverantieInfo as $LTinfo)
                        @if($LTinfo->Aantal == 0)
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                    Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: {{ $LTinfo->DatumEerstVolgendeLevering }}
                                </td>
                                <meta http-equiv="refresh" content="4;url={{ route('home') }}">
                            </tr>
                        @else
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-gray-700">{{ $LTinfo->Naam }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $LTinfo->DatumLevering }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $LTinfo->Aantal }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $LTinfo->DatumEerstVolgendeLevering }}</td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Geen producten bekend</td>
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
