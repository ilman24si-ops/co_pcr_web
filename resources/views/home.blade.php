<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $nama }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f9f9f9;
        }
    </style>
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

        <!-- 🔽 BAGIAN BARU: DAFTAR PROGRAM STUDI -->
        <section>
            <h2>Daftar Program Studi</h2>

            <table>
                <thead>
                    <tr>
                        <th>Nama Program Studi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prodi as $p)
                        <tr>
                            <td>{{ $p['nama'] }}</td>
                            <td>{{ $p['status'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

    </main>

</body>
</html>
