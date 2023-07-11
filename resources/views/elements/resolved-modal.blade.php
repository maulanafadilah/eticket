<div class="fixed justify-center items-center w-full h-full top-0 left-0 bg-slate-500 z-50 bg-opacity-50 hidden" id="resolved-container" onclick="rClose()">
    <div class="flex flex-col w-[90%] lg:w-[35%] bg-white rounded-xl opacity-100" onclick="event.stopPropagation();">
        <div class="flex justify-between items-center pl-6 pr-4 pt-4">
            <h3 class="text-lg font-semibold text-gray-700 text-center">Resolved Form</h3>
            <button class="btn btn-square btn-ghost rounded-lg btn-sm" id="resolved-close-btn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <div class="pb-6 px-6">
            <form action="/track" class="space-y-6" method="post">
                @csrf
                <div class="space-y-2">                
                    <h3 class="text-base">Tanggal Resolved<span class="text-sm text-red-700">*</span></h3>
                    <div>
                        <input name="resolved_time" type="datetime-local" class="input w-full" required/>
                    </div>
                </div> 
                <div class="space-y-2">                
                    <h3 class="text-base">Ditangani Oleh <span class="text-sm text-red-700">*</span></h3>
                    <div>
                        <input name="resolved_by" type="text" class="input w-full" placeholder="Tim/orang yang menyelesaikan masalah..." required/>
                    </div>
                </div> 
                <div class="space-y-2">                
                    <h3 class="text-base">Alasan <span class="text-sm text-red-700">*</span></h3>
                    <div>
                        <textarea name="reason" class="textarea w-full h-32" placeholder="Alasan penyelesaian disini..." required></textarea>
                    </div>
                </div>
                <input type="hidden" name="content_id" value="{{$result[0]['id']}}">
                <input type="hidden" name="update_type" value="2">
                <button type="submit" class="w-full btn btn-primary rounded-full">Resolve</button>
            </form>
        </div>
    </div>
</div>


<script>
    var rContainer = document.getElementById("resolved-container")
    var rCloseBtn = document.getElementById("resolved-close-btn");
    var resolvedBtn = document.getElementById("resolved-btn");

    rCloseBtn.onclick = function() {rClose()};
    resolvedBtn.onclick = function() {rOpen()};

    function rClose(){
        rContainer.classList.add("hidden");
    }

    function rOpen(){
        rContainer.classList.add("flex")
        rContainer.classList.remove("hidden");
    }
</script>