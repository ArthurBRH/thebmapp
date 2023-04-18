@can('supervisor on')
    <div id="supervisor" class="py-12 pb-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
            <div class="border-l-4 border-orange-500 bg-orange-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-orange-500">
                    {{ __("Supervisor mode On!") }}
                    <span id="modal_close" class="float-right">
                        <i id="modal_close" class="fa-solid fa-x"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endcan
<script>
    // Get the modal
    let modal = document.getElementById("supervisor");

    // Get the <span> element that closes the modal
    let span = document.getElementById("modal_close");

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
        console.log('hoi')
    }
</script>
