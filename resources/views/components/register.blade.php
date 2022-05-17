<x-layout>
<x-panel-login>
    <x-panel-login-flex>
        <div class="mx-auto w-full max-w-sm lg:w-96">
            <div>
                <img class="h-12 mb-20 w-auto" src="{{asset('storage/images/coronalogo.png')}}" alt="Workflow">
                <h2 class="mb-4 text-4xl font-bold text-black">Welcome back to Coronatime</h2>
                <p class="mt-2 text-lg text-gray-400">
                    Please enter required info to sing up
                </p>
            </div>

            <div class="mt-8">
                <div class="mt-6">
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="username" class="block text-sm font-bold text-black"> Username </label>
                            <div class="mt-1">
                                <input id="username" placeholder="Enter unique username" name="username" type="text" autocomplete="username" required class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-bold text-black"> Email </label>
                            <div class="mt-1">
                                <input id="email" placeholder="Enter your email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-bold text-black"> Password </label>
                            <div class="mt-1">
                                <input id="password" placeholder="Fill in password" name="password" type="password" required class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="passwordRepeat" class="block text-sm font-bold text-black"> Repeat password </label>
                            <div class="mt-1">
                                <input id="passwordRepeat" placeholder="Repeat password" name="passwordRepeat" type="password" required class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember this device </label>
                            </div>

                        </div>

                        <x-submit-button>SIGN UP</x-submit-button>
                    </form>
                    <p class="mt-2 text-center text-sm text-gray-400">
                        Already have an account?
                        <a href="/login" class="font-medium text-black hover:text-indigo-500"> Log in </a>
                    </p>
                </div>
            </div>
        </div>
    </x-panel-login-flex>
    <x-vaccine-img></x-vaccine-img>
</x-panel-login>
</x-layout>
