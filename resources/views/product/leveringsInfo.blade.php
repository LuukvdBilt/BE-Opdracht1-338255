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

            @if (session('success'))
                <div class="alert alert-success alert-dimissable fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
                </div>
                <meta http-equiv="refresh" content="3;url={{ route('home') }}">
            @endif

            <!-- Leverancier info als normale tekst boven de tabel -->
            <p>
                @forelse ($leverancierInfo as $LCinfo)
                    <p>Naam Leverancier: {{ $LCinfo->Naam }}</p>
                    <p>Contactpersoon leverancier: {{ $LCinfo->Contactpersoon }}</p>
                    <p>Leverancier nummer: {{ $LCinfo->Leveranciernummer }}</p>
                    <p>Mobiel: {{ $LCinfo->Mobiel }}</p>

                @empty
                    Geen leverancier informatie beschikbaar.
                @endforelse
            </p>

            <table class="table table-hover table-striped">
                <thead>
                    <th>Naam</th>
                    <th>Datum Laatste Levering</th>
                    <th>Aantal</th>
                    <th>Datum Eerst Volgende Levering</th>
                </thead>
                <tbody>
                    @forelse ($leverantieInfo as $LTinfo)
                        <tr>
                            <td>{{ $LTinfo->Naam}}</td>
                            <td>{{ $LTinfo->DatumLevering }}</td>
                            <td>{{ $LTinfo->Aantal }}</td>
                            <td>{{ $LTinfo->DatumEerstVolgendeLevering }}</td>
                        </tr>
                    @empty
                        <tr colspan='3'>Geen producten bekend</tr>
                    @endforelse
                </tbody>
            </table>
          <a class="btn btn-primary" href="{{ route('home') }}">Terug naar alle producten</a>
        </div>
    </div>
</body>

</html>