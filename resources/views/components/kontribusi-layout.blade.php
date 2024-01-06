<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Meta description -->
        <meta name="description" content="Menjelajahi warisan sejarah melalui Historia. Temukan kisah-kisah menarik, peristiwa bersejarah, dan perjalanan yang memikat dari berbagai peradaban. Sambut masa lalu, ungkap misteri sejarah, dan tingkatkan pemahaman Anda akan warisan dunia. Portal Anda untuk merayakan perjalanan melalui waktu bersama Historia.">
    <title>Kontribusi Historia</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('build/css/tailwind.css')}}" />
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.min.js">
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <style type="text/css">
      .ck-editor__editable_inline
      {
        height:400px;
      }
    </style>
</head>
  <body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}">
      <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
        <!-- Loading screen -->
        <div
          x-ref="loading"
          class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker"
        >
          Loading.....
        </div>

        
        <!-- Sidebar -->
        <aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
          <div class="flex flex-col h-full">
              <!-- Sidebar links -->
              <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
                  <!-- Dashboards links -->
                  <div x-data="{ open: true }">
                      <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                      <a
                          href="#"
                          @click="$event.preventDefault(); open = !open"
                          class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                          
                          role="button"
                          aria-haspopup="true"
                          :aria-expanded="open ? 'true' : 'false'"
                      >
                          <span aria-hidden="true">
                              <svg
                                  class="w-5 h-5"
                                  xmlns="http://www.w3.org/2000/svg"
                                  fill="none"
                                  viewBox="0 0 24 24"
                                  stroke="currentColor"
                              >
                                  <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                  />
                              </svg>
                          </span>
                          <span class="ml-2 text-sm"> Dashboards </span>
                          <span class="ml-auto" aria-hidden="true">
                              <!-- active class 'rotate-180' -->
                              <svg
                                  class="w-4 h-4 transition-transform transform"
                                  :class="{ 'rotate-180': open }"
                                  xmlns="http://www.w3.org/2000/svg"
                                  fill="none"
                                  viewBox="0 0 24 24"
                                  stroke="currentColor"
                              >
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                              </svg>
                          </span>
                      </a>
                      <div role="menu" x-show="open" class="mt-2 space-y-2 px-7">
                          <a
                              href="kontribusi"
                              class="block p-2 text-sm transition-colors duration-200 rounded-md text-gray-700 dark:text-light dark:hover:text-light hover:text-gray-700 "
                          >
                              Daftar Sejarah
                          </a>
                      </div>
                  </div>

                  <!-- Peta-->

                  <div x-data="{ open: true }">
                    <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                    <a
                        href="#"
                        @click="$event.preventDefault(); open = !open"
                        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                        
                        role="button"
                        aria-haspopup="true"
                        :aria-expanded="open ? 'true' : 'false'"
                    >
                        <span aria-hidden="true">
                            <svg
                                class="w-5 h-5"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                />
                            </svg>
                        </span>
                        <span class="ml-2 text-sm"> Peta Historia </span>
                        <span class="ml-auto" aria-hidden="true">
                            <!-- active class 'rotate-180' -->
                            <svg
                                class="w-4 h-4 transition-transform transform"
                                :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    <div role="menu" x-show="open" class="mt-2 space-y-2 px-7">
                        <a
                            href="spot"
                            class="block p-2 text-sm transition-colors duration-200 rounded-md text-gray-700 dark:text-light dark:hover:text-light hover:text-gray-700 "
                        >
                            Spot Historia
                        </a>
                    </div>
                </div>
              </nav>
          </div>
        </aside>



        <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">          
          <!-- Main content -->
          <main>
            <!-- Content header -->
            <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
              <h1 class="text-2xl font-semibold">KONTRIBUSI HISTORIA</h1>              
              <a href="{{ route('homeUser') }}" class="text-blue-500 hover:underline">Kembali</a>
            </div>

            <!-- Content -->
            <div class="mt-2">
              <!-- State cards -->
              <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
                <!-- Value card -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                  <div>
                    <h6
                      class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                      Value
                    </h6>
                    <span class="text-xl font-semibold">$30,000</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                      +4.4%
                    </span>
                  </div>
                  <div>
                    <span>
                      <svg
                        class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </span>
                  </div>
                </div>

                <!-- Users card -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                  <div>
                    <h6
                      class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                      Users
                    </h6>
                    <span class="text-xl font-semibold">50,021</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                      +2.6%
                    </span>
                  </div>
                  <div>
                    <span>
                      <svg
                        class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                        />
                      </svg>
                    </span>
                  </div>
                </div>

                <!-- Orders card -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                  <div>
                    <h6
                      class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                      Orders
                    </h6>
                    <span class="text-xl font-semibold">45,021</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                      +3.1%
                    </span>
                  </div>
                  <div>
                    <span>
                      <svg
                        class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
                        />
                      </svg>
                    </span>
                  </div>
                </div>

                <!-- Tickets card -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                  <div>
                    <h6
                      class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                      Tickets
                    </h6>
                    <span class="text-xl font-semibold">20,516</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                      +3.1%
                    </span>
                  </div>
                  <div>
                    <span>
                      <svg
                        class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"
                        />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
              <!-- Charts -->
              <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-1"> <!-- Set lg:grid-cols-1 to make it full width on larger screens -->
                <!-- Bar chart card -->
                <div class="col-span-1 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }"> <!-- Set col-span-1 to make it full width -->
                    <!-- Card header -->
                    <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                        {{$slot}}
                    </div>
                </div>
            </div>            
        <!-- Panels -->
    <!-- All javascript code in this project for now is just for demo DON'T RELY ON IT  -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></>
    <script src="build/js/script.js"></script>
    <script>
      const setup = () => {
        const getTheme = () => {
          if (window.localStorage.getItem('dark')) {
            return JSON.parse(window.localStorage.getItem('dark'))
          }

          return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        const setTheme = (value) => {
          window.localStorage.setItem('dark', value)
        }

        const getColor = () => {
          if (window.localStorage.getItem('color')) {
            return window.localStorage.getItem('color')
          }
          return 'cyan'
        }

        const setColors = (color) => {
          const root = document.documentElement
          root.style.setProperty('--color-primary', `var(--color-${color})`)
          root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
          root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
          root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
          root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
          root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
          root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
          this.selectedColor = color
          window.localStorage.setItem('color', color)
          //
        }

        const updateBarChart = (on) => {
          const data = {
            data: randomData(),
            backgroundColor: 'rgb(207, 250, 254)',
          }
          if (on) {
            barChart.data.datasets.push(data)
            barChart.update()
          } else {
            barChart.data.datasets.splice(1)
            barChart.update()
          }
        }

        const updateDoughnutChart = (on) => {
          const data = random()
          const color = 'rgb(207, 250, 254)'
          if (on) {
            doughnutChart.data.labels.unshift('Seb')
            doughnutChart.data.datasets[0].data.unshift(data)
            doughnutChart.data.datasets[0].backgroundColor.unshift(color)
            doughnutChart.update()
          } else {
            doughnutChart.data.labels.splice(0, 1)
            doughnutChart.data.datasets[0].data.splice(0, 1)
            doughnutChart.data.datasets[0].backgroundColor.splice(0, 1)
            doughnutChart.update()
          }
        }

        const updateLineChart = () => {
          lineChart.data.datasets[0].data.reverse()
          lineChart.update()
        }

        return {
          loading: true,
          isDark: getTheme(),
          toggleTheme() {
            this.isDark = !this.isDark
            setTheme(this.isDark)
          },
          setLightTheme() {
            this.isDark = false
            setTheme(this.isDark)
          },
          setDarkTheme() {
            this.isDark = true
            setTheme(this.isDark)
          },
          color: getColor(),
          selectedColor: 'cyan',
          setColors,
          toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
          },
          isSettingsPanelOpen: false,
          openSettingsPanel() {
            this.isSettingsPanelOpen = true
            this.$nextTick(() => {
              this.$refs.settingsPanel.focus()
            })
          },
          isNotificationsPanelOpen: false,
          openNotificationsPanel() {
            this.isNotificationsPanelOpen = true
            this.$nextTick(() => {
              this.$refs.notificationsPanel.focus()
            })
          },
          isSearchPanelOpen: false,
          openSearchPanel() {
            this.isSearchPanelOpen = true
            this.$nextTick(() => {
              this.$refs.searchInput.focus()
            })
          },
          isMobileSubMenuOpen: false,
          openMobileSubMenu() {
            this.isMobileSubMenuOpen = true
            this.$nextTick(() => {
              this.$refs.mobileSubMenu.focus()
            })
          },
          isMobileMainMenuOpen: false,
          openMobileMainMenu() {
            this.isMobileMainMenuOpen = true
            this.$nextTick(() => {
              this.$refs.mobileMainMenu.focus()
            })
          },

        }
      }
    </script>
  </body>
</html>
