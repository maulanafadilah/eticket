<div class="fixed top-0 left-0 z-50 items-center justify-center hidden w-full h-full bg-opacity-50 bg-slate-500" id="resolved-container" onclick="rClose()">
    <div class="flex flex-col w-[90%] lg:w-[35%] bg-white rounded-xl opacity-100" onclick="event.stopPropagation();">
        <div class="flex items-center justify-between pt-4 pl-6 pr-4">
            <h3 class="text-lg font-semibold text-center text-gray-700">Resolved Form</h3>
            <button class="rounded-lg btn btn-square btn-ghost btn-sm" id="resolved-close-btn">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <div class="px-6 pb-6">
            <form action="/track" class="space-y-6" method="post">
                @csrf
                <div class="space-y-2">                
                    <h3 class="text-base">Tanggal Resolved<span class="text-sm text-red-700">*</span></h3>
                    <div>
                        <input name="resolved_time" type="datetime-local" class="w-full input" required/>
                    </div>
                </div> 
                <div class="space-y-2">                
                    <h3 class="text-base">Ditangani Oleh <span class="text-sm text-red-700">*</span></h3>
                    <div>
                        <input name="resolved_by" type="text" class="w-full input" placeholder="Tim/orang yang menyelesaikan masalah..." required/>
                    </div>
                </div> 
                <div class="space-y-2">                
                    <h3 class="text-base">Alasan <span class="text-sm text-red-700">*</span></h3>
                    <div>
                        <textarea name="reason" class="w-full h-32 textarea" placeholder="Alasan penyelesaian disini..." required></textarea>
                    </div>
                </div>
                <input type="hidden" name="content_id" value="{{$result[0]['id']}}">
                <input type="hidden" name="update_type" value="2">
                <button type="submit" class="w-full rounded-full btn btn-primary">Resolve</button>
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