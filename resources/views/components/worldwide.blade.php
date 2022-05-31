


<div class="flex flex-col items-center lg:justify-center lg:flex lg:flex-row">
    <div class="w-80 lg:w-96 px-24 py-10 lg:px-36 lg:py-10 flex flex-col items-center  bg-opacity-0.08   mt-10 bg-newcases rounded-2xl shadow-custombox">
        <img class="w-24 h-10" src="{{asset('/images/blue.png')}}" alt="new cases" />
        <div class="w-56 lg:w-96 flex justify-center">
            <p class="my-5 text-lg lg:text-3xl ">{{__('translate.new_cases')}}</p>
        </div>
        <p class="mt-2 text-newcases font-extrabold text-3xl lg:text-5xl">{{$confirmed}}</p>
    </div>

    <div class="flex lg:flex-row mb-10 lg:mb-0">
        <div class="w-40 lg:w-96 px-3 py-10 mr-4 lg:px-36 lg:py-10 flex flex-col items-center  bg-opacity-0.08  lg:mx-20 mt-10 bg-greener rounded-2xl shadow-custombox">
            <img class="w-24 h-10" src="{{asset('/images/green.png')}}" alt="new cases" />
            <div>
                <p class="my-5 text-lg lg:text-3xl ">{{__('translate.recovered')}}</p>
            </div>
            <p class="mt-2 text-greener font-extrabold text-3xl lg:text-5xl">{{$recovered}}</p>
        </div>
        <div class="w-40 lg:w-96 px-3 py-10 lg:px-36 lg:py-10 flex flex-col items-center  bg-opacity-0.08   mt-10 bg-yellowb rounded-2xl shadow-custombox">
            <img class="w-24 h-10" src="{{asset('/images/yellow.png')}}" alt="new cases" />
            <div>
                <p class="my-5 text-lg lg:text-3xl ">{{__('translate.death')}}</p>
            </div>
            <p class="text-yellowb mt-2 font-extrabold text-3xl lg:text-5xl">{{$deaths}}</p>
        </div>
    </div>
</div>

