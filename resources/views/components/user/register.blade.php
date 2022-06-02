<x-layout>
<x-panels.panel-login>
    <x-panels.login-flex>
        <div class="lg:mx-auto lg:w-full lg:max-w-sm lg:w-96 lg:ml-20 mb-8 lg:mb-0">
            <div>
                <img class="mt-4 mob:mt-16 mb-4 mob:mt-10 h-12 xl:mb-20  w-auto" src="{{asset('/images/coronalogo.png')}}" alt="Workflow">
                <h2 class="{{'mb-4 text-2xl lg:text-3xl font-bold text-black'}}" >{{__('translate.welcome_back_to_coronatime')}}</h2>
                <p class="mt-2 text-lg text-gray-400">
                  {{__('translate.please_enter_required_info_to_sing_up')}}
                </p>
            </div>

            <div class="mob:mt-8">
                <div class=" mob:mt-6 mb-0 lg:mb-10">
                    <form method="POST" action="{{route('register.store')}}" class="space-y-6">
                        @csrf
                            <div>
                                <label for="username" class="block text-xs mob:text-lg font-bold text-black">{{__('translate.username')}}</label>
                                <div class="mt-1 group flex items-center">
                                    <input id="username" value="{{old('username')}}" placeholder="{{__('translate.enter_unique_username')}}" name="username" type="text"
                                           class="appearance-none block w-full px-6 py-4 border  @if($errors->has('username')) border-red-500  @elseif(!$errors->has('username') && $errors->any()) border-green-500  @endif rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <div class="@if(!$errors->has('username') && $errors->any())-ml-10 group-focus-within:hidden @else  hidden @endif">
                                        <img class="" src="{{asset('/images/ok.png')}}" alt="img">
                                    </div>
                                </div>
                                @error('username')
                                <div class="flex items-center">
                                    <img class="flex mr-2" src="{{asset('images/err.png')}}" alt="img"/>
                                    <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                                </div>
                                @enderror
                            </div>

                        <div>
                            <label for="email" class="block text-xs mob:text-lg font-bold text-black">{{__('translate.email')}}</label>
                            <div class="mt-1 group flex items-center">
                                <input id="email" value="{{old('email')}}" placeholder="{{__('translate.enter_your_email')}}" name="email" type="email"
                                       class="appearance-none block w-full px-6 py-4 border  @if($errors->has('email')) border-red-500  @elseif(!$errors->has('email') && $errors->any()) border-green-500  @endif rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <div class="@if(!$errors->has('email') && $errors->any())-ml-10 group-focus-within:hidden @else  hidden @endif">
                                    <img class="" src="{{asset('/images/ok.png')}}" alt="img">
                                </div>
                            </div>
                            @error('email')
                            <div class="flex items-center">
                                <img class="flex mr-2" src="{{asset('images/err.png')}}" alt="img"/>
                                <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                            </div>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-xs mob:text-lg font-bold text-black"> {{__('translate.password')}}</label>
                            <div class="mt-1 group flex items-center">
                                <input id="password" value="{{old('password')}}"  placeholder="{{__('translate.fill_in_password')}}" name="password" type="password"
                                       class="appearance-none block w-full px-6 py-4 border  @if($errors->has('password')) border-red-500  @elseif(!$errors->has('password') && $errors->any()) border-green-500  @endif rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <div class="@if(!$errors->has('password') && $errors->any())-ml-10 group-focus-within:hidden @else  hidden @endif">
                                    <img class="" src="{{asset('/images/ok.png')}}" alt="img">
                                </div>
                            </div>
                            @error('password')
                            <div class="flex items-center">
                                <img class="flex mr-2" src="{{asset('images/err.png')}}" alt="img"/>
                                <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                            </div>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="repeat" class="block text-xs mob:text-lg font-bold text-black"> {{__('translate.repeat_password')}}</label>
                            <div class="mt-1 group flex items-center">
                                <input id="repeat" value="{{old('repeat')}}"  placeholder="{{__('translate.repeat_password')}}" name="repeat" type="password"
                                       class="appearance-none block w-full px-6 py-4 border  @if($errors->has('repeat')) border-red-500  @elseif(!$errors->has('repeat') && $errors->any()) border-green-500  @endif rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <div class="@if(!$errors->has('repeat') && $errors->any())-ml-10 group-focus-within:hidden @else  hidden @endif">
                                    <img class="" src="{{asset('/images/ok.png')}}" alt="img">
                                </div>
                            </div>
                            @error('repeat')
                            <div class="flex items-center">
                                <img class="flex mr-2" src="{{asset('images/err.png')}}" alt="img"/>
                                <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                            </div>
                            @enderror
                        </div>

                        <x-submit-button>{{__('translate.sign_up')}}</x-submit-button>
                    </form>
                    <p class="mt-2 text-center text-sm text-gray-400">
                        {{__('translate.already_have_an_account')}}
                        <a href="{{route('login.view')}}" class="font-medium text-black hover:text-indigo-500">{{__('translate.log_in')}} </a>
                    </p>
                </div>
            </div>
        </div>
    </x-panels.login-flex>
    <x-vaccine-img></x-vaccine-img>
</x-panels.panel-login>
</x-layout>
