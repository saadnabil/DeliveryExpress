@extends('dashboard_v2.master')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">eCommerce</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Products Details</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-success">Settings</button>
                <button type="button" class="btn btn-success split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="row g-0">
            <div class="col-md-4 border-end">
                <img style="width:100%;" src="{{ url('storage/' . $row->image) }}" class="img-fluid" alt="...">
                <div class="imagesdiv row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                    @foreach ($images as $image)
                        <div class="col"><img src="{{ url('storage/' . $image->image) }}" width="70"
                                class="border rounded cursor-pointer" alt=""></div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">{{ $row->name }}</h4>
                    <div class="d-flex gap-3 py-3">

                        {{--  <div>142 reviews</div>  --}}
                        <div class="text-success"><i class='bx bxs-cart-alt align-middle'></i> 134 orders</div>
                    </div>
                    <div class="mb-3">
                        <span class="price h4">{{ $row->price }}</span>
                        @if ($row->old_price)
                            <span class="text-muted" style="text-decoration: line-through;">/{{ $row->old_price }}</span>
                        @endif
                    </div>
                    <p class="card-text fs-6">{{ $row->desc }}</p>
                    <dl class="row">
                        <dt class="col-sm-3">{{ __('Category') }}</dt>
                        <dd class="col-sm-9">{{ $row->cat->name }}</dd>
                        @if ($row->Designer)
                            <dt class="col-sm-3">{{ __('Fashion Designer') }}</dt>
                            <dd class="col-sm-9">{{ $row->Designer->name }}</dd>
                        @endif
                        <dt class="col-sm-3">{{ __('Stock') }}</dt>
                        <dd class="col-sm-9">{{ $row->stock }}</dd>
                    </dl>
                    <hr>
                    <div class="row row-cols-auto row-cols-1 row-cols-md-3 align-items-center">

                        <div class="col">
                            <label class="form-label"></label>
                            <div class="">
                                @foreach ($sizes as $key => $size)
                                    <label style="cursor:pointer;" class="form-check form-check-inline">
                                        <input data-sizeid="{{ $size->id }}" data-productid="{{ $row->id }}"
                                            {{ $key == 0 ? 'checked' : '' }}
                                            type="radio"class="form-check-input sizebutton" name="select_size"
                                            class="custom-control-input">
                                        <div class="form-check-label"> {{ $size->title }} </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="col">
                            <label class="form-label">Select Color</label>
                            <div class="colorsdiv color-indigators d-flex align-items-center gap-2">
                                @foreach ($colors as $color)
                                    <div data-productid="{{ $row->id }}" data-sizeid="{{ $sizes[0] -> id }}" data-colorid="{{ $color->id }}" class="colorbutton color-indigator-item "
                                        style="background-color:{{ $color->color }};"></div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="btn btn-success">Buy Now</a>
                        <a href="#" class="btn btn-outline-primary"><span class="text">Add to cart</span> <i
                                class='bx bxs-cart-alt'></i></a>
                    </div>
                </div>
            </div>
        </div>
        {{--  <hr />  --}}
        {{--  <div class="card-body">
            <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                        aria-selected="true">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
                            </div>
                            <div class="tab-title"> Product Description </div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                        aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-bookmark-alt font-18 me-1'></i>
                            </div>
                            <div class="tab-title">Tags</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab"
                        aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-star font-18 me-1'></i>
                            </div>
                            <div class="tab-title">Reviews</div>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content pt-3">
                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua,
                        retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.
                        Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry
                        richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                        apparel, butcher voluptate nisi.</p>
                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua,
                        retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.
                        Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry
                        richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                        apparel, butcher voluptate nisi.</p>
                </div>
                <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                    <p>Food truck fixie locavore, accusamus mcsweeney s marfa nulla single-origin coffee squid. Exercitation
                        +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                        craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts
                        ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.
                        Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio
                        cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson
                        biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed
                        echo park.</p>
                </div>
                <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro
                        fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer,
                        iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                        Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles
                        pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of
                        them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                </div>
            </div>
        </div>  --}}

    </div>
@endsection

@push('script')
    <script>
        $('.sizebutton').click(function() {
            var size_id = $(this).data('sizeid');
            var product_id = $(this).data('productid');
            $.ajax({
                url: "{{ route('getColors') }}",
                type: "GET",
                data: {
                    size_id: size_id,
                    product_id: product_id
                },
                dataType: "json",
                success: function(response) {
                    $('.colorsdiv').html(response.data);
                    $('.colorsdiv').find('div').attr('data-productid', product_id);
                    $('.colorsdiv').find('div').attr('data-sizeid', size_id);
                },
                error: function(xhr) {
                    // Handle the error
                    console.log(xhr.responseText);
                }
            });
        });

        $(document).on('click', '.colorbutton', function() {
            var size_id = $(this).data('sizeid');
            var product_id = $(this).data('productid');
            var color_id = $(this).data('colorid');
            $.ajax({
                url: "{{ route('getImages') }}",
                type: "GET",
                data: {
                    size_id: size_id,
                    product_id: product_id,
                    color_id: color_id,
                },
                dataType: "json",
                success: function(response) {
                    $('.imagesdiv').html(response.data);
                },
                error: function(xhr) {
                    // Handle the error
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endpush
