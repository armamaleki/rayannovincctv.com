<div class="fixed bottom-20 right-8 w-[60px] h-[60px] z-50">
    <button
        id="toggleButton"
        class="flex justify-center items-center w-full h-full rounded-full shadow-lg bg-gradient-to-r from-purple-500 to-indigo-500 text-white transition-transform duration-500">
        <x-icons.headphones class="size-10"/>
    </button>

    <a
        href="tel:+09129494234"
        id="callBtn"
        class="absolute flex justify-center items-center w-full h-full rounded-full shadow-md bg-blue-500 text-white transition-all duration-700 invisible top-0 left-0 opacity-0">
        <x-icons.phone-call class="size-10"/>
    </a>

    <a
        href="https://wa.me/+989129494234"
        target="_blank"
        id="waBtn"
        class="absolute flex justify-center items-center w-full h-full rounded-full shadow-md bg-green-500 text-white transition-all duration-700 invisible top-0 left-0 opacity-0"
    >
        <svg stroke="currentColor" fill="currentColor" strokeWidth="0" viewBox="0 0 448 512"  xmlns="http://www.w3.org/2000/svg"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg>

    </a>
</div>
<div
    id="overlay"
    class="fixed inset-0 bg-black/40 backdrop-blur-sm transition-opacity duration-300 ease-in-out z-40 opacity-0 invisible"></div>
<script>
    const toggleButton = document.getElementById("toggleButton");
    const callBtn = document.getElementById("callBtn");
    const waBtn = document.getElementById("waBtn");
    const overlay = document.getElementById("overlay");
    const floatingContainer = document.querySelector(".fixed.bottom-20.right-8");

    let open = false;

    function openMenu() {
        open = true;
        toggleButton.classList.add("rotate-45");
        callBtn.classList.remove("invisible", "opacity-0", "top-0", "left-0");
        callBtn.classList.add("visible", "opacity-100", "-top-[100%]", "-left-[130%]");
        waBtn.classList.remove("invisible", "opacity-0", "top-0", "left-0");
        waBtn.classList.add("visible", "opacity-100", "top-[40%]", "-left-[150%]");
        overlay.classList.remove("invisible", "opacity-0");
        overlay.classList.add("visible", "opacity-100");
    }

    function closeMenu() {
        open = false;
        toggleButton.classList.remove("rotate-45");
        callBtn.classList.add("invisible", "opacity-0", "top-0", "left-0");
        callBtn.classList.remove("visible", "opacity-100", "-top-[100%]", "-left-[130%]");
        waBtn.classList.add("invisible", "opacity-0", "top-0", "left-0");
        waBtn.classList.remove("visible", "opacity-100", "top-[40%]", "-left-[150%]");
        overlay.classList.add("invisible", "opacity-0");
        overlay.classList.remove("visible", "opacity-100");
    }

    toggleButton.addEventListener("click", (e) => {
        e.stopPropagation(); // جلوگیری از بسته شدن هنگام کلیک روی خود دکمه
        open ? closeMenu() : openMenu();
    });

    // بستن منو با کلیک روی کل صفحه (غیر از دکمه‌ها و منو)
    document.addEventListener("click", (e) => {
        if (open && !floatingContainer.contains(e.target)) {
            closeMenu();
        }
    });

    // بستن منو با کلیک روی overlay
    overlay.addEventListener("click", closeMenu);
</script>

