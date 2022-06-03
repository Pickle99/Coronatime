<x-layout>
<header class="border-b-2 h-20 flex items-center justify-between">
        <img class="ml-4 w-30 h-10 lg:ml-52 h-12 lg:w-auto" src="{{asset('/images/coronalogo.png')}}" alt="Workflow">
       <div class="flex items-center">
       <x-dropdown class="mr-5 lg:mr-0"></x-dropdown>

          <h1 class="lg:ml-10 hidden lg:block font-extrabold text-black">{{auth()->user()->username}}</h1>
           <span class="mr-5 block lg:hidden group">
              <img class="" src="{{asset('/images/drop.png')}}" alt="dropdown"/>
              <div class="absolute top-16 right-4 hidden group-hover:block">
                  <a class="lg:ml-10 font-extrabold text-black">{{auth()->user()->username}}</a>
                 <div class="items-center">
                 <form method="POST" action="{{route('logout')}}">
                     @csrf
                     <button class="text-sm " type="submit"> {{__('translate.logout')}}</button>
                 </form>
             </div>
              </div>
          </span>
           <div class="lg:mx-4 border-r-4"></div>

             <div class="mt-4 items-center hidden lg:block">
                 <form method="POST" action="{{route('logout')}}">
                     @csrf
                     <button class="mr-4 lg:mr-52 text-sm " type="submit"> {{__('translate.logout')}}</button>
                 </form>
             </div>

       </div>
</header>
    <div class="mx-4 mt-10 lg:mx-52 lg:mt-10">
        <h1 class="text-black text-2xl font-bold lg:text-3xl">{{__('translate.worldwide_stats')}}</h1>
        <div class="flex mt-10 h-10 border-b-2">
                <a href="/dashboard?page=worldwide&{{http_build_query(request()->except('page'))}}" class="{{$page === 'worldwide' || is_null($page) ? 'font-bold border-b-4 border-black text-lg   mr-20' : 'text-lg mr-20'}}" ><span class="block w-auto">{{__('translate.worldwide')}}</span></a>
            <a href="/dashboard?page=country&{{http_build_query(request()->except('page'))}}"  class="{{$page === 'country' ? 'w-fit font-bold border-b-4 border-black text-lg  mr-20' : 'text-lg mr-20'}}" ><span class="block w-auto">{{__('translate.by_country')}}</span></a>
            </div>
    </div>
    <div>
    <x-logic :page="$page" :statistics="$statistics" :confirmed="$confirmed" :recovered="$recovered" :deaths="$deaths"></x-logic>
    </div>

</x-layout>
