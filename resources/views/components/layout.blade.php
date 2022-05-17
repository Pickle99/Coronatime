<link href="{{asset('css/app.css')}}" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">

<body class="font-inter">
<div class="min-h-full flex">
    <div class="mr-40 flex-1 flex flex-col justify-start py-12 px-4  sm:px-6 lg:flex-none lg:px-60 xl:px-60">
        <div class="mx-auto w-full max-w-sm lg:w-96">
            <div>
                <img class="h-12 mb-20 w-auto" src="{{asset('storage/images/coronalogo.png')}}" alt="Workflow">
                <h2 class="mb-4 text-4xl font-bold text-black">Welcome back</h2>
                <p class="mt-2 text-lg text-gray-400">
                    Welcome back! Please enter your details
                </p>
            </div>

            <div class="mt-8">
                <div class="mt-6">
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="username" class="block text-sm font-bold text-black"> Username </label>
                            <div class="mt-1">
                                <input id="username" placeholder="Enter unique username or email" name="username" type="text" autocomplete="username" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-bold text-black"> Password </label>
                            <div class="mt-1">
                                <input id="password" placeholder="Fill in password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
                            </div>

                            <div class="text-sm">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> Forgot your password? </a>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-md shadow-sm text-sm font-extrabold text-white bg-greener hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">LOG IN</button>
                        </div>
                    </form>
                    <p class="mt-2 text-center text-sm text-gray-400">
                     Don't have an account?
                        <a href="#" class="font-medium text-black hover:text-indigo-500"> Sign up for free </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden lg:block relative w-0 flex-1">
        <img class="absolute inset-0 h-full w-full object-cover" src="{{asset('storage/images/vaccines.png')}}" alt="">
    </div>
</div>
</body>
