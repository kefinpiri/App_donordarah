<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>
        Laporan Permintaan Darah
    </title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 13px;
            color: #111827;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h2 {
            margin: 0;
            color: #dc2626;
        }

        .header p {
            margin: 5px 0 0;
            color: #6b7280;
        }

        .info {
            margin-bottom: 20px;
        }

        .info p {
            margin: 3px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #dc2626;
            color: white;
            padding: 10px;
            border: 1px solid #d1d5db;
            text-align: left;
        }

        table td {
            padding: 10px;
            border: 1px solid #d1d5db;
        }

        .text-center {
            text-align: center;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
        }

        .footer p {
            margin: 4px 0;
        }
    </style>

</head>

<body>

    {{-- HEADER --}}
    <div class="header">

        <h2>
            LAPORAN PERMINTAAN DARAH
        </h2>

        <p>
            Sistem Informasi Donor Darah
        </p>

    </div>

    {{-- INFO --}}
    <div class="info">

        <p>
            Tanggal Cetak:
            {{ date('d-m-Y') }}
        </p>

        <p>
            Total Data:
            {{ $laporan->count() }}
        </p>

    </div>

    {{-- TABLE --}}
    <table>

        <thead>

            <tr>

                <th width="5%">No </th>

                <th>Nama Pasien </th>

                <th> Jenis Kelamin </th>

                <th> Golongan </th>

                <th>Jumlah </th>

                <th>Rumah Sakit</th>

                <th> Status </th>

                <th>Tanggal </th>

            </tr>

        </thead>

        <tbody>

            @forelse ($laporan as $item)
                <tr>

                    <td class="text-center">

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        {{ $item->nama_pasien }}

                    </td>

                    <td>

                        {{ $item->jenis_kelamin }}

                    </td>

                    <td>

                        {{ $item->golongan_darah }}

                    </td>

                    <td>

                        {{ $item->jumlah_kantong }} Kantong

                    </td>

                    <td>

                        {{ $item->rumah_sakit }}

                    </td>

                    <td>

                        {{ ucfirst($item->status) }}

                    </td>

                    <td>

                        {{ $item->tanggal_permintaan }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8" class="text-center">

                        Data laporan belum ada

                    </td>

                </tr>
            @endforelse

        </tbody>

    </table>

    {{-- FOOTER --}}
    <div class="footer">

        <p>
            Petugas Donor Darah
        </p>

        <br><br><br>

        <p>
        </p>

    </div>

</body>

</html>
