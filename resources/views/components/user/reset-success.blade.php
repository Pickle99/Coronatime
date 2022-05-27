<x-layout>
    <div class="mt-10 mx-auto w-full max-w-sm lg:w-96 px-4 lg:px-0">
        <div class="flex justify-center"><img class="h-12 mb-20 h-auto" src="{{asset('/images/coronalogo.png')}}" alt="Workflow"></div>
        <div>
            <div class="flex justify-center"><img class="mt-40 h-12" src="{{asset('storage/images/ic.png')}}" alt="Workflow"></div>
            <p class="text-center mt-6 text-lg text-gray-900"> {{__('translate.success_reset')}}</p>
        </div>
        <a class="mt-36 mob:mt-36 lg:mt-20 mb-10 mob:mb-0 w-full flex justify-center py-4 px-4 border border-transparent rounded-md shadow-sm text-sm font-extrabold text-white bg-greener hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="/login">{{strtoupper(__('translate.sign_in'))}}</a>
    </div>
</x-layout>
