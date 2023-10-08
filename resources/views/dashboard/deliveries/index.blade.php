@extends('dashboard.master')
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-6">
            <h6 class="mb-0 text-uppercase">{{ __('translation.Deliveries') }} </h6>
        </div>
        @can('delivery-create')
        <div class="col-6">
            <a href="{{ route('deliveries.create') }}" class="btn btn-success btn-sm"
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
                            <th>{{ __('translation.Image') }}</th>
                            <th>{{ __('translation.Name') }}</th>
                            <th>{{ __('translation.Email') }}</th>
                            <th>{{ __('translation.Phone') }}</th>
                            <th>{{ __('translation.Birth Date') }}</th>
                            <th>{{ __('translation.Verified Status') }}</th>
                            <th>{{ __('translation.Active Status') }}</th>
                            <th>{{ __('translation.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $key => $row)
                            <tr style="line-height: 40px !important;">
                                <td class="text-center">
                                    <img src=" {{ url('storage/'.$row->image) }}" class="user-img" alt="Delivery Logo">
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->birth_date }}</td>
                                <td>
                                    @if ($row->verified == 1)
                                        <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>  {{ __('translation.Verified') }}</div>
                                    @else
                                        <div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>  {{ __('translation.Not Verified') }}</div>
                                    @endif
                                </td>
                                <td>
                                    @if ($row->active == 1)
                                        <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>  {{ __('translation.Active') }}</div>
                                    @else
                                        <div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>  {{ __('translation.Not Active') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex order-actions">
                                        @can('delivery-edit')
                                        <a href="{{ route('deliveries.edit', $row) }}" class="ms-3"><i
                                                class="bx bxs-edit"></i></a>
                                        @endcan
                                        @can('delivery-delete')
                                        <a href="{{ route('deliveries.destroy', $row) }}" class="ms-3 confirm-delete"><i
                                                class="bx bxs-trash"></i></a>
                                        <form method="POST" action="{{ route('deliveries.destroy', $row)}}">
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
                            <th>{{ __('translation.Image') }}</th>
                            <th>{{ __('translation.Name') }}</th>
                            <th>{{ __('translation.Email') }}</th>
                            <th>{{ __('translation.Phone') }}</th>
                            <th>{{ __('translation.Birth Date') }}</th>
                            <th>{{ __('translation.Verified Status') }}</th>
                            <th>{{ __('translation.Active Status') }}</th>
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
