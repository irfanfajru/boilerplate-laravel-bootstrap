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
    <title>Wisata</title>
    @vite('resources/js/app.js')

</head>

<body>

    <!-- navbar -->
    @include('components.navbar')

    <!-- content -->
    <!-- form pemesanan -->
    <div class="flex justify-center mt-20 mb-20">
        <form action="" class="border rounded bg-[#F8F8F8] shadow p-5" enctype='multipart/form-data' action="{{route('pemesanan.form-pemesanan')}}" method="post">
            @csrf
            <h1 class="text-center mb-6 font-bold text-3xl">Form Pemesanan</h1>
            <!-- nama pemesan -->
            <div class="flex justify-between mb-4">
                <label for="nama">Nama Pemesan : </label>
                <input id="" name="nama" type="text" class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <!-- jenis kelamin -->
            <div class="flex justify-between mb-4">
                <label for="jk">Jenis Kelamin : </label>
                <div>
                    <input id="lk" name="jk" type="radio" value="Laki-Laki" class="rounded border border-gray-300 w-48" required autofocus selected>
                    <label for="lk">Laki-Laki</label>
                    <input id="pr" name="jk" type="radio" value="Perempuan" class="rounded border border-gray-300 w-48" required autofocus>
                    <label for="pr">Perempuan</label>
                </div>
            </div>
            <!-- nomor identitas -->
            <div class="flex justify-between mb-4">
                <label for="nama">Nomor Identitas : </label>
                <input id="" name="no_identitas" type="text" class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <!-- tipe kamar -->
            <div class="flex justify-between mb-4">
                <label for="tipe_kamar">Tipe Kamar : </label>
                <select name="tipe_kamar" id="tipe_kamar" class="rounded border border-gray-300 w-48">
                    @foreach($hotel as $item)
                    <option value="{{ $item->id }}">{{ $item->tipe }}</option>
                    @endforeach
                </select>
            </div>
            <!-- tanggal pesan -->
            <div class="flex justify-between mb-4">
                <label for="tanggal_pesan">Tanggal Pesan : </label>
                <input id="" name="tanggal_pesan" type="date" class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <!-- harga -->
            <div class="flex justify-between mb-4">
                <label for="harga">Harga : </label>
                <input id="harga" name="harga" type="number" value="{{$hotel[0]->harga}}" readonly class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <!-- durasi menginap -->
            <div class="flex justify-between mb-4">
                <label for="durasi">Durasi menginap : </label>
                <div class="flex space-x-2">
                    <input id="durasi" name="durasi" type="number" min="1" value="1" class="rounded border border-gray-300 w-48" required autofocus>
                    <p>Hari</p>
                </div>
            </div>
            <!-- breakfast -->
            <div class="flex justify-between mb-4 space-x-4">
                <label for="">Termasuk Breakfast : </label>
                <div class="flex space-x-4 mb-4">
                    <input id="breakfast" type="checkbox" name="breakfast" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                    <label for="breakfast" class="text-sm font-medium text-gray-900 w-80 text-justify">
                        Ya
                    </label>
                </div>
            </div>
            <!-- total bayar -->
            <div class="flex justify-between mb-4">
                <label for="nama">Total : </label>
                <input id="total" name="total" value="{{$hotel[0]->harga}}" type="number" readonly autofocus>
            </div>
            <!-- buttons -->
            <div class="flex justify-between">
                <div class="rounded h-max w-max text-center p-2 bg-[#f0ad4e] shadow">
                    <button onclick="hitungTotal({{json_encode($hotel)}})" type="button" class="text-sm text-white font-bold">Hitung Total Bayar</button>
                </div>
                <div class="rounded h-max w-24 text-center p-2 bg-[#5cb85c] shadow">
                    <button type="submit" class="text-sm text-white font-bold">Pesat Tiket</button>
                </div>
                <div class="rounded h-max w-24 text-center p-2 bg-[#d9534f] shadow">
                    <button type="reset" class="text-sm text-white font-bold">Cancel</button>
                </div>
            </div>
        </form>
    </div>

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <script>
        function hitungTotal(dataKamar) {
            durasi = $("#durasi").val()
            breakfast = $("#breakfast").is(":checked")
            hargaKamar = $("#harga").val()

            // harga kamar
            // cek harga kamar
            dataKamar.map((val => {
                if ($("#tipe_kamar").val() == val.id) {
                    hargaKamar = $("#harga").val(val.harga)
                }
            }))

            // total harga
            totalHarga = parseInt(hargaKamar.val())
            console.log(totalHarga)
            totalHarga = totalHarga * durasi
            // jika durasi menginap lebih dari 3 hari
            // kasih diskon 10%
            if (durasi > 3) {
                diskon = totalHarga * (10 / 100)
                totalHarga = totalHarga - diskon
            }

            // jika termasuk breakfast true
            console.log(breakfast)
            if (breakfast) {
                // tambah 80.000
                totalHarga += 80000
            }

            // edit input total harga
            $("#total").val(totalHarga)
        }
    </script>
</body>

</html>