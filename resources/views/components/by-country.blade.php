
<div class="px-4 sm:px-6 lg:px-8 mx-2 lg:mx-44">
    <div class="my-10 flex items-center   border-2 rounded-xl w-fit">
        <div class="px-4"><img src="{{asset('storage/images/search.png')}}" alt="img"/></div>
        <form class="mt-3.5" method="GET" action="#">
            @if(request('page'))
                <input type="hidden" name="page" value="{{request('page')}}"/>
                <input type="hidden" name="sort" value="{{request('sort')}}"/>
            @endif
            <input class="focus:outline-none" placeholder="{{__('translate.search')}}" type="text" name="search" value="{{request('search')}}"/>
        </form>
    </div>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                <span  class="group inline-flex items-center">
                                    {{__('translate.location')}}
                                    <span class="flex-none rounded">
                                        <div class="ml-2">
                                        <a href="/dashboard?{{http_build_query(request()->except('sort'))}}&sort=country_asc"> <img class="-mb-2" alt="img" src="{{asset('/storage/images/vector.png')}}"/></a>
                                       <a href="/dashboard?{{http_build_query(request()->except('sort'))}}&sort=country_desc"> <img class="rotate-180" alt="img" src="{{asset('/storage/images/vector.png')}}"/></a>
                                    </div>
                    </span>
                                </span>
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                <span class="group inline-flex items-center">
                                    {{__('translate.new_cases')}}
                    <span class="flex-none rounded">

                                      <div class="ml-2">
                                        <a href="/dashboard?{{http_build_query(request()->except('sort'))}}&sort=cases_asc"> <img class="-mb-2" alt="img" src="{{asset('/storage/images/vector.png')}}"/></a>
                                       <a href="/dashboard?{{http_build_query(request()->except('sort'))}}&sort=cases_desc"> <img class="rotate-180" alt="img" src="{{asset('/storage/images/vector.png')}}"/></a>
                                    </div>

                    </span>
                                </span>
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                <span  class="group inline-flex items-center">
                                    {{__('translate.deaths')}}
                                    <span class="flex-none rounded">
                                         <div class="ml-2">
                                        <a href="/dashboard?{{http_build_query(request()->except('sort'))}}&sort=deaths_asc"> <img class="-mb-2" alt="img" src="{{asset('/storage/images/vector.png')}}"/></a>
                                       <a href="/dashboard?{{http_build_query(request()->except('sort'))}}&sort=deaths_desc"> <img class="rotate-180" alt="img" src="{{asset('/storage/images/vector.png')}}"/></a>
                                    </div>
                    </span>
                                </span>

                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                <span class="group inline-flex items-center">
                                    {{__('translate.recovered')}}
                                    <span class="flex-none rounded">
                                        <div class="ml-2">
                                        <a href="/dashboard?{{http_build_query(request()->except('sort'))}}&sort=recovered_asc"> <img class="-mb-2" alt="img" src="{{asset('/storage/images/vector.png')}}"/></a>
                                       <a href="/dashboard?{{http_build_query(request()->except('sort'))}}&sort=recovered_desc"> <img class="rotate-180" alt="img" src="{{asset('/storage/images/vector.png')}}"/></a>
                                    </div>
                    </span>
                                </span>

                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{__('translate.worldwide')}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$confirmed}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$deaths}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$recovered}}</td>
                        </tr>
                        @foreach($countries as $country)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$country->name}}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{number_format($country->infos->confirmed)}}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{number_format($country->infos->deaths)}}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{number_format($country->infos->recovered)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
