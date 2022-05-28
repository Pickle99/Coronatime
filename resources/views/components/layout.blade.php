<link href="{{asset('css/app.css')}}" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<body class="font-inter">
        {{ $slot }}

        @if(!request()->is('dashboard'))
            <div class="absolute top-0 flex lg:flex-col justify-center lg:h-full lg:items-center">
                <a href="/language/en" class="text-gray-700 block px-4 text-lg" role="menuitem" tabindex="-1" id="menu-item-1">{{__('translate.english')}}</a>
                <a href="/language/ka" class="text-gray-700 block px-4 text-lg" role="menuitem" tabindex="-1" id="menu-item-2">{{__('translate.georgian')}}</a>
            </div>
        @endif
</body>
