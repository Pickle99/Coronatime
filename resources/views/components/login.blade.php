<x-layout>

   <x-panel-login>
       <x-panel-login-flex>
           <div class="mx-auto w-full max-w-sm lg:w-96">
               <div>
                   <img class="h-12 mb-20 w-auto" src="{{asset('storage/images/coronalogo.png')}}" alt="Workflow">
                   <h2 class="mb-4 text-4xl font-bold text-black">{{__('translate.Welcome back')}}</h2>
                   <p class="mt-2 text-lg text-gray-400">
                       {{__('translate.Welcome back! Please enter your details')}}
                   </p>
               </div>

               <div class="mt-8">
                   <div class="mt-6">
                       <form method="POST"  action="/sessions" class="space-y-6">
                           @csrf
                           <div>
                               <label for="username" class="block text-sm font-bold text-black">{{__('translate.username', ['name' => 'Username'])}}</label>
                               <div class="mt-1">
                                   <input id="username" value="{{old('user')}}" placeholder="{{__('translate.Enter unique username or email')}}" name="user" type="text" class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                               </div>
                               @error("user")
                               <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                               @enderror
                           </div>


                           <div>
                               <label for="password" class="block text-sm font-bold text-black">{{__('translate.password')}}</label>
                               <div class="mt-1">
                                   <input id="password" value="{{old('password')}}" placeholder="{{__('translate.Fill in password')}}" name="password" type="password" class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                               </div>
                               @error('password')
                               <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                               @enderror
                           </div>

                           <div class="flex items-center justify-between">
                               <div class="flex items-center">
                                   <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                   <label for="remember-me" class="ml-2 block text-sm text-gray-900">{{__('translate.remember me')}} </label>
                               </div>

                               <div class="text-sm">
                                   <a href="/reset-password" class="font-medium text-indigo-600 hover:text-indigo-500">{{__('translate.forgot your password?')}}</a>
                               </div>
                           </div>

                           <x-submit-button>{{__('translate.log in')}}</x-submit-button>
                       </form>
                       <p class="mt-2 text-center text-sm text-gray-400">
                           {{__("translate.Don't have an account?")}}
                           <a href="/register" class=" ml-2 font-medium text-black hover:text-indigo-500"> {{__('translate.Sign up for free')}} </a>
                       </p>
                   </div>
               </div>
           </div>
           <div>
           </div>
       </x-panel-login-flex>
       <x-vaccine-img></x-vaccine-img>
   </x-panel-login>
</x-layout>
