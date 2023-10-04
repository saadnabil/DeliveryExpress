@extends('dashboard.master')

@section('content')
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">{{ __('translation.New Shipments') }}</p>
                            <h4 class="my-1 text-info">{{ $newShipmentsCount }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                               <i class="fadeIn animated bx bx-selection"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">{{ __('translation.In Stock Shipments') }}</p>
                            <h4 class="my-1 text-danger">{{ $inStockShipmentsCount }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class="fadeIn animated bx bx-grid-vertical"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">{{ __('translation.Recieved Shipments') }}</p>
                            <h4 class="my-1 text-success">{{ $RecievedShipmentsCount }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fadeIn animated bx bx-stats"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">{{ __('translation.Waiting Delivery Shipments') }}</p>
                            <h4 class="my-1 text-warning">{{ $waitingDeliveryCount }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class="fadeIn animated bx bx-slider-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 border-start border-0 border-4" style="border-color:#6a11cb !important;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">{{ __('translation.Out For Delivery Shipments') }}</p>
                            <h4 class="my-1" style="color:#6a11cb;">{{ $outForDeliveryCount }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-deepblue text-white ms-auto">
                        <i class="fadeIn animated bx bx-expand"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-danger"
                style="border-color:#f54ea2 !important;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">{{ __('translation.Delivered Shipments') }}</p>
                            <h4 class="my-1" style="color:#f54ea2;">{{ $deliveredCount }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"> <i class="fadeIn animated bx bx-command"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-success"
                style="border-color:#42e695 !important;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">{{ __('translation.Returned Shipments') }}</p>
                            <h4 class="my-1 " style="color:#42e695;">{{ $returnedCount }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-quepal text-white ms-auto"><i class="fadeIn animated bx bx-aperture"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 border-start border-0 border-4" style="border-color:#ffdf40 !important;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">{{ __('translation.Failed Shipments') }}</p>
                            <h4 class="my-1" style="color:#ffdf40;">{{ $failedCount }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                        <i class="fadeIn animated bx bx-layer"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12 col-lg-8 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">{{ __('translation.Shipments To Type') }}</h6>
                        </div>
                        {{--  <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i
                                    class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>  --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
                        <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                style="color: #2f80ed"></i>{{ __('translation.New Shipments') }}</span>
                        <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                style="color: #ff416c"></i>{{ __('translation.Multi Exchange Shipments') }}</span>
                        <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                style="color: #96c93d"></i>{{ __('translation.Money Shipments') }}</span>
                    </div>
                    <div class="chart-container-1">
                        <canvas id="chart1"></canvas>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
                    <div class="chart1col">
                        <div class="p-3">
                            <h5 class="mb-0">{{ array_sum($chartTwoData['newData']) }}</h5>
                            <small class="mb-0">{{ __('translation.New Shipments') }}<span> <i
                                        class="bx bx-up-arrow-alt align-middle"></i>
                                </span></small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <h5 class="mb-0">{{ array_sum($chartTwoData['multiExhchangeData']) }}</h5>
                            <small class="mb-0">{{ __('translation.Multi Exchange Shipments') }}<span> <i
                                        class="bx bx-up-arrow-alt align-middle"></i>
                                </span></small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <h5 class="mb-0">{{ array_sum($chartTwoData['moneyData']) }}</h5>
                            <small class="mb-0">{{ __('translation.Money Shipments') }}<span> <i
                                        class="bx bx-up-arrow-alt align-middle"></i>
                                </span></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">{{ __('translation.Shipments Status') }}</h6>
                        </div>
                        {{--  <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i
                                    class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>  --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container-2">
                        <canvas id="chart2"></canvas>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li
                        class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                        {{ __('translation.New Shipments') }} <span
                            class="badge bg-info  rounded-pill">{{ $newShipmentsCount }}</span>
                    </li>
                    <li
                        class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                        {{ __('translation.In Stock Shipments') }} <span
                            class="badge bg-danger rounded-pill">{{ $inStockShipmentsCount }}</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        {{ __('translation.Recieved Shipments') }}
                        <span class="badge bg-success rounded-pill">{{ $RecievedShipmentsCount }}</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        {{ __('translation.Waiting Delivery Shipments') }}
                        <span class="badge bg-warning rounded-pill">{{ $waitingDeliveryCount }}</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        {{ __('translation.Out Delivery Shipments') }}
                        <span class="badge   rounded-pill"
                            style="background-color:#6a11cb">{{ $outForDeliveryCount }}</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        {{ __('translation.Delivered Shipments') }}
                        <span class="badge   rounded-pill" style="background-color:#f54ea2">{{ $deliveredCount }}</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        {{ __('translation.Returned Shipments') }}
                        <span class="badge   rounded-pill" style="background-color:#42e695">{{ $returnedCount }}</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        {{ __('translation.Failed Shipments') }}
                        <span class="badge bg-warning  rounded-pill"
                            style="background-color:#42e695">{{ $failedCount }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div><!--end row-->



    <div class="row">


         <div class="col-12 col-lg-12 col-xl-8 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">{{ __('translation.Delivery And Store') }}</h6>
                        </div>
                        {{--  <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown"><i
                                    class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>  --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container-0">
                        <canvas id="chart5"></canvas>
                    </div>
                </div>
                <div class="row row-group border-top g-0">
                    <div class="col">
                        <div class="p-3 text-center">
                            <h4 class="mb-0 text-danger">{{ array_sum($chartFiveData['storeData']) }}</h4>
                            <p class="mb-0">{{ __('translation.Stores') }}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 text-center">
                            <h4 class="mb-0 text-success">{{ array_sum($chartFiveData['deliveryData']) }}</h4>
                            <p class="mb-0">{{ __('translation.Deliveries') }}</p>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </div>

        <div class="col-12 col-lg-5 col-xl-4 d-flex">
            <div class="card w-100 radius-10">
                <div class="card-body">
                    <div class="card radius-10 border shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">{{ __('translation.Cities Count') }}</p>
                                    <h4 class="my-1">{{ $cityCount }}</h4>
                                </div>
                                <div class="widgets-icons-2 bg-gradient-cosmic text-white ms-auto"><i
                                        class='bx bxs-heart-circle'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card radius-10 border shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">{{ __('translation.Countries Count') }}</p>
                                    <h4 class="my-1">{{ $countryCount }}</h4>
                                </div>
                                <div class="widgets-icons-2 bg-gradient-ibiza text-white ms-auto"><i
                                        class='bx bxs-comment-detail'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card radius-10 mb-0 border shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">{{ __('translation.Activities Count') }}</p>
                                    <h4 class="my-1">{{ $activityCount }}</h4>
                                </div>
                                <div class="widgets-icons-2 bg-gradient-kyoto text-dark ms-auto"><i
                                        class='bx bxs-share-alt'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div><!--end row-->

    <div class="row row-cols-1 row-cols-lg-3">
        <div class="col-12 col-lg-12 col-xl-12 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <p class="font-weight-bold mb-1 text-secondary">{{ __('translation.Collection Requests') }}</p>
                    <div class="d-flex align-items-center mb-4">
                    </div>
                    <div class="chart-container-0 mt-5">
                        <canvas id="chart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
        {{--  <div class="col d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Orders Summary</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown"><i
                                    class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container-1 mt-3">
                        <canvas id="chart4"></canvas>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li
                        class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                        Completed <span class="badge bg-gradient-quepal rounded-pill">25</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Pending
                        <span class="badge bg-gradient-ibiza rounded-pill">10</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Process
                        <span class="badge bg-gradient-deepblue rounded-pill">65</span>
                    </li>
                </ul>
            </div>
        </div>  --}}

    </div><!--end row-->
@endsection


@push('script')
    //Chart2
    <script>
        // chart 2
        var ctx = document.getElementById("chart2").getContext('2d');

        var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, '#56ccf2');
        gradientStroke1.addColorStop(1, '#2f80ed');

        var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, '#ff416c');
        gradientStroke2.addColorStop(1, '#ff4b2b');


        var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke3.addColorStop(0, '#00b09b');
        gradientStroke3.addColorStop(1, '#96c93d');

        var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke4.addColorStop(0, '#fc4a1a');
        gradientStroke4.addColorStop(1, '#f7b733');

        var gradientStroke5 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke5.addColorStop(0, '#6a11cb');
        gradientStroke5.addColorStop(1, '#2575fc');

        var gradientStroke6 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke6.addColorStop(0, '#f54ea2');
        gradientStroke6.addColorStop(1, '#ff7676');

        var gradientStroke7 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke7.addColorStop(0, '#42e695');
        gradientStroke7.addColorStop(1, '#3bb2b8');



        var gradientStroke8 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke8.addColorStop(0, '#ffdf40');
        gradientStroke8.addColorStop(1, '#ff8359');

        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["{{ __('translation.New Shipments') }}", " {{ __('translation.In Stock Shipments') }}",
                    "{{ __('translation.Recieved Shipments') }}",
                    "{{ __('translation.Waiting Delivery Shipments') }}",
                    "{{ __('translation.Out Delivery Shipments') }}",
                    "{{ __('translation.Delivered Shipments') }}",
                    "{{ __('translation.Returned Shipments') }}", "{{ __('translation.Failed Shipments') }}"
                ],
                datasets: [{
                    backgroundColor: [
                        gradientStroke1,
                        gradientStroke2,
                        gradientStroke3,
                        gradientStroke4,
                        gradientStroke5,
                        gradientStroke6,
                        gradientStroke7,
                        gradientStroke8,
                    ],
                    hoverBackgroundColor: [
                        gradientStroke1,
                        gradientStroke2,
                        gradientStroke3,
                        gradientStroke4,
                        gradientStroke5,
                        gradientStroke6,
                        gradientStroke7,
                        gradientStroke8,
                    ],
                    data: [{{ $newShipmentsCount }}, {{ $inStockShipmentsCount }},
                        {{ $RecievedShipmentsCount }}, {{ $waitingDeliveryCount }},
                        {{ $outForDeliveryCount }}, {{ $deliveredCount }}, {{ $returnedCount }},
                        {{ $failedCount }}
                    ],
                    borderWidth: [1, 1, 1, 1]
                }]
            },
            options: {
                maintainAspectRatio: false,
                cutout: 82,
                plugins: {
                    legend: {
                        display: false,
                    }
                }

            }
        });
    </script>
    //Chart2

    // chart 1
    <script>
        var ctx = document.getElementById("chart1").getContext('2d');
        var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, '#56ccf2');
        gradientStroke1.addColorStop(1, '#2f80ed');

        var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, '#ff416c');
        gradientStroke2.addColorStop(1, '#ff4b2b');

        var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke3.addColorStop(0, '#00b09b');
        gradientStroke3.addColorStop(1, '#96c93d');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيه', 'يوليو', 'اغسطس', 'سبتمبر', 'اكتوبر',
                    'نوفمبر', 'ديسمبر'
                ],
                datasets: [{
                    label: "{{ __('translation.New Shipments') }}",
                    data: {{ json_encode($chartTwoData['newData']) }},
                    borderColor: gradientStroke1,
                    backgroundColor: gradientStroke1,
                    hoverBackgroundColor: gradientStroke1,
                    pointRadius: 0,
                    fill: false,
                    borderRadius: 20,
                    borderWidth: 0
                }, {
                    label: "{{ __('translation.Multi Exchange Shipments') }}",
                    data: {{ json_encode($chartTwoData['multiExhchangeData']) }},
                    borderColor: gradientStroke2,
                    backgroundColor: gradientStroke2,
                    hoverBackgroundColor: gradientStroke2,
                    pointRadius: 0,
                    fill: false,
                    borderRadius: 20,
                    borderWidth: 0
                }, {
                    label: "{{ __('translation.Money Shipments') }}",
                    data: {{ json_encode($chartTwoData['moneyData']) }},
                    borderColor: gradientStroke3,
                    backgroundColor: gradientStroke3,
                    hoverBackgroundColor: gradientStroke3,
                    pointRadius: 0,
                    fill: false,
                    borderRadius: 20,
                    borderWidth: 0
                }]
            },

            options: {
                maintainAspectRatio: false,
                barPercentage: 0.5,
                categoryPercentage: 0.8,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    // chart 1

    // chart 5
    <script>
        var ctx = document.getElementById("chart5").getContext('2d');

        var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, '#f54ea2');
        gradientStroke1.addColorStop(1, '#ff7676');

        var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, '#42e695');
        gradientStroke2.addColorStop(1, '#3bb2b8');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيه', 'يوليو', 'اغسطس', 'سبتمبر', 'اكتوبر',
                    'نوفمبر', 'ديسمبر'
                ],
                datasets: [{
                    label: 'Clothing',
                    data: {{ json_encode($chartFiveData['storeData']) }},
                    borderColor: gradientStroke1,
                    backgroundColor: gradientStroke1,
                    hoverBackgroundColor: gradientStroke1,
                    pointRadius: 0,
                    fill: false,
                    borderWidth: 1
                }, {
                    label: 'Electronic',
                    data: {{ json_encode($chartFiveData['deliveryData']) }},
                    borderColor: gradientStroke2,
                    backgroundColor: gradientStroke2,
                    hoverBackgroundColor: gradientStroke2,
                    pointRadius: 0,
                    fill: false,
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                barPercentage: 0.5,
                categoryPercentage: 0.8,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    // chart 5

    // chart 3
    <script>
    var ctx = document.getElementById('chart3').getContext('2d');

    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, '#00b09b');
        gradientStroke1.addColorStop(1, '#96c93d');


    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, '#ff416c');
        gradientStroke2.addColorStop(1, '#ff4b2b');

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
            labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيه', 'يوليو', 'اغسطس', 'سبتمبر', 'اكتوبر',
                    'نوفمبر', 'ديسمبر'
                ],
            datasets: [{
                    label: "{{ __('translation.Collection Requests') }}",
                    data: {{ json_encode($chartThreeData['CollectionRequestData']) }},
                    backgroundColor: [
                    gradientStroke1
                    ],
                    fill: {
                        target: 'origin',
                        above: 'rgb(21 202 32 / 15%)',   // Area will be red above the origin
                        //below: 'rgb(21 202 32 / 100%)'   // And blue below the origin
                    },
                    tension: 0.4,
                    borderColor: [
                    gradientStroke1
                    ],
                    borderWidth: 3
                },{
                    label: "{{ __('translation.Collection Bakeup Requests') }}",
                    data: {{ json_encode($chartThreeData['CollectionBakeupRequestData']) }},
                    backgroundColor: [
                    gradientStroke2
                    ],
                    fill: {
                        target: 'origin',
                        above: 'rgb(255 65 106 / 15%)',   // Area will be red above the origin
                        //below: 'rgb(21 202 32 / 100%)'   // And blue below the origin
                    },
                    tension: 0.4,
                    borderColor: [
                    gradientStroke2
                    ],
                    borderWidth: 3
                }]
            },

            options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
        });
        </script>
        // chart 3


@endpush
