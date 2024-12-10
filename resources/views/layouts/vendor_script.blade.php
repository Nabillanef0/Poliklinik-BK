<script>
    var HOST_URL = "{{ url('/') }}/backoffice";
    var UPLOAD_URL = "{{ url('/') }}/storage/admin";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>