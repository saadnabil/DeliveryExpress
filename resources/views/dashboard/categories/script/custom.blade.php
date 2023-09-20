<script>
    $(document).on('change', '.serviceSelect', function() {
            var service_id = $(this).val();
            $('.subCategoriesSelect').html('<option></option>');
            $.ajax({
                url: "{{ route('getMainCategories') }}",
                type: "GET",
                data: {
                    service_id: service_id,
                },
                dataType: "json",
                success: function(response) {
                    $('.mainCategoriesSelect').html(response.data);
                },
                error: function(xhr) {
                    // Handle the error
                    console.log(xhr.responseText);
                }
            });
        });
        $(document).on('change','input[name="parent"]',function(){
            var value = $(this).val();
            if(value == 0){
                $('.childs').show();
                $('.childs').find('select').attr('required',true);
            }else if(value == 1){
                $('.childs').hide();
                $('.childs').find('select').attr('required',false);

            }
        });
</script>
