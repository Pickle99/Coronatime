<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">


<body>
<div style="font-family:'Inter', sans-serif; width:100%; text-align:center;">
    <div><img style="width:40rem;" src="{{asset('/images/coronascreen.png')}}" alt="img"></div>
    <div style="margin-top:50px; position:relative; margin-bottom:50px; ">
        <h1 style="font-size: 25px;
         color: #010414;">Recover password</h1>
        <p style="margin-top:-2px;
         font-size: 18px;
         margin-bottom:40px;
         color: darkgray;">click this button to recover a password</p>
        <span style="
        border-radius: 8px;
         background: #0FBA68; padding: 20px 90px">  <a style="text-decoration:none;
         color:#ffffff;
         font-size:15px;" href="{{url('/reset/password/' . $resetPassword->token . '=' .$resetPassword->email)}}">RECOVER PASSWORD</a></span></div>

</div>
</body>
