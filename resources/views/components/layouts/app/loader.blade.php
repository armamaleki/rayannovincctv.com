<div id="loader" class="fixed top-0 left-0 w-full h-full flex flex-col items-center justify-center z-50 bg-gray-950">
    <div class="spinner">
        <div class="spinner1"></div>
    </div>
</div>

<script>
    window.addEventListener("load", () => {
        const loader = document.getElementById("loader");
        if (loader) {
            loader.style.opacity = "0";
            loader.style.transition = "opacity 0.5s ease";
            setTimeout(() => {
                loader.style.display = "none";
            }, 500);
        }
    });
</script>
