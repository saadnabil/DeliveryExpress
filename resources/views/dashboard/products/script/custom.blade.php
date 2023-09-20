<script>
        //categories setting
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

        $(document).on('change', '.mainCategoriesSelect', function() {
            var category_id = $(this).val();
            $.ajax({
                url: "{{ route('getSubCategories') }}",
                type: "GET",
                data: {
                    category_id: category_id,
                },
                dataType: "json",
                success: function(response) {
                    $('.subCategoriesSelect').html(response.data);
                },
                error: function(xhr) {
                    // Handle the error
                    console.log(xhr.responseText);
                }
            });
        });
        //categories setting

        //price setting
        $('.priceinput').on('click keyup', function() {
            var newprice = parseFloat($(this).val()) - parseFloat($(this).val()) * parseFloat($('.discountinput')
                .val()) / 100;
            $('.newpriceinput').attr('value', newprice);
        });

        $('.discountinput').on('click keyup', function() {
            var newprice = parseFloat($('.priceinput').val()) - parseFloat($('.priceinput').val()) * parseFloat($(
                this).val()) / 100;
            $('.newpriceinput').attr('value', newprice);
        });
        //price setting

        //variants setting jquery
        $(document).on('click', 'input[name="size_setting"]', function() {
            if ($(this).val() != 1) {
                $('.sizediv').hide();
                $('.sizediv').find('select').attr('required',false);
                var color = $('input[name="color_setting"]:checked').val();
                if (color != 1) {
                    $('.add-variant').hide();
                    $('div.product-variant span.remove-variant').closest('div.product-variant').remove();
                }
            } else {
                $('.sizediv').show();
                 $('.sizediv').find('select').attr('required',true);
                $('.add-variant').show();
            }
        });
        $(document).on('click', 'input[name="color_setting"]', function() {
            if ($(this).val() != 1) {
                $('.colordiv').hide();
                 $('.colordiv').find('select').attr('required',false);
                var size = $('input[name="size_setting"]:checked').val();
                if (size != 1) {
                    $('.add-variant').hide();
                    $('div.product-variant span.remove-variant').closest('div.product-variant').remove();
                }
            } else {
                $('.colordiv').show();
                $('.colordiv').find('select').attr('required',true);
                $('.add-variant').show();
            }
        });

        $(document).on('click', '.remove-variant', function() {
            $(this).parentsUntil('.product-variants').hide();
            $(this).parentsUntil('.product-variants').find('input.status').attr('value','deleted');
            $(this).parentsUntil('.product-variants').find('select').attr('required' , false);
            $(this).parentsUntil('.product-variants').find('input').attr('required' , false);

        });

        $('.add-variant').click(function(e) {
            e.preventDefault();
            var newcount = parseInt($(this).attr('data-count')) + 1;

            var color = $('input[name="color_setting"]:checked').val();
            var size = $('input[name="size_setting"]:checked').val();

            $(this).attr('data-count', newcount);
            var element = `<div class="${newcount} product-variant border border-3 p-4 rounded  mt-3" style="position:relative;">
                                <input class="status" type="hidden" name="variants[${newcount}][status]" value="new"/>
                                <div class="mb-3 sizediv" style="display: ${size != 1 ? 'none' : 'block'};">
                                    <label for="" class="form-label">{{ __('translation.Product Size') }}</label>
                                    <select required name="variants[${newcount}][size]"  class="form-select" id="inputProductType">
                                        <option></option>
                                        @foreach ($sizes as $key => $size)
                                            <option value="{{ $size->id }}">{{ $size->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 colordiv" style="display: ${color != 1 ? 'none' : 'block'};">
                                    <label for="" class="form-label">{{ __('translation.Product Color') }}</label>
                                    <select required name="variants[${newcount}][color]" class="form-select" id="inputProductType">
                                        <option></option>
                                        @foreach ($colors as $key => $color)
                                            <option value="{{ $color->id }}">{{ $color->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ __('translation.Product Stock') }}</label>
                                    <input min="1" required name="variants[${newcount}][stock]" type="number"  class="form-control" id="inputProductTitle"
                                        placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ __('translation.Product Images') }}</label>
                                    <input name="variants[${newcount}][images][]" class="image-uploadify" type="file"
                                        accept="image/*"
                                        multiple>
                                </div>
                                <span class="remove-variant" title="Remove" style="position: absolute; top:3px;right:3px; cursor:pointer;font-size:18px;">
                                    <i class="bx bx-x"></i>
                                </span>
                            </div>`;
            $('.product-variants').append(element);
        });
        //variants setting jquery
    </script>
