@extends('dashboard.master')
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-6">
            <h6 class="mb-0 text-uppercase">{{ __('translation.Collection Requests') }} -  {{ __('translation.Collection Bakeup Requests') }}</h6>
        </div>
        @can('collectionRequest-create')
        <div class="col-6">
            <a href="{{ route('collectionRequests.create') }}" class="btn btn-success btn-sm"
                style="float:left;">{{ __('translation.Add') }} <i class="bx bx-plus"></i></a>
        </div>
        @endcan
    </div>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#ID</th>
                            <th>{{ __('translation.Store') }}</th>
                            <th>{{ __('translation.Type') }}</th>
                            <th>{{ __('translation.Notes') }}</th>
                            <th>{{ __('translation.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $key => $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->store->name }}</td>
                                <td>{{ $row->type == 1 ? __('translation.Collection Requests') :  __('translation.Collection Bakeup Requests')  }}</td>
                                <td>{{ $row->notes }}</td>
                                <td>
                                    <div class="d-flex order-actions">
                                        @can('collectionRequest-show')
                                        <a href="{{ route('collectionRequests.show', $row) }}" class="ms-3"><i
                                                class="bx bxs-show"></i></a>
                                        @endcan

                                        @can('collectionRequest-recieve')
                                            @if($row->status == 'pending')
                                                <a title="{{ __('translation.Did You Collect These Shipments And In The Stock Now ?') }}" href="{{ route('collectionRequests.destroy', $row) }}" class="ms-3 confirm-collect">
                                                <i class="fadeIn animated bx bx-message-square-check"></i>
                                                </a>
                                                <form method="POST" action="{{ route('collectionRequests.confirmRecieveShipments', $row)}}">
                                                    @csrf
                                                </form>
                                            @endif
                                        @endcan

                                        @can('collectionRequest-delete')
                                        <a href="{{ route('collectionRequests.destroy', $row) }}" class="ms-3 confirm-delete"><i
                                                class="bx bxs-trash"></i></a>
                                        <form method="POST" action="{{ route('collectionRequests.destroy', $row)}}">
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
                           <th>#ID</th>
                            <th>{{ __('translation.Store') }}</th>
                            <th>{{ __('translation.Type') }}</th>
                            <th>{{ __('translation.Notes') }}</th>
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
