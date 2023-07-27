<div class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full bg-opacity-50 bg-slate-500" id="notification-container" onclick="close()">
    <div class="flex flex-col w-[90%] lg:w-[35%] bg-white rounded-xl opacity-100" onclick="event.stopPropagation();">
        <div class="flex items-center justify-end px-4 pt-4 ">
            <button class="rounded-lg btn btn-square btn-ghost btn-sm" id="close-btn">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <div class="px-6 pb-6 space-y-6">
            <div class="flex flex-col items-center justify-center pb-6 space-y-2">
                <span class="mx-auto mb-2 text-6xl material-symbols-rounded text-success">task_alt</span>
                <h3 class="text-lg font-semibold text-center text-gray-700">Bugs Successfully Recorded!</h3>
                <p class="text-sm text-center text-gray-500">Copy this link below to track your recorded issue.</p>
            </div>
            <div class="flex flex-col items-start w-full space-y-2">
                <p class="text-sm font-medium text-gray-500">Kode Referensi</p>
                <div class="flex flex-col items-center w-full space-y-2 sm:space-y-0 sm:space-x-2 sm:flex-row">
                    <p class="w-full px-4 py-3 text-sm border border-gray-200 rounded-lg" id="link">{{ session('success') }}</p>
                    <button class="w-full text-white capitalize rounded-full sm:w-fit btn btn-primary" onclick="copyLink()" id="btn-copy">
                        <span class="text-base material-symbols-rounded" id="icon-copy">open_in_new</span>
                        <p id="text-copy">Open link</p>
                    </button>
                </div>
            </div>            
        </div>
    </div>
</div>

<script>
    let link = document.getElementById("link").innerText;
    const copyBtn = document.getElementById("btn-copy");
    const copyIcon = document.getElementById("icon-copy");
    const copyText = document.getElementById("text-copy");

    function copyLink(){    
        // Copy the text inside the text field
        // navigator.clipboard.writeText(link);

        copyBtn.classList.remove("text-white");
        copyBtn.classList.remove("btn-primary");

        copyIcon.innerText = "check_circle";

        copyBtn.classList.add("btn-outline");
        copyBtn.classList.add("btn-success");

        copyText.innerText = "Link Opened!"

        // Prepend "http://" or "https://" to make it an absolute URL
        link = "http://36.93.66.164/track?search=" + link;
        
        window.open(link);
    }
</script>

<script>
    var container = document.getElementById("notification-container")
    var closeBtn = document.getElementById("close-btn");

    closeBtn.onclick = function() {close()};

    function close(){
        container.classList.add("hidden");
    }
</script>