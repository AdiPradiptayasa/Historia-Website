<!-- login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm border border-gray-400 rounded-md">
        <form id="signinForm" class="space-y-6 p-4" action="{{ route('signin-proses') }}" method="POST">
            @CSRF
            <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <img class="mx-auto h-12 w-auto" src="{{asset('asset/images/logo.png')}}" alt="Your Company">
                    <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to
                        your account</h2>
                </div>
                <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-sm">
                    <div class="mt-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                            address</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" placeholder="Email"
                                required
                                class="block w-full rounded-md border py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('email')
                        <small>{{$message}}</small>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="text-sm">
                                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                                    password?</a>
                            </div>
                        </div>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                placeholder="Password" required
                                class="block w-full rounded-md border py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('password')
                        <small>{{$message}}</small>
                        @enderror
                    </div>

                    <button type="submit"
                        class="mt-6 flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in
                    </button>
                    <div class="text-sm">
                        <a href="{{route('signup')}}" class="font-semibold text-indigo-600 hover:text-indigo-500">Don't have account?</a>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if($message = Session::get('Gagal'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{$message}}',
            });
        </script>
    @endif
    
</body>

</html>
