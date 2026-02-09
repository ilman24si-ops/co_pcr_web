
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $nama }}</title>
</head>
<body>
    <header>
        <img src="{{ asset($logo) }}" alt="Logo {{ $nama }}" width="150">
        
        <h1>{{ $nama }}</h1>
        <p><strong>Slogan:</strong> {{ $slogan }}</p>
    </header>

    <main>
        <section>
            <h2>Visi</h2>
            <p>{{ $visi }}</p>
        </section>

        <section>
            <h2>Misi</h2>
            <ul>
                @foreach ($misi as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </section>

        <section>
            <h2>Deskripsi</h2>
            @foreach ($deskripsi as $paragraf)
                <p>{{ $paragraf }}</p>
            @endforeach
        </section>
    </main>
</body>
</html>
