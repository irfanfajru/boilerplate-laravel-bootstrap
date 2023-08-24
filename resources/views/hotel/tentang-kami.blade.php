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
    <title>Tentang Kami</title>
    @vite('resources/js/app.js')

</head>

<body>
  
    <!-- navbar -->
    @include('components.navbar')

    <!-- content -->
    <div class="p-10 mb-20">
        <div class="p-10 rounded border h-fit w-full bg-[#F8F8F8] shadow">
            <img src="https://asset.kompas.com/crops/ohcwgpUSto5IIbDn-gwq6lLgel0=/27x0:777x500/780x390/data/photo/2020/03/23/5e7863f00f5ed.jpg" class="mb-10 w-full h-fit">
            <h1 class="font-bold text-3xl mb-10 text-center">Tentang Kami</h1>
            <p class="text-justify mb-10">
                Selamat datang di Hotel XYZ, destinasi penginapan pilihan Anda untuk pengalaman yang luar biasa di tengah kota yang ramai. Dengan kebanggaan, kami telah melayani tamu-tamu kami sejak tahun 2001, memberikan pengalaman yang tak terlupakan di setiap kunjungan. Kami dengan bangga menyajikan berbagai pilihan kamar yang nyaman dan fasilitas berkualitas tinggi untuk memenuhi kebutuhan dan preferensi Anda. Di Hotel XYZ, kami memahami pentingnya kenyamanan, kualitas, dan layanan yang ramah, yang telah menjadi tanda tangan kami sejak tahun kami berdiri. Terima kasih telah memilih kami sebagai tempat Anda bermalam.
            </p>
            <h1 class="font-bold text-2xl mb-10 text-center">Mengapa Harus Hotel Kami?</h1>
            <div class="flex justify-between mr-20 ml-20">
                <div class="rounded rounded-lg flex items-center justify-center font-bold text-white bg-[#f0ad4e] border-4 w-56 h-24">
                    <p>Pilihan Kamar Beragam</p>
                </div>
                <div class="rounded rounded-lg flex items-center justify-center font-bold text-white bg-[#f0ad4e] border-4 w-56 h-24">
                    <p>Harga Terjangkau</p>
                </div>
                <div class="rounded rounded-lg flex items-center justify-center font-bold text-white bg-[#f0ad4e] border-4 w-56 h-24">
                    <p>Fasilitas Premium</p>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="flex justify-between bg-[#F8F8F8] py-5 px-10">
        <div>
            <h1 class="font-bold mb-4 text-lg">Alamat</h1>
            <p>Jl. Contoh Alamat No. 123, </br>
                Kota Ramai, 12345,</br>     
                Negara Xyz
            </p>
        </div>
        <div>
            <h1 class="font-bold mb-4 text-lg">Hubungi Kami Di</h1>
            <p>Telepon: (123) 456-7890</p>
            <p>Email: info@hotelxyz.com</p>
        </div>
    </div>
</body>
</html>