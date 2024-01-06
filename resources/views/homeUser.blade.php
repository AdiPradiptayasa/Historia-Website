<x-user-layout> 
    <style>
        .slider {
            width: 1550px;
            max-width: 100vw;
            height: 500px;
            margin: auto;
            position: relative;
            overflow: hidden;
        }
    
        .slider .list {
            position: absolute;
            width: max-content;
            height: 100%;
            left: 0;
            top: 0;
            display: flex;
            transition: left 1s;
        }
    
        .slider .list img {
            width: 1550px;
            max-width: 100vw;
            height: 100%;
            object-fit: cover;
        }
    
        .slider .buttons {
            position: absolute;
            top: 45%;
            left: 5%;
            width: 90%;
            display: flex;
            justify-content: space-between;
        }
    
        .slider .buttons button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #fff5;
            color: #fff;
            border: none;
            font-family: monospace;
            font-weight: bold;
        }
    
        .slider .dots {
            position: absolute;
            bottom: 10px;
            left: 0;
            color: #fff;
            width: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }
    
        .slider .dots li {
            list-style: none;
            width: 10px;
            height: 10px;
            background-color: #fff;
            margin: 10px;
            border-radius: 20px;
            transition: 0.5s;
            cursor: pointer;
        }
    
        .slider .dots li.active {
            width: 30px;
        }
    
        @media screen and (max-width: 768px) {
            .slider {
                height: 400px;
            }
        }
    
        .slider .list .slide {
            position: relative;
        }
    
        .slider .list .text {
            position: absolute;
            top: 50%;
            left: 10%;
            transform: translateY(-50%);
            text-align: left;
            color: #fff;
            opacity: 1;
            transition: opacity 0.5s;
        }
    
        .slider .list .text h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
    
        .slider .list .text p {
            margin: 10px 0;
            font-size: 18px;
        }
    
        .slider .list .text .detail-button {
            display: inline-block;
            padding: 8px 25px;
            background-color: #63a0ff;
            color: #fff;
            text-decoration: none;
            border-radius: 15px;
        }
    
        .slider .list .slide img {
            filter: brightness(70%);
        }
    
        .slider .dots li.active {
            width: 15px;
            background-color: #fff;
        }
    
        .slider .dots li:hover {
            background-color: #ccc;
        }
    </style>
    
    
    <!-- ... Kode HTML sebelumnya ... -->
    
    <div class="slider">
        <div class="list">
            <div class="slide">
                <img src="asset/images/ucapan.jpg" alt="Slide 1" class="">
            </div>
            <div class="slide">
                <img src="asset/images/borobudur.jpg" alt="Slide 2" class="">
                <div class="text">
                    <h2 style="font-size: 52px; font-weight: bold;">Candi Prambanan</h2>
                    <p style="max-width: 400px; overflow: hidden; text-overflow: ellipsis;">
                        Candi Prambanan adalah candi Hindu abad ke-9 di Indonesia, terkenal karena arsitektur megahnya yang mencakup relief dan candi utama tiga kuil yang menjulang tinggi.
                    </p>
                    <a href="/detail/Candi%20Prambanan" class="detail-button">Detail</a>
                </div>
            </div>
            <div class="slide">
                <img src="asset/images/GedungSate.png" alt="Slide 3" >
                <div class="text">
                    <h2 style="font-size: 52px; font-weight: bold;">Gedung Sate</h2>
                    <p style="max-width: 400px; overflow: hidden; text-overflow: ellipsis;">
                        Gedung Sate adalah ikon arsitektur bersejarah di Bandung, Indonesia, yang dibangun pada tahun 1920-an. Dikenal dengan tujuh puncaknya yang berbentuk tusuk sate, gedung ini menjadi simbol keindahan dan kekayaan sejarah kota.
                    </p>
                    <a href="/detail/Gedung%20Sate" class="detail-button">Detail</a>
                </div>
            </div>
            <div class="slide">
                <img src="asset/images/BajraSandhi.png" alt="Slide 4" >
                <div class="text">
                    <h2 style="font-size: 52px; font-weight: bold;">Bajra Sandhi</h2>
                    <p style="max-width: 400px; overflow: hidden; text-overflow: ellipsis;">
                        Bajra Sandhi di Denpasar, Bali, adalah monumen perjuangan rakyat Bali dalam merebut kemerdekaan. Simboliknya menggambarkan semangat perlawanan dan persatuan untuk mencapai kemerdekaan nasional.
                    </p>
                    <a href="/detail/Bajra%20Sandhi" class="detail-button">Detail</a>
                </div>
            </div>
            <!-- Add more slides as needed -->
        </div>
        <div class="buttons">
            <button onclick="prevSlide()"><</button>
            <button onclick="nextSlide()">></button>
        </div>
        <ul class="dots">
            <li onclick="changeSlide(0)"></li>
            <li onclick="changeSlide(1)"></li>
            <li onclick="changeSlide(2)"></li>
            <li onclick="changeSlide(3)"></li>
            <!-- Add more dots as needed -->
        </ul>
    </div>

<br></br>


<div class="w-6/12 pl-28 flex flex-col">
    <span class="font-quicksand text-2xl  xl font-bold">Monumen Bersejarah</span>
  </div>
  
<div class="w-full px-4 flex flex-wrap">
    @php $countMonumen = 0; @endphp
    @foreach ($History as $key => $item)
        @if ($item->kategori->kategori_name === 'Monumen Bersejarah')
            @php $countMonumen++; @endphp
            @if ($countMonumen <= 3)
                <div class="mb-4 p-3 md:w-1/3">
                    <div class="bg-white rounded-xl shadow-lg duration-500 hover:scale-105 hover:shadow-md overflow-hidden mb-10">
                        <a href="{{ route('detail', $item->sjrh_nama) }}">
                            <img src="{{ asset($item->sjrh_img) }}" alt="" class="w-full">
                        </a>
                        <div class="py-10 px-8">
                            <h3>
                                <a href="{{ route('detail', $item->sjrh_nama) }}" class="font-bold text-2xl text-dark hover:text-blue-500">{{ $item->sjrh_nama }}</a>
                            </h3>
                            <p class="font-small text-base text-slate-500 mb-4">{{ $item->sjrh_subjudul }}</p>
                            <a href="{{ route('detail', $item->sjrh_nama) }}" class="font-medium text-dark border-b rounded-lg hover:text-blue-500 hover:opacity-60">Detail</a>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    @endforeach
</div>

<div class="w-6/12 pl-28 flex flex-col">
    <span class="font-quicksand text-2xl  xl font-bold">Daerah</span>
  </div>
  
<div class="w-full px-4 flex flex-wrap">
    @php $countDaerah = 0; @endphp
    @foreach ($History as $key => $item)
        @if ($item->kategori->kategori_name === 'Daerah')
            @php $countDaerah++; @endphp
            @if ($countDaerah <= 3)
                <div class="mb-4 p-3 md:w-1/3">
                    <div class="bg-white rounded-xl shadow-lg duration-500 hover:scale-105 hover:shadow-md overflow-hidden mb-10">
                        <a href="{{ route('detail', $item->sjrh_nama) }}">
                            <img src="{{ asset($item->sjrh_img) }}" alt="" class="w-full">
                        </a>
                        <div class="py-10 px-8">
                            <h3>
                                <a href="{{ route('detail', $item->sjrh_nama) }}" class="font-bold text-2xl text-dark hover:text-blue-500">{{ $item->sjrh_nama }}</a>
                            </h3>
                            <p class="font-small text-base text-slate-500 mb-4">{{ $item->sjrh_subjudul }}</p>
                            <a href="{{ route('detail', $item->sjrh_nama) }}" class="font-medium text-dark border-b rounded-lg hover:text-blue-500 hover:opacity-60">Detail</a>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    @endforeach
</div>

<div class="w-6/12 pl-28 flex flex-col">
    <span class="font-quicksand text-2xl  xl font-bold">Budaya</span>
  </div>
  
<div class="w-full px-4 flex flex-wrap">
    @php $countBudaya = 0; @endphp
    @foreach ($History as $key => $item)
        @if ($item->kategori->kategori_name === 'Budaya')
            @php $countBudaya++; @endphp
            @if ($countBudaya <= 3)
                <div class="mb-4 p-3 md:w-1/3">
                    <div class="bg-white rounded-xl shadow-lg duration-500 hover:scale-105 hover:shadow-md overflow-hidden mb-10">
                        <img src="{{ asset($item->sjrh_img) }}" alt="" class="w-full">
                        <div class="py-10 px-8">
                            <h3>
                                <a href="{{ route('detailUser', $item->sjrh_nama) }}" class="font-bold text-2xl text-dark hover:text-blue-500">{{ $item->sjrh_nama }}</a>
                            </h3>
                            <p class="font-md text-base text-slate-500 mb-4">{{ $item->sjrh_subjudul }}</p>
                            <a href="{{ route('detailUser', $item->sjrh_nama) }}" class="font-medium text-dark border-b rounded-lg hover:text-blue-500 hover:opacity-60">Detail</a>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    @endforeach
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Display SweetAlert for successful sign-in -->
    @if($message = Session::get('success-signin'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sign In Successful',
                text: '{{ session('success-signin') }}',
            });
        </script>
    @endif
    

    <script>
      let currentSlide = 0;
  
      function showSlide(index) {
          const slider = document.querySelector('.slider .list');
          const dots = document.querySelectorAll('.slider .dots li');
  
          if (index >= 0 && index < slider.children.length) {
              currentSlide = index;
              const leftPosition = -index * 100 + '%';
              slider.style.left = leftPosition;
  
              // Update active dot
              dots.forEach((dot, i) => {
                  dot.classList.toggle('active', i === index);
              });
          } else if (index === slider.children.length) {
              // Jika mencapai slide terakhir, kembali ke slide pertama
              showSlide(0);
          } else if (index === -1) {
              // Jika mencapai slide pertama dari slide terakhir, pindah ke slide terakhir
              showSlide(slider.children.length - 1);
          }
      }
  
      function nextSlide() {
          showSlide(currentSlide + 1);
      }
  
      function prevSlide() {
          showSlide(currentSlide - 1);
      }
  
      function changeSlide(index) {
          showSlide(index);
      }
  
      // Autoplay slide setiap 3 detik
      setInterval(() => {
          nextSlide();
      }, 5000);
  </script>

</x-user-layout>