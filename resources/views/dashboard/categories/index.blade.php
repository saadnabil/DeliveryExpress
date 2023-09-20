@extends('dashboard_v2.master')
@section('content')
                <div class="row">
                    <div class="col-6">
                        <h6 class="mb-0 text-uppercase">{{ __('Categories') }} </h6>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm" style="float:right;">{{ __('translation.Add') }} <i class="bx bx-plus"></i></a>
                    </div>
                </div>

				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table">
								<thead class="table-light">
									<tr>
										<th>{{ __('translation.Name') }}</th>
										<th>{{ __('translation.Service') }}</th>
										<th>{{ __('translation.Actions') }}</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($rows as $key => $row)
                                    <tr>
										<td>{{ $row->name }}</td>
										<td>{{ $row->serviceCategory->title }}</td>
										<td>
                                            <div class="d-flex order-actions">
                                                    <a href="{{ route('category.edit', $row) }}" class="ms-3"><i class="bx bxs-edit"></i></a>
                                                    <a href="{{ route('category.destroy' , $row) }}" class="ms-3 confirm-delete" ><i class="bx bxs-trash"></i></a>
                                                    <form method="POST" action="{{ route('category.destroy', $row)}}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
											</div>
                                        </td>
									</tr>
                                @endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>{{ __('Name') }}</th>
										<th>{{ __('Service') }}</th>
										<th>{{ __('Actions') }}</th>
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

