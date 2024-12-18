
<style>
    body{
        overflow-y: hidden;
    }
    input#search-bar:focus {
        border-color: rgb(147, 134, 134); /* Change border color to dark red */
        outline: none; /* Remove default focus outline */
        box-shadow: 0 0 0 2px rgba(156, 148, 148, 0.5); /* Optional: Add a subtle red glow */
    }
</style>
    <div
        class="relative isolate overflow-hidden  px-6 py-20 text-center sm:px-16 sm:shadow-sm">
        <p class="mx-auto max-w-2xl text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
            Didn't find component you were looking for?
        </p>


        <form action="/search">
            <label
                class="mx-auto mt-8 relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300"
                for="search-bar">

                <input id="search-bar" placeholder="your keyword here" name="search-bar"
                    class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white" required="">
                    <button type="submit"
                    class="w-full md:w-auto px-6 py-3 bg-red-700 border-red-700 text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all">
                    <div class="flex items-center transition-all opacity-1">
                        <span class="text-sm font-semibold whitespace-nowrap truncate mx-auto">
                            Search
                        </span>
                    </div>
                </button>
            </label>
        </form>
    </div>
</div>
