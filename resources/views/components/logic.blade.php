

@if(is_null($page))
    <x-worldwide :confirmed="$confirmed" :recovered="$recovered" :deaths="$deaths"></x-worldwide>
@elseif($page === 'worldwide')
    <x-worldwide :confirmed="$confirmed" :recovered="$recovered" :deaths="$deaths"></x-worldwide>
@elseif($page==='country')
    <x-by-country :statistics="$statistics"  :confirmed="$confirmed" :recovered="$recovered" :deaths="$deaths"></x-by-country>
@else
    <x-worldwide></x-worldwide>
@endif
