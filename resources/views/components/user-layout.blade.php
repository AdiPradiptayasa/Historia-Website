<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Meta description -->
        <meta name="description" content="Menjelajahi warisan sejarah melalui Historia. Temukan kisah-kisah menarik, peristiwa bersejarah, dan perjalanan yang memikat dari berbagai peradaban. Sambut masa lalu, ungkap misteri sejarah, dan tingkatkan pemahaman Anda akan warisan dunia. Portal Anda untuk merayakan perjalanan melalui waktu bersama Historia.">
    <title>HISTORIA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://www.cinemation.develobe.id/build/assets/app-ef435afa.css" />
    <style>
        .profile-dropdown {
            position: relative;
            display: inline-block;
            margin-left: 10px; /* Adjust the margin as needed */
        }

        .profile-dropdown button {
            padding: 40px; /* Adjust the padding as needed */
        }

        .profile-dropdown #dropdownMenu {
            position: absolute;
            top: 100%;
            right: 0;
            z-index: 10;
        }
        .hover\:scale-105:hover {
            transform: scale(1.05);
        }
    </style>
</head>


<header class="w-full bg-white h-[96px] drop-shadow-lg flex flex-row items-center relative z-50">
        <div class="w-1/3 pl-5">
            <a href="/homeUser" class="uppercase text-base mx-5 hover:text-develobe-500 duration-200 font-inter">HOME</a>
            <a href="/kategoriUser" class="uppercase text-base mx-5 text-black hover:text-develobe-500 duration-200 font-inter">KATEGORI</a>
            <a href="/PetaHistoriUser" class="uppercase text-base mx-5 text-black hover:text-develobe-500 duration-200 font-inter">PETA HISTORI</a>
        </div>

        <div class="w-1/3 flex items-center justify-center">
            <a href="/" class="font-bold text-5xl font-quicksand text-black hover:text-develobe-500 duration-200">HISTORIA</a>
        </div>

        <div class="relative w-1/3 flex flex-row justify-end pr-5">
          <div class="group profile-dropdown">
              <!-- Add a label for accessibility -->
              <button onclick="toggleDropdown()" aria-label="Toggle Profile Dropdown" class="flex items-center focus:outline-none">
                  <!-- Use role="img" for better semantics when using SVG as an icon -->
                  <span role="img" aria-label="Profile" class="w-8 h-8">
                    <svg class="w-full h-full text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                    </svg>{{ Auth::user()->name }}
                </span>
                
              </button>
              <div id="dropdownMenu" class="hidden absolute right-0 mt-2 bg-white border border-gray-300 rounded-md shadow-md z-10 w-36">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white inline-block mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z"/>
                    </svg>
                    Edit Profile
                </a>
                <a href="{{ route('kontribusi.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white inline-block mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                        <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                        <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                    </svg>
                    Kontribusi
                </a>
                <a href="logout" class=" px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                  <svg class="w-6 h-6 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
                  </svg>Log Out</a>
            </div>
          </div>
      </div>
      
    </header>
<body>
  <div class="w-full h-auto min-h-screen flex flex-col relative z-40">
        {{$slot}}
        <footer class="bg-develobe-900 text-white py-12">
            <div class="flex justify-between mx-auto max-w-screen-xl">
                <div class="w-6/12 flex flex-col pr-8">
                    <span class="font-quicksand text-4xl font-bold">HISTORIA</span>
                    <span class="font-inter text-lg mt-4">Menyelami Warisan, <br>Menjembatani Masa Lalu<br>dan Masa Depan</span>
                </div>

                <div class="w-3/12 flex flex-col">
                    <span class="font-inter font-bold text-lg">Website</span>
                    <a href="/home" class="font-inter text-lg mt-4 hover:text-develobe-500 duration-200">Home</a>
                    <a href="/kategoriUser" class="font-inter text-lg mt-4 hover:text-develobe-500 duration-200">Kategori</a>
                    <a href="/peta-historia" class="font-inter text-lg mt-4 hover:text-develobe-500 duration-200">Peta Historia</a>
                </div>

                <div class="w-3/12 flex flex-col">
                    <span class="font-inter font-bold text-lg">Social</span>
                    <a href="https://www.instagram.com/develobe.education" target="_blank" class="font-inter text-lg mt-4 hover:text-develobe-500 duration-200">Instagram</a>
                    <a href="https://discord.gg/mCqP3WBXgB" target="_blank" class="font-inter text-lg mt-4 hover:text-develobe-500 duration-200">Facebook</a>
                </div>
            </div>
        </footer>
    </div>

    <script>
        function toggleDropdown() {
            var dropdownMenu = document.getElementById("dropdownMenu");
            dropdownMenu.classList.toggle("hidden");
        }

        window.addEventListener('click', function (event) {
            var dropdownMenu = document.getElementById("dropdownMenu");
            var groupButton = document.querySelector('.group button');

            if (!groupButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
