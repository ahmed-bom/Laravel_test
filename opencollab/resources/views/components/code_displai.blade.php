<!-- Prism.js theme CSS -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism-twilight.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/prism.min.js"></script>

<!-- Prism.js JavaScript -->

<div class="w-4/5 mx-auto mt-24 bg-gray-900 rounded-lg overflow-hidden">
  <div class="p-4">
    <div class="flex items-center justify-between">
      <span class="text-gray-200 text-xl font-bold">app / JS / Main.js</span>
      <button
        id="copyButton"
        class="px-4 py-2 text-white bg-teal-500 rounded hover:bg-teal-600 focus:outline-none focus:ring focus:ring-red-400"
      >
        Copy
      </button>
    </div>
  </div>

  <div class="px-5 py-5">
    <pre
      class="language-javascript"
      style="padding: 5px 16px;box-shadow: none; border: solid 2px rgb(255, 230, 0)"
    ><code class="text-sm">
      // Your JavaScript code goes here
  document.getElementById("copyButton").addEventListener("click", function () {
    const codeElement = document.querySelector(".language-javascript code");
    const textArea = document.createElement("textarea");
    textArea.value = codeElement.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("copy");
    document.body.removeChild(textArea);
    alert("Code copied to clipboard!");
  });
    </code></pre>
  </div>
</div>

<!-- JavaScript to copy the code -->

<script>
  document.getElementById("copyButton").addEventListener("click", function () {
    const codeElement = document.querySelector(".language-javascript code");
    const textArea = document.createElement("textarea");
    textArea.value = codeElement.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("copy");
    document.body.removeChild(textArea);
    alert("Code copied to clipboard!");
  });
</script>
