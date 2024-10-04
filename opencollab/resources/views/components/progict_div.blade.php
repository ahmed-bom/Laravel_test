<script src="https://cdn.tailwindcss.com"></script>

<!-- component -->
<div class="my-16 py-16 h-screen">
  <script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js"
    defer
  ></script>
  <div
    class="mx-auto w-3/4"
    x-data="{ open: false, color: false }"
    @keydown.escape="open = false"
    @click.away="open = false"
  >
    <div
      class="flex items-center bg-indigo-500 rounded-md p-3 text-white cursor-pointer transition duration-500 ease-in-out hover:shadow hover:bg-indigo-600"
    >
      <div>
        <svg
          fill="currentColor"
          class="w-10 h-10"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
        >
          <path
            d="M0 4c0-1.1.9-2 2-2h7l2 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4z"
          ></path>
        </svg>
      </div>
      <div class="px-3 mr-auto">
        <h4 class="font-bold">item 1</h4>
        <small class="text-xs">Lorem ipsum dolor sit amet,...</small>
      </div>
      <div class="relative">
        <a href="javascript:;" @click="open = !open">
          <svg
            fill="currentColor"
            class="w-5 h-5"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
          >
            <path
              d="M10 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0-6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
            ></path>
          </svg>
        </a>

        <div
          x-show="open"
          x-transition:enter="transition ease-out duration-100"
          x-transition:enter-start="transform opacity-0 scale-95"
          x-transition:enter-end="transform opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-75"
          x-transition:leave-start="transform opacity-100 scale-100"
          x-transition:leave-end="transform opacity-0 scale-95"
          class="options absolute bg-white text-gray-600 origin-top-right right-0 mt-2 w-56 rounded-md shadow-lg overflow-hidden"
        >
          <a
            href="javascript:;"
            class="flex py-3 px-2 text-sm font-bold hover:bg-gray-100"
          >
            <span class="mr-auto">Edit</span>
            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
              <path
                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
              ></path>
            </svg>
          </a>
          <a
            href="javascript:;"
            class="flex py-3 px-2 text-sm font-bold hover:bg-gray-100"
          >
            <span class="mr-auto">Download</span>
            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
              <path
                fill-rule="evenodd"
                d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </a>

          <a
            href="javascript:;"
            class="flex py-3 px-2 text-sm font-bold bg-red-400 text-white"
          >
            <span class="mr-auto">Delete</span>
            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
              <path
                fill-rule="evenodd"
                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
