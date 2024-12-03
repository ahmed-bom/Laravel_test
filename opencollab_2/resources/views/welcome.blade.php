<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenCollab - Empowering Collaboration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --color-primary: #904c7b;
            --color-secondary: #591c46;
            --color-accent-1: #e46793;
            --color-accent-2: #f66477;
            --color-accent-4: #d1a8ad;
            --color-accent-5: #b86872;
        }

        body {
            height: 100vh;
            background: linear-gradient(101deg,
                #d297a5 23%,
                #ed9eab 57%,
                #FFB6C1 100%);
            font-family: 'Inter', sans-serif;
        }

        .gradient-text {
            background: linear-gradient(to right,
                var(--color-primary) 35%,
                var(--color-primary)) 25%;
            -webkit-background-clip: text;
            color: transparent;
        }

        .content-box {
            background: rgba(144, 76, 123, 0.4); /* Using primary color with increased opacity */
            border-radius: 1rem;
            box-shadow: 0 15px 40px rgba(144, 76, 123, 0.25);
            backdrop-filter: blur(10px); /* Added blur for better readability */
        }
        .blinking-effect {
            animation: blink-animation 1.5s infinite;
        }

        @keyframes blink-animation {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.4;
            }
        }
    </style>
</head>
<body class="flex items-center justify-center">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center content-box p-10 rounded-2xl">
        <p class="mx-auto -mt-4 max-w-2xl text-lg tracking-tight text-white sm:mt-6">
            Welcome to
            <span class="border-b border-dotted border-slate-300 gradient-text">OpenCollab</span>
        </p>

        <h1 class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-white sm:text-7xl mt-6">
            <span class="inline-block">Empowering
                <span class="relative whitespace-nowrap text-transparent gradient-text">
                    <svg aria-hidden="true" viewBox="0 0 418 42"
                         class="absolute top-2/3 left-0 h-[0.58em] w-full fill-[var(--color-accent-2)]"
                         preserveAspectRatio="none">
                        <path d="M203.371.916c-26.013-2.078-76.686 1.963-124.73 9.946L67.3 12.749C35.421 18.062 18.2 21.766 6.004 25.934 1.244 27.561.828 27.778.874 28.61c.07 1.214.828 1.121 9.595-1.176 9.072-2.377 17.15-3.92 39.246-7.496C123.565 7.986 157.869 4.492 195.942 5.046c7.461.108 19.25 1.696 19.17 2.582-.107 1.183-7.874 4.31-25.75 10.366-21.992 7.45-35.43 12.534-36.701 13.884-2.173 2.308-.202 4.407 4.442 4.734 2.654.187 3.263.157 15.593-.78 35.401-2.686 57.944-3.488 88.365-3.143 46.327.526 75.721 2.23 130.788 7.584 19.787 1.924 20.814 1.98 24.557 1.332l.066-.011c1.201-.203 1.53-1.825.399-2.335-2.911-1.31-4.893-1.604-22.048-3.261-57.509-5.556-87.871-7.36-132.059-7.842-23.239-.254-33.617-.116-50.627.674-11.629.54-42.371 2.494-46.696 2.967-2.359.259 8.133-3.625 26.504-9.81 23.239-7.825 27.934-10.149 28.304-14.005.417-4.348-3.529-6-16.878-7.066Z"></path>
                    </svg>
                    <span class="relative">collaboration and creativity</span>
                </span>
            </span>
        </h1>

        <p class="mx-auto mt-9 max-w-2xl text-lg tracking-tight text-white sm:mt-6">
            <span class="inline-block text-[var(--color-secondary)] mr-2">A platform to:</span>
            <span class="inline-block text-white">share, explore, and download innovative projects</span>
        </p>

        <div class="mt-12 flex flex-col justify-center gap-y-5 sm:mt-10 sm:flex-row sm:gap-y-0 sm:gap-x-6">
            <a class="w-[200px] group inline-flex items-center justify-center rounded-full py-2 px-4 text-lg font-semibold
                focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2
                bg-[var(--color-primary)] text-white
                hover:bg-[var(--color-accent-2)] hover:text-white
                active:bg-[var(--color-secondary)] transition-all duration-300 ease-in-out"
               href="{{ route('register') }}">
                <span class="ml-3">Get Started</span>
            </a>
        </div>

        <footer class="mt-12 text-base text-[var(--color-primary)] font-medium">
            © 2024 OpenCollab. All rights reserved.
            <span class="block text-lg mt-3 text-[var(--color-secondary)] font-bold ">
                Designed and developed by
                <span class="gradient-text">Haitham & Ahmed </span>
            </span>
        </footer>
    </div>
</body>
</html>
