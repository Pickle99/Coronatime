@props(['page'])

@if(is_null($page))
    <x-worldwide></x-worldwide>
@elseif($page === 'worldwide')
    <x-worldwide></x-worldwide>
@elseif($page==='country')
    <x-by-country></x-by-country>
@else
    <x-worldwide></x-worldwide>
@endif
