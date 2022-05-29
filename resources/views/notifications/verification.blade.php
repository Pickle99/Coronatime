<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">



<body style=" display:flex;
         justify-content: center;
         justify-items: center;
         align-items: center;
         font-family:'Inter', sans-serif;">
<div class="verify">
    <div style="display:flex;
         flex-direction: column;
         align-items:center;"><img style="width:40rem;" src="{{asset('/images/coronascreen.png')}}" alt="img"></div>
    <div style="display:flex;
         flex-direction: column;
         align-items: center;
         margin-top:50px;">
        <h1 class="font-size: 25px;
         color: #010414;">Confirmation email</h1>
        <p style="margin-top:-2px;
         font-size: 18px;
         color: darkgray;">click this button to verify your email</p>
        <div style="border-radius: 8px;
         padding: 20px 100px;
         background: #0FBA68;
         margin-top:40px;">  <a style="text-decoration:none;
         color:#ffffff;
         padding: 20px 150px;" href="{{url('/user/verify/' . $user->verifyUser->token)}}">VERIFY EMAIL</a></div></div>

</div>
</body>
