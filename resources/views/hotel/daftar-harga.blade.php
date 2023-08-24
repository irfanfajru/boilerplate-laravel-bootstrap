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
    <title>Daftar Harga</title>
    @vite('resources/js/app.js')

</head>

<body>
  
    <!-- navbar -->
    @include('components.navbar')

    <!-- content -->
    <div class="flex p-10 space-x-10">
        <!-- daftar harga hotel-->
        @foreach ($wisata as $wisata)
        <div class="flex flex-wrap justify-center p-10 rounded border h-fit w-full bg-[#F8F8F8] shadow">
                <img src="{{$wisata->gambar}}" alt="" class="w-72 h-36 mb-4">
                <h1 class="font-bold text-2xl mb-4 w-full text-center">{{$wisata->nama}}</h1>
                <p class="text-center">{{$wisata->harga}}/orang</p>
        </div>     
        @endforeach
    </div>
</body>
</html>