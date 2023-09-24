@extends('dashboard.master')
@push('style')
<style>
svg{
    width:50px;
    height:50px;
}
</style>
@endpush
@section('content')
    <div class="row">
        <div class="col-6">
            <h6 class="mb-0 text-uppercase">{{ __('translation.Shipments') }} </h6>
        </div>
        @can('shipment-create')
        <div class="col-6">
            <a href="{{ route('shipments.create') }}" class="btn btn-success btn-sm"
                style="float:left;">{{ __('translation.Add') }} <i class="bx bx-plus"></i></a>
        </div>
        @endcan
    </div>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table">
                    <thead class="table-light">
                        <tr>
                            <th>{{ __('translation.QR Image') }}</th>
                            <th>{{ __('translation.Code') }}</th>
                            <th>{{ __('translation.Type') }}</th>
                            <th>{{ __('translation.Store') }}</th>
                            <th>{{ __('translation.Payment Type') }}</th>
                            <th>{{ __('translation.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $key => $row)
                            <tr style="line-height: 40px !important;">
                                <td>
                                    <span style="width:50px;height:50px;display:block;">{!! $row->qr_code_image !!}</span>
                                </td>
                                <td>{{ $row->shipment_code }}</td>
                                <td>{{ $row->shipmentType->type }}</td>
                                <td>{{ $row->store->name }}</td>
                                <td>{{ $row->payment_type == 1 ? __('translation.Cash') : __('translation.Visa On Delivery') }}</td>
                                <td>
                                    <div class="d-flex order-actions">
                                        @can('shipment-edit')
                                        <a href="{{ route('shipments.edit', $row) }}" class="ms-3"><i
                                                class="bx bxs-edit"></i></a>
                                        @endcan
                                        @can('shipment-delete')
                                        <a href="{{ route('shipments.destroy', $row) }}" class="ms-3 confirm-delete"><i
                                                class="bx bxs-trash"></i></a>
                                        <form method="POST" action="{{ route('shipments.destroy', $row)}}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>{{ __('translation.QR Image') }}</th>
                            <th>{{ __('translation.Code') }}</th>
                            <th>{{ __('translation.Type') }}</th>
                            <th>{{ __('translation.Store') }}</th>
                            <th>{{ __('translation.Payment Type') }}</th>
                            <th>{{ __('translation.Actions') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>

@endpush
