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
                clifford: '#da373d',}
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
        <form action="" class="border rounded bg-[#F8F8F8] shadow p-5" enctype='multipart/form-data' action="{{route('pemesanan.form-pemesanan')}}" method="post" >
            @csrf    
            <h1 class="text-center mb-6 font-bold text-3xl">Form Pemesanan</h1>
            <div class="flex justify-between mb-4">
                <label for="nama">Nama Lengkap : </label>
                <input id="" name="nama" type="text" class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <div class="flex justify-between mb-4">
                <label for="nama">Nomor Identitas : </label>
                <input id="" name="no_identitas" type="text" class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <div class="flex justify-between mb-4">
                <label for="nama">No. HP : </label>
                <input id="" name="no_hp" type="text" class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <div class="flex justify-between mb-4">
                <label for="nama">Tempat Wisata : </label>
                <select name="id_wisata" id="" class="rounded border border-gray-300 w-48">
                    <option value="">Pilih Wisata</option>
                    @foreach($wisata as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-between mb-4">
                <label for="nama">Tanggal Kunjungan : </label>
                <input id="" name="tanggal_kunjungan" type="date" class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <div class="flex justify-between mb-4">
                <label for="nama">Pengunjung Dewasa : </label>
                <input id="" name="pengunjung_dws" type="number" class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <div class="flex justify-between mb-4 space-x-4">
                <label for="nama">Pengunjung Anak-anak : </label>
                <input id="" name="pengunjung_anak" type="number" class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <div class="flex justify-between mb-4">
                <label for="nama">Harga Tiket : </label>
                <input id="" name="harga_tiket" type="text" autofocus>
            </div>
            <div class="flex justify-between mb-4">
                <label for="nama">Total : </label>
                <input id="" name="total" type="text" autofocus>
            </div>
            <div class="flex space-x-4 mb-4">
                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                <label for="default-checkbox" class="text-sm font-medium text-gray-900 w-80 text-justify">
                    Saya dan/atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang telah ditetapkan.
                </label>
            </div>
            <div class="flex justify-between">
                <div class="rounded h-max w-max text-center p-2 bg-[#f0ad4e] shadow">
                    <button type="button" class="text-sm text-white font-bold">Hitung Total Bayar</button>
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

    <!-- ticket -->
    <div>

    </div>
</body>
</html>