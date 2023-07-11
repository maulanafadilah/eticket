<div class="fixed justify-center items-center w-full h-full top-0 left-0 bg-slate-500 z-50 bg-opacity-50 hidden" id="notification-container" onclick="close()">
    <div class="flex flex-col w-[90%] lg:w-[35%] bg-white rounded-xl opacity-100" onclick="event.stopPropagation();">
        <div class="flex justify-between items-center pl-6 pr-4 pt-4">
            <h3 class="text-lg font-semibold text-gray-700 text-center">Update Form</h3>
            <button class="btn btn-square btn-ghost rounded-lg btn-sm" id="close-btn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <div class="pb-6 px-6">
            <form action="/track" class="space-y-6" method="post">
                @csrf
                <div class="space-y-2">                
                    <h3 class="text-base">Tanggal <span class="text-sm text-red-700">*</span></h3>
                    <div>
                        <input name="date" type="datetime-local" class="input w-full" required/>
                    </div>
                </div> 
                <div class="space-y-2">                
                    <h3 class="text-base">Keterangan Update <span class="text-sm text-red-700">*</span></h3>
                    <div>
                        <textarea name="update_message" class="textarea w-full h-32" placeholder="Tulis keterangan disini..." required></textarea>
                    </div>
                </div>
                <input type="hidden" name="content_id" value="{{$result[0]['id']}}">
                <input type="hidden" name="update_type" value="1">
                <button type="submit" class="w-full btn btn-primary rounded-full">Update</button>
            </form>
        </div>
    </div>
</div>


<script>
    var container = document.getElementById("notification-container")
    var closeBtn = document.getElementById("close-btn");
    var updateBtn = document.getElementById("update-btn");

    closeBtn.onclick = function() {close()};
    updateBtn.onclick = function() {open()};

    function close(){
        container.classList.add("hidden");
    }

    function open(){
        container.classList.add("flex")
        container.classList.remove("hidden");
    }
</script>