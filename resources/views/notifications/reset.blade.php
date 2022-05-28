<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
 <style>
     body{
         display:flex;
         justify-content: center;
         justify-items: center;
         align-items: center;
         font-family:'Inter', sans-serif;
     }

     .image{
         display:flex;
         flex-direction: column;
         align-items:center;
     }
     img{
         width:40rem;
     }
     .header{
         display:flex;
         flex-direction: column;
         align-items: center;
         margin-top:50px;
     }

     .link {
         border-radius: 8px;
         padding: 20px 100px;
         background: #0FBA68;
         margin-top:40px;
     }

     a {

         text-decoration:none;
         color:#ffffff;
         padding: 20px 150px;

     }
     p{
         margin-top:-2px;
         font-size: 18px;
         color: darkgray;
     }

     h1{
         font-size: 25px;
         color: #010414;
     }
     @media only screen and (max-width:500px) {
         body{
             display:flex;
             justify-content: center;
             justify-items: center;
             align-items: center;
             font-family:'Inter', sans-serif;
         }

         .image{
             display:flex;
             flex-direction: column;
             align-items:center;
         }
         img{
             width:20rem;
         }
         .header{
             display:flex;
             flex-direction: column;
             align-items: center;
             margin-top:50px;
         }

         .link {
             border-radius: 8px;
             padding: 10px 50px;
             background: #0FBA68;
             margin-top:40px;
         }

         a {

             text-decoration:none;
             color:#ffffff;
             padding: 20px 30px;

         }
         p{
             margin-top:-2px;
             font-size: 18px;
             color: darkgray;
         }

         h1{
             font-size: 25px;
             color: #010414;
         }
     }

 </style>
<body>
<div class="verify">
    <div class="image"><img class="corona-img" src="{{asset('/images/coronascreen.png')}}" alt="img"></div>
    <div class="header">
        <h1>Recover password</h1>
        <p>click this button to recover a password</p>
      <div class="link">  <a href="{{url('/reset/password/' . $resetPassword->token . '=' .$resetPassword->email)}}">RECOVER PASSWORD</a></div></div>

</div>
</body>
