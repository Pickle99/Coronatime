<x-layout>
    <div class="mt-10 mx-auto w-full max-w-sm lg:w-96 px-4 lg:px-0">
        <div class="lg:flex lg:justify-center">
            <img class="h-12 lg:mb-20 h-auto" src="{{asset('/images/coronalogo.png')}}" alt="Workflow">
        </div>
        <div>
            <h2 class="text-center mob:my-16 mob:text-3xl lg:mt-24 lg:mb-14 lg:text-4xl font-extrabold text-black"> {{__("translate.reset_password")}}</h2>
        </div>

        <div class="mt-8">
            <div class="mt-6">
                <form action="/forgot/password" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-lg lg:text-sm font-bold text-black"> {{__("translate.email")}} </label>
                        <div class="mt-1 group flex items-center">
                            <input id="email" placeholder="{{__("translate.email")}}" name="email"
                                   type="email"
                                  class="{{$errors->has('email') ? 'appearance-none block w-full px-6 py-4 border  border-red-500 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' : 'appearance-none block w-full px-6 py-4 border  border-green-500 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm'}}">
                            <div class="{{$errors->has('email') ? 'hidden' : '-ml-10 group-focus-within:hidden'}}">
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
          <x-submit-button class="mt-100 lg:mt-1">{{__("translate.reset_password")}}</x-submit-button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
