<html>
  <head>
    <title>HISTORIA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preload" as="style" href="https://www.cinemation.develobe.id/build/assets/app-ef435afa.css" /><link rel="stylesheet" href="https://www.cinemation.develobe.id/build/assets/app-ef435afa.css" />  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Meta description -->
        <meta name="description" content="Menjelajahi warisan sejarah melalui Historia. Temukan kisah-kisah menarik, peristiwa bersejarah, dan perjalanan yang memikat dari berbagai peradaban. Sambut masa lalu, ungkap misteri sejarah, dan tingkatkan pemahaman Anda akan warisan dunia. Portal Anda untuk merayakan perjalanan melalui waktu bersama Historia.">
    
  </head>
  <body>
    <div class="w-full h-auto min-h-screen flex flex-col">
    @include('header')
   {{$slot}}
  <!-- Footer -->
  <footer class="bg-develobe-900 text-white py-12">
    <div class="flex justify-between mx-auto max-w-screen-xl">
        <div class="w-6/12 flex flex-col pr-8">
            <span class="font-quicksand text-4xl font-bold">HISTORIA</span>
            <span class="font-inter text-lg mt-4">Menyelami Warisan, <br>Menjembatani Masa Lalu<br>dan Masa Depan</span>
        </div>

        <div class="w-3/12 flex flex-col">
            <span class="font-inter font-bold text-lg">Website</span>
            <a href="/home" class="font-inter text-lg mt-4 hover:text-develobe-500 duration-200">Home</a>
            <a href="/kategori" class="font-inter text-lg mt-4 hover:text-develobe-500 duration-200">Kategori</a>
            <a href="/PetaHistori" class="font-inter text-lg mt-4 hover:text-develobe-500 duration-200">Peta Historia</a>
            
        </div>

        <div class="w-3/12 flex flex-col">
            <span class="font-inter font-bold text-lg">Social</span>
            <a href="#" target="_blank" class="font-inter text-lg mt-4 hover:text-develobe-500 duration-200">Instagram</a>
            <a href="#" target="_blank" class="font-inter text-lg mt-4 hover:text-develobe-500 duration-200">Facebook</a>
        </div>
    </div>
</footer>
   
      </div>
        <!-- End Footer -->
    </body>
</html>