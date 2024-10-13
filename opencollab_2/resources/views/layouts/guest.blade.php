<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
       
       
<style>
   #icon{
    position: fixed;
    position: absolute;
    top: 9%;
    left: 50%;
    transform: translate(-50%, -50%);
    }
  .center_div {
    position: fixed;
    position: absolute;
    top: 52%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
  }
  .animation {
    animation: mymove 3s;
    position: relative;
  }
  .animation #Form_div {
    padding-bottom: 20px;
    animation: form_div 3s;
  }
  @keyframes mymove {
    0% {
      z-index: 10;
      top: 0;
      left: 0;
    }
    50% {
      top: 0;
      left: 400px;
      z-index: 0
    }
    100% {
      top: 0;
      left: 0;
      z-index: 0;
    }
  }

  @keyframes form_div {
    0% {
      height: 360px;
    }
    50% {
      height: 310px;
    }
    100% {
      height: 270px;
    }
  }
</style>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-600 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-rose-100">
            <div class="w-full flex justify-center mt-6">
                <div id="register"  class="text-lg font-medium text-gray-200">
                    {{$hed_register}}
                    <div id="Form_div" class="w-[350px] sm:max-w-md px-6 py-4 bg-rose-900 shadow-md overflow-hidden rounded-b-[25px] rounded-tr-[25px]">
                        {{ $slot_register }}
                    </div>
                </div>
                <div id="login" class="text-lg font-medium text-gray-200">
                    {{$hed_login}}
                    <div  class="w-[350px] sm:max-w-md px-6 py-4 bg-rose-900 shadow-md overflow-hidden rounded-b-[25px] rounded-tr-[25px]">
                        {{ $slot_login}}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


<script>
  let clk= false 
  const Login = document.getElementById("login");
  const Register = document.getElementById("register");
  const B_Login = document.getElementById("b_login");
  const B_Register = document.getElementById("b_register");
  Login.classList.add("hidden");
  

console.log(B_Login)
  B_Register.addEventListener("click", () => {
    if (!clk) {
      clk=true
      switch_form(Login, Register);
    }
  });
  B_Login.addEventListener("click", () => {
    if (!clk) {
    clk=true
    switch_form(Register, Login);
    }
  });



  function switch_form(a, b) {
    a.classList.add("animation");
    b.classList.add("center_div");
    b.classList.remove("hidden");
    setTimeout(() => {
      a.classList.add("hidden");
      a.classList.remove("animation");
      b.classList.remove("center_div");
      clk=false
    }, "2900");
  }
</script>
