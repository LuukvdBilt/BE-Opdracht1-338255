@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allergenen info</title>
</head>

<body class="mt-4">
    <div class="container d-flex justify-content-center ">

        <div class="col-md-10">

            <h1>{{ $title }}</h1>
            <br>

            <!-- Leverancier info als normale tekst boven de tabel -->
            <p>
                @forelse ($productenInfo as $PRODinfo)
                    <strong>Naam:</strong> {{ $PRODinfo->Productnaam }}<br>
                    <strong>Barcode:</strong> {{ $PRODinfo->ProductBarcode }}
                    @break
                @empty
                    Geen product informatie beschikbaar.
                @endforelse
            </p>

            <table class="table table-hover table-striped">
                <thead>
                    <th>Naam</th>
                    <th>Omschrijving</th>
                </thead>
                <tbody>
                    @forelse ($allergenenInfo as $AGinfo)
                    
                        <tr>
                            <td>{{ $AGinfo->Naam }}</td>
                            <td>{{ $AGinfo->Omschrijving }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken</td>
                            <meta http-equiv="refresh" content="4;url={{ route('home') }}">
                        </tr>
                    @endforelse
                </tbody>
            </table>
          <a class="btn btn-primary" href="{{ route('home') }}">Terug naar alle producten</a>
        </div>
    </div>
</body>

</html>