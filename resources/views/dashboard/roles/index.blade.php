@extends('dashboard.master')
@section('content')
    <div class="row">
        <div class="col-6">
            <h6 class="mb-0 text-uppercase">{{ __('translation.Roles') }} </h6>
        </div>
         @can('role-create')
            <div class="col-6">
                <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm" style="float:left;">{{ __('translation.Add') }} <i class="bx bx-plus"></i></a>
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
                            <th>{{ __('translation.Role') }}</th>
                            <th>{{ __('translation.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $key => $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>
                                <div class="d-flex order-actions">
                                        @can('role-edit')
                                            <a href="{{ route('roles.edit', $row) }}" class="ms-3"><i class="bx bxs-edit"></i></a>
                                        @endcan
                                        @can('role-delete')
                                            @if($row->system_standard == 0)
                                                <a href="{{ route('roles.destroy' , $row) }}" class="ms-3  confirm-delete" ><i class="bx bxs-trash"></i></a>
                                                <form method="POST" action="{{ route('roles.destroy', $row)}}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            @endif
                                        @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>{{ __('translation.Role') }}</th>
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
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );

			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
@endpush


