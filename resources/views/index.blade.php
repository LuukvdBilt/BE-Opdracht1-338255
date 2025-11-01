@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
</head>

<body class="mt-4">
    <div class="container d-flex justify-content-center ">

        <div class="col-md-10">

            <h1>{{ $title }}</h1>

            <hr class="my-4"/>
            
            <table class="table table-hover table-striped">
                <thead>
                    <th>Barcode</th>
                    <th>Naam</th>
                    <th>VerpakkingsEenheid</th>
                    <th>AantalAanwezig</th>
                    <th>Allergenen Info</th>
                    <th>Leverantie Info</th>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->Barcode}}</td>
                            <td>{{ $product->Naam }}</td>
                            <td>{{ $product->VerpakkingsEenheid}}</td>
                            <td>{{ $product->AantalAanwezig }}</td>
                           <td class="text-center">
                                <form action="{{ route('products.allergenenInfo', $product->Id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-danger btn-sm">Allergenen Info</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('products.leveringsInfo', $product->Id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-success btn-sm">Leverantie Info</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr colspan='3'>Geen producten bekend</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>