<x-layout>

   <x-panels.panel-login>
       <x-panels.login-flex>
           <div class="lg:mx-auto lg:w-full lg:max-w-sm lg:w-96 lg:ml-20">
               <div>
                   <img class=" mt-16 mb-10 lg:h-12  w-auto" src="{{asset('/images/coronalogo.png')}}" alt="Workflow">
                   <h2 class="text-3xl lg:mb-4 lg:text-4xl font-bold text-black">{{__('translate.welcome_back')}}</h2>
                   <p class="mt-2 text-lg text-gray-400">
                       {{__('translate.welcome_back_please_enter_your_details')}}
                   </p>
               </div>

               <div class="mt-8">
                   <div class="mt-6">
                       <form method="POST"  action="{{route('login')}}" class="space-y-6" id="form">
                           @csrf
                           <div>
                               <label for="user" class="block text-lg lg:text-sm font-bold text-black">{{__('translate.username')}}</label>
                               <div class="mt-1 group flex items-center">
                                   <input id="user" value="{{old('user')}}" placeholder="{{__('translate.enter_unique_username_or_email')}}" name="user" type="text"
                                   class="appearance-none block w-full px-6 py-4 border  @if($errors->has('user')) border-red-500  @elseif(!$errors->has('user') && $errors->any()) border-green-500  @endif rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              <div class="@if(!$errors->has('user') && $errors->any())-ml-10 group-focus-within:hidden @else  hidden @endif">
                                  <img class="" src="{{asset('/images/ok.png')}}" alt="img">
                              </div>
                               </div>
                               @error("user")
                             <div class="flex items-center">
                                 <img class="flex mr-2" src="{{asset('images/err.png')}}" alt="img"/>
                                 <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                             </div>
                               @enderror
                           </div>


                           <div>
                               <label for="password" class="block text-lg lg:text-sm font-bold text-black">{{__('translate.password')}}</label>
                               <div class="mt-1 group flex items-center">
                                   <input id="password" value="{{old('password')}}" placeholder="{{__('translate.fill_in_password')}}" name="password" type="password"
class="appearance-none block w-full px-6 py-4 border @if($errors->has('password')) border-red-500  @elseif(!$errors->has('password') && $errors->any()) border-green-500 @endif rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                   <div class='@if(!$errors->has('password') && $errors->any())-ml-10 group-focus-within:hidden @else  hidden @endif'>
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

                           <div class="flex items-center justify-between">
                               <div class="flex items-center">
                                   <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                   <label for="remember-me" class="ml-2 block text-sm text-gray-900">{{__('translate.remember_me')}} </label>
                               </div>

                               <div class="text-sm">
                                   <a href="/forgot/password" class="font-medium text-indigo-600 hover:text-indigo-500">{{__('translate.forgot_your_password')}}</a>
                               </div>
                           </div>

                           <x-submit-button>{{__('translate.log_in')}}</x-submit-button>
                       </form>
                       <p class="mt-2 text-center text-sm text-gray-400">
                           {{__("translate.dont_have_an_account")}}
                           <a href="/register" class=" ml-2 font-medium text-black hover:text-indigo-500"> {{__('translate.sign_up_for_free')}} </a>
                       </p>
                   </div>
               </div>
           </div>
           <div>
           </div>
       </x-panels.login-flex>
       <x-vaccine-img></x-vaccine-img>
   </x-panels.panel-login>
</x-layout>
