<x-layout>
<x-panel-login>
    <x-panel-login-flex>
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
                    <form action="/register" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="{{__('translate.username')}}" class="block text-sm font-bold text-black">{{__('translate.username')}}</label>
                            <div class="mt-1">
                                <input id="{{__('translate.username')}}" placeholder="{{__('translate.Enter unique username')}}" name="{{__('translate.username')}}" type="text" class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error(__('translate.username'))
                            <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="{{__('translate.email')}}" class="block text-sm font-bold text-black">{{__('translate.email')}}</label>
                            <div class="mt-1">
                                <input id="{{__('translate.email')}}" placeholder="{{__('translate.Enter your email')}}" name="{{__('translate.email')}}" type="email" class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error(__('translate.email'))
                            <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="{{__('translate.password')}}" class="block text-sm font-bold text-black"> {{__('translate.password')}}</label>
                            <div class="mt-1">
                                <input id="{{__('translate.password')}}" placeholder="{{__('translate.Fill in password')}}" name="{{__('translate.password')}}" type="password"  class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error(__('translate.password'))
                            <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="{{__('translate.Repeat password')}}" class="block text-sm font-bold text-black"> {{__('translate.Repeat password')}} </label>
                            <div class="mt-1">
                                <input id="{{__('translate.Repeat password')}}" placeholder="{{__('translate.Repeat password')}}" name="{{__('translate.Repeat password')}}" type="password" class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error(__('translate.Repeat password'))
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
    </x-panel-login-flex>
    <x-vaccine-img></x-vaccine-img>
</x-panel-login>
</x-layout>
