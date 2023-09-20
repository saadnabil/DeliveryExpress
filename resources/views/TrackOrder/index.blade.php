@extends('TrackOrder.Partials/master')

@section('content')
 <main class="container">
        <div class="follow-shipment" dir="rtl">
            <div class="shipment--header ">
                <h5 class="shipment--header--title"> تتبع الشحنة رقم :</h5>
                <span class="shipment--header--no text-navy">{{ $shipment->shipment_code }}</span>
            </div>
            <div class="shipment--stepper">
                <h5 class="shipment--stepper--title"> حالة الشحنة :</h5>
                <div class="shipment--stepper--content">
                    <section class="stepper">

                        <div class="step {{ $shipment->status == 'pending' ? 'step-active' : '' }}">
                            <div>
                                <div class="circle"><img src="{{ url('TrackOrder/icons/Services.png') }}" /></div>
                            </div>
                            <div>
                                <div class="title">تم تسجيل طلبك في المتجر</div>
                            </div>
                        </div>

                         <div class="step {{ $shipment->status == 'in_stock' ? 'step-active' : '' }}">
                            <div>
                                <div class="circle"><img src="{{ url('TrackOrder/icons/Services.png') }}" /></div>
                            </div>
                            <div>
                                <div class="title">جاري تجهيز طلبك</div>
                            </div>
                        </div>

                        <div class="step {{ $shipment->status == 'out_for_delivery' ? 'step-active' : '' }}">
                            <div>
                                <div class="circle"><img src="{{ url('TrackOrder/icons/Services.png') }}" /></div>
                            </div>
                            <div>
                                <div class="title">طلبك في الطريق</div>
                            </div>
                        </div>

                        @if ($shipment->status == 'pending' || $shipment->status == 'in_stock' || $shipment->status == 'out_for_delivery' || $shipment->status == 'delivered' || $shipment->status == 'returned'  )
                        <div class="step {{ $shipment->status == 'delivered' ? 'step-active' : '' }}">
                            <div>
                                <div class="circle"><img src="{{ url('TrackOrder/icons/Services.png') }}" /></div>
                            </div>
                            <div>
                                <div class="title">تم استلام الطلب</div>
                            </div>
                        </div>
                        @endif
                        @if($shipment->status == 'fail')
                        <div class="step step-active">
                            <div>
                                <div class="circle"><img src="{{ url('TrackOrder/icons/Services.png') }}" /></div>
                            </div>
                            <div>
                                <div class="title">فشلت العملية</div>
                                <div class="caption">{{ $shipment->cancelReason->reason }}</div>
                            </div>
                        </div>
                        @endif
                        @if($shipment->status == 'returned')
                        <div class="step step-active">
                            <div>
                                <div class="circle"><img src="{{ url('TrackOrder/icons/Services.png') }}" /></div>
                            </div>
                            <div>
                                <div class="title">تم ارجاع الطلب</div>

                            </div>
                        </div>
                        @endif

                    </section>
                </div>

            </div>
        </div>
    </main>
@endsection

 @push('script')
 <script>
$(document).ready(function() {
    // Find all steps
    var steps = $('.step');

    // Find the currently active step
    var currentStep = $('.step-active');

    // Find the index of the current step
    var currentIndex = steps.index(currentStep);

    // Add the 'step-active' class to the current step and previous steps
    for (var i = 0; i <= currentIndex; i++) {
        steps.eq(i).addClass('step-active');
    }
});
 </script>
 @endpush

