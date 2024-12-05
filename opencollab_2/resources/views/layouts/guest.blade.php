<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            :root {
                --color-primary: #904c7b;
                --color-secondary: #591c46;
                --color-accent-1: #e46793;
                --color-accent-2: #f66477;
            }

            #icon {
                position: fixed;
                position: absolute;
                top: 9%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .center_div {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 1;
            }
            .mo_a {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .animation {
                animation: mymove 3s;
                position: relative;
                top: 125px;
            }
            .animation #Form_div {
                padding-bottom: 20px;
                animation: form_div 3s;
            }
            @keyframes mymove {
                0% {
                    z-index: 10;
                    left: 0;
                }
                50% {
                    left: 400px;
                    z-index: 0;
                }
                100% {
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
            .background-animation {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(45deg, var(--color-primary), var(--color-secondary));
                background-size: 400% 400%;
                animation: gradientBG 15s ease infinite;
                z-index: -1;
                overflow: hidden;
            }
            .background-folder {
                position: absolute;
                transform-style: preserve-3d;
                perspective: 1000px;
                opacity: 0.7;
                transition: all 0.5s ease;
            }
            .background-folder:hover {
                transform: scale(1.1) rotate(10deg);
                opacity: 1;
            }
            .background-folder svg {
                transition: all 0.5s ease;
            }
            @keyframes gradientBG {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            @keyframes folderFloat {
                0%, 100% { transform: translateY(0) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(5deg); }
            }

            /* Enhanced Form Styling */
            #Form_div {
                background-color: var(--color-secondary);
                width: 350px;
                max-width: 100%;
                padding: 2rem;
                box-shadow: 0 10px 25px rgba(0,0,0,0.2);
                position: relative;
                overflow: hidden;
            }

            #Form_div::before {
                content: '';
                position: absolute;
                top: -50px;
                left: -50px;
                width: 100px;
                height: 100px;
                background: rgba(255,255,255,0.1);
                transform: rotate(45deg);
                z-index: 1;
            }

            #Form_div input[type="text"],
            #Form_div input[type="email"],
            #Form_div input[type="password"] {
                width: 100%;
                padding: 0.75rem;
                margin-bottom: 1rem;
                border: 2px solid var(--color-accent-1);
                border-radius: 10px;
                background-color: rgba(255,255,255,0.1);
                color: var(--color-text-light);
                font-size: 1rem;
                transition: all 0.3s ease;
            }

            #Form_div input[type="text"]:focus,
            #Form_div input[type="email"]:focus,
            #Form_div input[type="password"]:focus {
                outline: none;
                border-color: var(--color-accent-2);
                box-shadow: 0 0 10px rgba(228,103,147,0.5);
            }

            #Form_div input[type="text"]::placeholder,
            #Form_div input[type="email"]::placeholder,
            #Form_div input[type="password"]::placeholder {
                color: rgba(255,255,255,0.7);
            }

            #Form_div button {
                width: 100%;
                padding: 0.75rem;
                background-color: var(--color-accent-1);
                color: var(--color-text-light);
                border: none;
                border-radius: 10px;
                font-weight: bold;
                transition: all 0.3s ease;
            }

            #Form_div button:hover {
                background-color: var(--color-accent-2);
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            }

            #Form_div label {
                color: var(--color-text-light);
                margin-bottom: 0.5rem;
                display: block;
                font-weight: 500;
            }

            /* Error Message Styling */
            #Form_div .text-red-500 {
                color: var(--color-accent-2);
                font-size: 0.875rem;
                margin-top: -0.5rem;
                margin-bottom: 1rem;
            }
        </style>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-600 antialiased">
        <div class="background-animation" id="backgroundAnimation"></div>
        <div class="w-full flex justify-center mt-6">
            <div id="register"  class="text-lg font-medium text-gray-200 mo_a">
                {{$hed_register}}
                <div id="Form_div" class="w-[350px] sm:max-w-md px-6 py-4 bg-rose-900 shadow-md overflow-hidden rounded-b-[25px] rounded-tr-[25px]">
                    {{ $slot_register }}
                </div>
            </div>
            <div id="login" class="text-lg font-medium text-gray-200 mo_a">
                {{$hed_login}}
                <div id="Form_div" class="w-[350px] sm:max-w-md px-6 py-4 bg-rose-900 shadow-md overflow-hidden rounded-b-[25px] rounded-tr-[25px]">
                    {{ $slot_login}}
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
    a.classList.remove("mo_a");
    a.classList.add("animation");
    b.classList.add("center_div");
    b.classList.remove("hidden");
    setTimeout(() => {
      a.classList.add("hidden");
      a.classList.remove("animation");
      b.classList.remove("center_div");
      b.classList.add("mo_a");
      clk=false
    }, "2900");
  }
  function createFolders() {
  const background = document.getElementById('backgroundAnimation');
  const folderColors = [
    'var(--color-accent-1)',
    'var(--color-accent-2)',
    'var(--color-primary)',
    'var(--color-secondary)',
  ];

  for (let i = 0; i < 10; i++) {
    const folder = document.createElement('div');
    folder.classList.add('background-folder');


    const size = Math.random() * 150 + 100;


    folder.style.left = `${Math.random() * 60}%`;
    folder.style.top = `${Math.random() * 200}%`;

    // Random rotation and animation
    folder.style.animation = `folderFloat ${Math.random() * 10 + 5}s ease-in-out infinite`;
    folder.style.transform = `rotate(${Math.random() * 360}deg)`;


    folder.innerHTML = `
      <svg xmlns="http://www.w3.org/2000/svg" width="${size}" height="${size}" viewBox="0 0 24 24"
        fill="${folderColors[Math.floor(Math.random() * folderColors.length)]}"
        stroke="rgba(255,255,255,0.3)"
        stroke-width="1"
        stroke-linecap="round"
        stroke-linejoin="round">
        <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/>
      </svg>
    `;

    background.appendChild(folder);
  }
}


document.addEventListener('DOMContentLoaded', createFolders);

            const background = document.getElementById('backgroundAnimation');
            const folderColors = ['#904c7b', '#591c46', '#e46793', '#f66477'];

            for (let i = 0; i < 10; i++) {
                const folder = document.createElement('div');
                folder.classList.add('background-folder');

                // Random size
                const size = Math.random() * 150 + 100;

                // Random position
                folder.style.left = `${Math.random() * 120}%`;
                folder.style.top = `${Math.random() * 120}%`;


                folder.style.animation = `folderFloat ${Math.random() * 10 + 5}s ease-in-out infinite`;
                folder.style.transform = `rotate(${Math.random() * 360}deg)`;


                folder.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="${size}" height="${size}" viewBox="0 0 24 24"
                        fill="${folderColors[Math.floor(Math.random() * folderColors.length)]}"
                        stroke="rgba(255,255,255,0.2)"
                        stroke-width="1"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/>
                    </svg>
                `;

                background.appendChild(folder);




        document.addEventListener('DOMContentLoaded', createFolders);
                }
</script>
