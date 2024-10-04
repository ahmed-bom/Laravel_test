<script src="https://cdn.tailwindcss.com"></script>


<div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://source.unsplash.com/random/1920x1080" alt=""
            class="w-full h-full object-cover filter blur-lg brightness-50">
    </div>

    <!-- Login Form -->
    <div>
    <h1 class="bg-white text-l font-bold p-4 wx-20">Login</h1>
    <div class="relative z-10 bg-white p-8 rounded-md shadow-lg">
        
        <form action="#" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
                <input
                    class="appearance-none border rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full"
                    id="email" type="email" placeholder="Email">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="password">Password</label>
                <input
                    class="appearance-none border rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full"
                    id="password" type="password" placeholder="Password">
            </div>
            <div class="flex items-center justify-between gap-8">
                <button
                    class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Sign In
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-cyan-500 hover:text-cyan-800"
                    href="#">
                    Forgot Password?
                </a>
            </div>
        </form>
    </div>
    </div>
</div>
</div>