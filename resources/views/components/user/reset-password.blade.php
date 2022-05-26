<x-layout>
    <div class="mt-10 mx-auto w-full max-w-sm lg:w-96">
        <div class="lg:flex lg:justify-center">
            <img class="h-12 lg:mb-10 h-auto" src="{{asset('storage/images/coronalogo.png')}}" alt="Workflow">
        </div>
        <div>
            <h2 class="text-center mob:my-16 lg:my-20 mob:text-3xl lg:mt-24 lg:mb-14 lg:text-4xl font-extrabold text-black"> {{__("translate.reset_password")}}</h2>
        </div>

        <div class="mt-8 ">
            <div class="mt-6">
                <form action="{{route('password.update', $token)}}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="token" value="{{$token}}"/>
                    <input type="hidden" name="email" value="{{$user}}"/>
                    <div>
                        <label for="password" class="block text-lg lg:text-sm font-bold text-black"> {{__("translate.new_password")}} </label>
                        <div class="mt-1">
                            <input id="password" placeholder="{{__("translate.enter_new_password")}}" name="password" type="password" class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        @error('password')
                        <p class="text-red-500 text-lg mt-1">{{__("translate.$message")}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="passwords" class="block text-lg lg:text-sm font-bold text-black"> {{__("translate.repeat_password")}} </label>
                        <div class="mt-1">
                            <input id="passwords" placeholder="{{__("translate.repeat_password")}}" name="password_confirmation" type="password" class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                  <x-submit-button class="mt-80 lg:mt-1">{{__("translate.save")}}</x-submit-button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
