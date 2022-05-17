<x-layout>
    <div class="mt-10 mx-auto w-full max-w-sm lg:w-96">
        <div class="flex justify-center"><img class="h-12 mb-20 h-auto" src="{{asset('storage/images/coronalogo.png')}}" alt="Workflow"></div>
        <div>
            <h2 class="text-center  mt-24 mb-14 text-4xl font-bold text-black">Reset Password</h2>
        </div>

        <div class="mt-8">
            <div class="mt-6">
                <form action="#" method="POST" class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-bold text-black"> Email </label>
                        <div class="mt-1">
                            <input id="email" placeholder="Enter your email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                  <x-submit-button class="mt-14">RESET PASSWORD</x-submit-button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
