
{{ Session::get('success') }}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.26/sweetalert2.min.js" integrity="sha512-BIHdMyxdl8bg4QOZYwJUivf6MTa97s/cfN7miqW4DLBIhIDgQ6TFjmWXvtvtBFu/Qrt1LIdGcQ2XqM56Vj1RIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if($message = Session::get('success'))
    <script>
        Swal.fire({
            text: "<?php echo $message ?>",
            icon: "success",
            buttonsStyling: false,
            showConfirmButton: true,
            confirmButtonText: "<?php echo __('translation.Ok') ?>",
            customClass: {
                confirmButton: "btn btn-success"
            }
        });
    </script>
@endif

@if($message = Session::get('error'))
    <script>
        Swal.fire({
            text: "<?php echo $message ?>",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "<?php echo __('translation.Ok') ?>",
            customClass: {
                confirmButton: "btn btn-danger"
            }
        });
    </script>
@endif

<script>
    $('.confirm-delete').click(function(e){
        e.preventDefault();
        Swal.fire({
            html: `{{ __("translation.Are You Sure To Delete This Item ?") }}`,
            icon: "info",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "{{ __('translation.Confirm') }}",
            cancelButtonText: "{{ __('translation.Cancel') }}",
            customClass: {
                confirmButton: "btn btn-danger ml-10",
                cancelButton: 'btn btn-success'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).next('form').submit();
            }
        });
        return false;
    });
</script>


<script>
    $('.confirm-collect').click(function(e){
        e.preventDefault();
        Swal.fire({
            title: '{{ __("translation.You Are About Confirm Recieving These Shipments ...") }}',
            html: `{{ __("translation.Did You Collect These Shipments And In The Stock Now ?") }}`,
            icon: "info",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "{{ __('translation.Confirm') }}",
            cancelButtonText: "{{ __('translation.Cancel') }}",
            customClass: {
                confirmButton: "btn btn-success ml-10",
                cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).next('form').submit();
            }
        });
        return false;
    });
</script>

<script>
    $('.confirm-return').click(function(e){
        e.preventDefault();
        Swal.fire({
            title: '{{ __("translation.You Are About Confirm Returning These Shipments ...") }}',
            html: `{{ __("translation.Did You Return These Shipments To The Store ?") }}`,
            icon: "info",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "{{ __('translation.Confirm') }}",
            cancelButtonText: "{{ __('translation.Cancel') }}",
            customClass: {
                confirmButton: "btn btn-success ml-10",
                cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).next('form').submit();
            }
        });
        return false;
    });
</script>
