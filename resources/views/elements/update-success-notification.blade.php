<div class="fixed flex justify-center items-center w-full h-full top-0 left-0 bg-slate-500 z-50 bg-opacity-50" id="update-notification-container" onclick="uClose()">
    <div class="flex flex-col w-[90%] lg:w-[35%] bg-white rounded-xl opacity-100" onclick="event.stopPropagation();">
        <div class="flex justify-end items-center px-4 pt-4 ">
            <button class="btn btn-square btn-ghost rounded-lg btn-sm" id="update-close-btn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <div class="space-y-6 pb-6 px-6">
            <div class="flex flex-col justify-center items-center space-y-2 pb-6">
                <span class="material-symbols-rounded mx-auto mb-2 text-success text-6xl">task_alt</span>
                <h3 class="text-lg font-semibold text-gray-700 text-center">Successfully Update Progress!</h3>
                <p class="text-sm text-gray-500 text-center">Track your recorded bugs/issue by continuing update your progress.</p>
            </div>          
        </div>
    </div>
</div>

<script>
    var uContainer = document.getElementById("update-notification-container")
    var uCloseBtn = document.getElementById("update-close-btn");

    uCloseBtn.onclick = function() {uClose()};

    function uClose(){
        uContainer.classList.add("hidden");
    }
</script>