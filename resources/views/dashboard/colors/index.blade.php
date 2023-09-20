@extends('dashboard_v2.master')
@section('content')
                <div class="row">
                    <div class="col-6">
                        <h6 class="mb-0 text-uppercase">{{ __('translation.Colors') }} </h6>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('color.create') }}" class="btn btn-success btn-sm" style="float:right;">{{ __('translation.Add') }} <i class="bx bx-plus"></i></a>
                    </div>
                </div>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table">
								<thead class="table-light">
									<tr>
										<th>{{ __('translation.Title') }}</th>
										<th>{{ __('translation.Color') }}</th>
										<th>{{ __('translation.Actions') }}</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($rows as $key => $row)
                                    <tr>
										<td>{{ $row->title }}</td>
										<td>{{ $row->color }}</td>
										<td>
                                            @if($row->system_standard == 0)
                                            <div class="d-flex order-actions">
                                                    <a href="{{ route('color.edit', $row) }}" class="ms-3"><i class="bx bxs-edit"></i></a>
                                                    <a href="{{ route('color.destroy' , $row) }}" class="ms-3 confirm-delete" ><i class="bx bxs-trash"></i></a>
                                                    <form method="POST" action="{{ route('color.destroy', $row)}}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
											</div>
                                            @endif
                                        </td>
									</tr>
                                @endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>{{ __('translation.Title') }}</th>
										<th>{{ __('translation.Color') }}</th>
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

