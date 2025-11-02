@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
</head>

<body class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-6xl mx-auto px-4">

        <h1 class="text-4xl font-bold text-gray-800 mb-6 border-b-2 border-gray-300 pb-2">{{ $title }}</h1>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Barcode</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">VerpakkingsEenheid</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">AantalAanwezig</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Allergenen Info</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Leverantie Info</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $product->Barcode}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $product->Naam }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $product->VerpakkingsEenheid}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $product->AantalAanwezig }}</td>
                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('products.allergenenInfo', $product->Id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="bg-red-500 text-white text-sm px-3 py-1 rounded hover:bg-red-600 transition">Allergenen Info</button>
                                </form>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('products.leveringsInfo', $product->Id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="bg-blue-500 text-white text-sm px-3 py-1 rounded hover:bg-blue-800 transition-colors duration-150">Leverantie Info</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Geen producten bekend</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
