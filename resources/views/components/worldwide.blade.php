
<div class="flex justify-center">
    <div class="px-36 py-10 flex flex-col items-center  bg-opacity-0.08   mt-10 bg-newcases rounded-2xl shadow-custombox w-fit">
        <img src="{{asset('/storage/images/blue.png')}}" alt="new cases" />
        <p class="my-5 text-2xl ">{{__('translate.new_cases')}}</p>
        <p class="mt-2 font-extrabold text-5xl">{{$confirmed}}</p>
    </div>
    <div class="px-36 py-10 flex flex-col items-center  bg-opacity-0.08  mx-20 mt-10 bg-greener rounded-2xl shadow-custombox w-fit">
        <img src="{{asset('/storage/images/green.png')}}" alt="new cases" />
        <p class="my-5 text-2xl ">{{__('translate.recovered')}}</p>
        <p class="mt-2 font-extrabold text-5xl">{{$recovered}}</p>
    </div>
    <div class="px-36 py-10 flex flex-col items-center  bg-opacity-0.08   mt-10 bg-yellowb rounded-2xl shadow-custombox w-fit">
        <img src="{{asset('/storage/images/yellow.png')}}" alt="new cases" />
        <p class="my-5 text-2xl ">{{__('translate.death')}}</p>
        <p class="mt-2 font-extrabold text-5xl">{{$deaths}}</p>
    </div>
</div>
