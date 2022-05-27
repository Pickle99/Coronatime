<x-layout>
<x-panels.panel-login>
    <x-panels.login-flex>
        <div class="lg:mx-auto lg:w-full lg:max-w-sm lg:w-96 lg:ml-20 mb-8 lg:mb-0">
            <div>
                <img class="mt-4 mob:mt-16 mb-4 mob:mt-10 h-12 xl:mb-20  w-auto" src="{{asset('/images/coronalogo.png')}}" alt="Workflow">
                <h2 class="mb-4 text-2xl mob:text-3xl font-bold text-black" >{{__('translate.welcome_back_to_coronatime')}}</h2>
                <p class="mt-2 text-lg text-gray-400">
                  {{__('translate.please_enter_required_info_to_sing_up')}}
                </p>
            </div>

            <div class="mob:mt-8">
                <div class=" mob:mt-6">
                    <form method="POST" action="/register" class="space-y-6">
                        @csrf

                            <div>
                                <label for="username" class="block text-xs mob:text-lg font-bold text-black">{{__('translate.username')}}</label>
                                <div class="mt-1">
                                    <input id="username" value="{{old('username')}}" placeholder="{{__('translate.enter_unique_username')}}" name="username" type="text" class="text-xs appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                @error('username')
                                <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                                @enderror
                            </div>

                        <div>
                            <label for="email" class="block text-xs mob:text-lg font-bold text-black">{{__('translate.email')}}</label>
                            <div class="mt-1">
                                <input id="email" value="{{old('email')}}" placeholder="{{__('translate.enter_your_email')}}" name="email" type="email" class="text-xs appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('email')
                            <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-xs mob:text-lg font-bold text-black"> {{__('translate.password')}}</label>
                            <div class="mt-1">
                                <input id="password"  placeholder="{{__('translate.fill_in_password')}}" name="password" type="password"  class="text-xs appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('password')
                            <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="repeat" class="block text-xs mob:text-lg font-bold text-black"> {{__('translate.repeat_password')}}</label>
                            <div class="mt-1">
                                <input id="repeat"  placeholder="{{__('translate.repeat_password')}}" name="repeat" type="password"  class="text-xs appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('repeat')
                            <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                            @enderror
                        </div>


                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900"> {{__('translate.remember_this_device')}} </label>
                            </div>
                        </div>
                        <x-submit-button>{{__('translate.sign_up')}}</x-submit-button>
                    </form>
                    <p class="mt-2 text-center text-sm text-gray-400">
                        {{__('translate.already_have_an_account')}}
                        <a href="/login" class="font-medium text-black hover:text-indigo-500">{{__('translate.log_in')}} </a>
                    </p>
                </div>
            </div>
        </div>
    </x-panels.login-flex>
    <x-vaccine-img></x-vaccine-img>
</x-panels.panel-login>
</x-layout>
