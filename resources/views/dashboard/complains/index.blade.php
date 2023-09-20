@extends('dashboard.master')
@push('style')
@endpush
@section('content')
    @include('dashboard.complains.show-modal')
    <div class="row">
        <div class="col-6">
            <h6 class="mb-0 text-uppercase">{{ __('translation.Complains') }} </h6>
        </div>
        @can('complain-create')
        <div class="col-6">
            <a href="{{ route('complains.create') }}" class="btn btn-success btn-sm"
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
                            <th>{{ __('translation.The Person Who Complained') }}</th>
                            <th>{{ __('translation.Application') }}</th>
                            <th>{{ __('translation.Complain') }}</th>
                            <th>{{ __('translation.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $key => $row)
                            <tr>
                             <td>{{  $row->complainable->name }}</td>
                            <td>{{ __('translation.'.  $row->complainable_type)}}</td>
                            <td>{{ substr($row->message , 0 , 70)  }} ...</td>
                            <td>
                                <div class="d-flex order-actions">
                                    @can('complain-edit')
                                    <a href="{{ route('complains.edit', $row) }}" class="ms-3"><i
                                            class="bx bxs-edit"></i></a>
                                    @endcan
                                    @can('complain-delete')
                                    <a href="{{ route('complains.destroy', $row) }}" class="ms-3 confirm-delete"><i
                                            class="bx bxs-trash"></i></a>
                                    <form method="POST" action="{{ route('complains.destroy', $row)}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    @endcan
                                    <a data-name="{{ $row->complainable->name }}" data-email="{{ $row->complainable->email }}" data-phone="{{ $row->complainable->phone }}" data-message="{{ $row->message }}"  data-bs-toggle="modal" data-bs-target="#exampleScrollableModal" href="#" class="ms-3 show-details"><i
                                            class="bx bxs-show"></i></a>
                                </div>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                           <th>{{ __('translation.The Person Who Complained') }}</th>
                            <th>{{ __('translation.Application') }}</th>
                            <th>{{ __('translation.Complain') }}</th>
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
        $(document).on('click' , '.show-details' , function(){
            var name = $(this).data('name');
            var email = $(this).data('email');
            var phone = $(this).data('phone');
            var message = $(this).data('message');

            $('.complain-modal').find('span.name-modal').text(name);
             $('.complain-modal').find('span.email-modal').text(email);
              $('.complain-modal').find('span.phone-modal').text(phone);
               $('.complain-modal').find('span.message-modal').text(message);
        });
    </script>

@endpush
