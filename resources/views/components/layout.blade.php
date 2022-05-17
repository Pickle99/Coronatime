<link href="{{asset('css/app.css')}}" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">

<body class="font-inter">
<div class="min-h-full flex">
    <div class="mr-40 flex-1 flex flex-col justify-start py-12 px-4  sm:px-6 lg:flex-none lg:px-60 xl:px-60">
        {{ $slot }}
    </div>
    <div class="hidden lg:block relative w-0 flex-1">
        <img class="absolute inset-0 h-full w-full object-cover" src="{{asset('storage/images/vaccines.png')}}" alt="">
    </div>
</div>
</body>
