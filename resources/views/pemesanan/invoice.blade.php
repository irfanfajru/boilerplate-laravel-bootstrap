<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <title>Invoice</title>
    @vite('resources/js/app.js')

</head>

<body>

    <!-- navbar -->
    @include('components.navbar')

    <!-- content -->
    <div class="p-10 space-y-10">
        <!-- hotel -->
        <h1>Pemesanan anda berhasil</h1>
        <p>Nama Pemesan : {{$pemesanan->nama}}</p>
        <p>Nomor Identitas : {{$pemesanan->no_identitas}}</p>
        <p>Jenis Kelamin : {{$pemesanan->jenis_kelamin}}</p>
        <p>Tipe Kamar : {{$pemesanan->hotel->tipe}}</p>
        <p>Durasi Penginapan : {{$pemesanan->durasi}} Hari</p>
        <!-- kalo ada diskon -->
        <p>Discount : {{$pemesanan->durasi>3? "10%":"0%"}} </p>
        <p>Total Bayar : {{number_format($pemesanan->total,0,',','.');}}</p>
    </div>
</body>

</html>