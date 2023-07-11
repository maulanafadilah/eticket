<div class="fixed flex justify-center items-center w-full h-full top-0 left-0 bg-slate-500 z-50 bg-opacity-50" id="notification-container" onclick="close()">
    <div class="flex flex-col w-[90%] lg:w-[35%] bg-white rounded-xl opacity-100" onclick="event.stopPropagation();">
        <div class="flex justify-end items-center px-4 pt-4 ">
            <button class="btn btn-square btn-ghost rounded-lg btn-sm" id="close-btn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <div class="space-y-6 pb-6 px-6">
            <div class="flex flex-col justify-center items-center space-y-2 pb-6">
                <span class="material-symbols-rounded mx-auto mb-2 text-success text-6xl">task_alt</span>
                <h3 class="text-lg font-semibold text-gray-700 text-center">Bugs Successfully Recorded!</h3>
                <p class="text-sm text-gray-500 text-center">Copy this link below to track your recorded issue.</p>
            </div>
            <div class="w-full flex flex-col items-start space-y-2">
                <p class="text-sm text-gray-500 font-medium">Share link</p>
                <div class="w-full flex items-center space-x-2">
                    <p class="w-full py-3 px-4 border border-gray-200 rounded-lg text-sm" id="link">127.0.0.1:8000/track?search={{ session('success') }}</p>
                    <button class="btn btn-primary capitalize rounded-full text-white" onclick="copyLink()" id="btn-copy">
                        <span class="material-symbols-rounded text-base" id="icon-copy">content_copy</span>
                        <p id="text-copy">Copy link</p>
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
        navigator.clipboard.writeText(link);

        copyBtn.classList.remove("text-white");
        copyBtn.classList.remove("btn-primary");

        copyIcon.innerText = "check_circle";

        copyBtn.classList.add("btn-outline");
        copyBtn.classList.add("btn-success");

        copyText.innerText = "Link Copied!"
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