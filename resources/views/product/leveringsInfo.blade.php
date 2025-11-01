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

            <br>

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
                    <th>Naam Product</th>
                    <th>Datum Laatste Levering</th>
                    <th>Aantal</th>
                    <th>Eerstvolgende Levering</th>
                </thead>
                <tbody>
                    @forelse($leverantieInfo as $LTinfo)
                        @if($LTinfo->Aantal == 0)
                            <tr>
                                <td colspan="4">Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: {{ $LTinfo->DatumEerstVolgendeLevering }}</td>
                                <meta http-equiv="refresh" content="4;url={{ route('home') }}">
                            </tr>
                        @else
                            <tr>
                                <td>{{ $LTinfo->Naam }}</td>
                                <td>{{ $LTinfo->DatumLevering }}</td>
                                <td>{{ $LTinfo->Aantal }}</td>
                                <td>{{ $LTinfo->DatumEerstVolgendeLevering }}</td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="4">Geen producten bekend</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
          <a class="btn btn-primary" href="{{ route('home') }}">Terug naar alle producten</a>
        </div>
    </div>
</body>

</html>