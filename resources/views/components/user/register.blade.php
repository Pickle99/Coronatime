<x-layout>
<x-panels.panel-login>
    <x-panels.login-flex>
        <div class="mx-auto w-full max-w-sm lg:w-96">
            <div>
                <img class="h-12 mb-20 w-auto" src="{{asset('storage/images/coronalogo.png')}}" alt="Workflow">
                <h2 class="mb-4 text-3xl font-bold text-black" >{{__('translate.Welcome back to Coronatime')}}</h2>
                <p class="mt-2 text-lg text-gray-400">
                  {{__('translate.Please enter required info to sing up')}}
                </p>
            </div>

            <div class="mt-8">
                <div class="mt-6">
                    <form method="POST" action="/register" class="space-y-6">
                        @csrf

                            <div>
                                <label for="username" class="block text-sm font-bold text-black">{{__('translate.username', ['name' => 'Username'])}}</label>
                                <div class="mt-1">
                                    <input id="username" value="{{old('username')}}" placeholder="{{__('translate.Enter unique username')}}" name="username" type="text" class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                @error('username')
                                <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                                @enderror
                            </div>


                        <div>
                            <label for="email" class="block text-sm font-bold text-black">{{__('translate.email')}}</label>
                            <div class="mt-1">
                                <input id="email" value="{{old('email')}}" placeholder="{{__('translate.Enter your email')}}" name="email" type="email" class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('email')
                            <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-bold text-black"> {{__('translate.password')}}</label>
                            <div class="mt-1">
                                <input id="password"  placeholder="{{__('translate.Fill in password')}}" name="password" type="password"  class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('password')
                            <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="repeat" class="block text-sm font-bold text-black"> {{__('translate.repeat password')}}</label>
                            <div class="mt-1">
                                <input id="repeat"  placeholder="{{__('translate.repeat password')}}" name="repeat" type="password"  class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('repeat')
                            <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                            @enderror
                        </div>


                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900"> {{__('translate.remember this device')}} </label>
                            </div>
                        </div>
                        <x-submit-button>{{__('translate.sign up')}}</x-submit-button>
                    </form>
                    <p class="mt-2 text-center text-sm text-gray-400">
                        {{__('translate.Already have an account?')}}
                        <a href="/login" class="font-medium text-black hover:text-indigo-500">{{__('translate.log in')}} </a>
                    </p>
                </div>
            </div>
        </div>
    </x-panels.login-flex>
    <x-vaccine-img></x-vaccine-img>
</x-panels.panel-login>
</x-layout>
