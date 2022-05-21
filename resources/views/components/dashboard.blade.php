<x-layout>
<header class="border-b-2 h-20 flex items-center justify-between">
        <img class="ml-20 h-12 w-auto" src="{{asset('storage/images/coronalogo.png')}}" alt="Workflow">
       <div class="flex items-center">
           <p>English</p>
          <h1 class="ml-10 font-extrabold text-black">Takeshi K.</h1>
           <div class="mx-5 border-r-2"></div>

             <div class="mt-4 items-center">
                 <form method="POST" action="/logout">
                     @csrf
                     <button class="mr-20 text-sm " type="submit"> Logout</button>
                 </form>
             </div>

       </div>
</header>
    <div class="ml-20 mt-10">
        <h1 class="font-extrabold text-black text-3xl">Worldwide Statistics</h1>
       @if(is_null($page))
            <div class="flex mt-10 h-10 border-b-2">
                <a href="/dashboard?page=worldwide" class="text-xl mr-20" >Worldwide</a>
                <a href="/dashboard?page=country"  class="text-xl"  >By country</a>
            </div>
        @elseif($page === 'worldwide')
            <div class="flex mt-10 h-10 border-b-2">
                <a href="/dashboard?page=worldwide" class="font-bold text-xl mr-20" >Worldwide</a>
                <a href="/dashboard?page=country"  class="text-xl"  >By country</a>
            </div>
        @elseif($page === 'country')
            <div class="flex mt-10 h-10 border-b-2">
                <a href="/dashboard?page=worldwide" class="text-xl mr-20" >Worldwide</a>
                <a href="/dashboard?page=country"  class="font-bold  text-xl"  >By country</a>
            </div>
        @endif


    </div>

</x-layout>
