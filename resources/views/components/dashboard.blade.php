<x-layout>
<header class="border-b-2 h-20 flex items-center justify-between">
        <img class="ml-52 h-12 w-auto" src="{{asset('storage/images/coronalogo.png')}}" alt="Workflow">
       <div class="flex items-center">
       <x-dropdown></x-dropdown>

          <h1 class="ml-10 font-extrabold text-black">{{auth()->user()->username}}</h1>

           <div class="mx-5 border-r-4"></div>

             <div class="mt-4 items-center">
                 <form method="POST" action="/logout">
                     @csrf
                     <button class="mr-52 text-sm " type="submit"> {{__('translate.logout')}}</button>
                 </form>
             </div>

       </div>
</header>
    <div class="mx-52 mt-10">
        <h1 class="font-extrabold text-black text-3xl">{{__('translate.worldwidestats')}}</h1>
        <div class="flex mt-10 h-10 border-b-2">
                <a href="/dashboard?page=worldwide" class="{{$page === 'worldwide' || is_null($page) ? 'font-bold border-b-4 border-black text-xl mr-20' : 'text-xl mr-20'}}" >{{__('translate.worldwide')}}</a>
                <a href="/dashboard?page=country"  class="{{$page === 'country' ? 'font-bold border-b-4 border-black text-xl mr-20' : 'text-xl mr-20'}}" >{{__('translate.bycountry')}}</a>
            </div>
    </div>
    <div>
    <x-logic :page="$page" :countries="$countries" :infos="$infos" :confirmed="$confirmed" :recovered="$recovered" :deaths="$deaths"></x-logic>
    </div>

</x-layout>
