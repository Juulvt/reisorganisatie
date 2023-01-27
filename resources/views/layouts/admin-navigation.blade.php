<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>


<script type="text/javascript">
    function deleteConfirmation(id) {
        form = $("form#" + id + "");
        Swal.fire({
            title: "Do you wish to delete?",
            text: "Please ensure and then confirm!",
            showCancelButton: true,
            showConfirmButton: true,
            focusConfirm: false,
            confirmButtonColor: '#FE556C',
            cancelButtonColor: '#3E557E',
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel"
        }).then(function (e) {
            if (e.value === true) {
                console.log("submitting form");
                form.submit();
            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
</script>
<nav class="bg-white shadow-sm">
    <div class="px-5 flex justify-between gap-1 h-24 py-4">
        <a class="logo h-full" href={{ route('index.index') }}>
            <img class="h-full" src="{{ route('index.index') }}/images/logoalt.png" alt="logo">
        </a>
        <div>
            <h4>{{Auth::user()->name}}</h4>
        </div>
    </div>
</nav>