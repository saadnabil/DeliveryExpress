@extends('dashboard_v2.master')

@push('style')
@endpush
@section('content')
				<div class="row">
                    <div class="col-6">
                        <h6 class="mb-0 text-uppercase">{{ __('translation.Products') }} </h6>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('product.create') }}" class="btn btn-success btn-sm" style="float:right;">{{ __('translation.Add') }} <i class="bx bx-plus"></i></a>
                    </div>
                </div>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table  ">
								<thead class="table-light">
									<tr>
                                    	<th>{{ __('translation.Image') }}</th>
										<th>{{ __('translation.Name') }}</th>
										<th>{{ __('translation.Price') }}</th>
										<th>{{ __('translation.Price After Discount') }}</th>
										<th>{{ __('translation.Category') }}</th>
										<th>{{ __('translation.Stock') }}</th>
										<th>{{ __('translation.Actions') }}</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($rows as $key => $row)
                                    <tr>
                                        <td><img src="{{ url('storage/'.$row->image) }}" class="product-img-2" alt="product img"></td>
										<td>{{ $row->name }}</td>
										<td>{{ $row->old_price }}</td>
										<td>{{ $row->price }}</td>
										<td>{{ $row->cat->name_en }}</td>
                                        <td>{{ $row->stock }}</td>
										<td>
                                            <div class="d-flex order-actions">
                                                    <a target="_blank" href="{{ route('product.show', $row) }}" class="ms-3"><i class="bx bxs-show"></i></a>
                                                    <a href="{{ route('product.edit', $row) }}" class="ms-3"><i class="bx bxs-edit"></i></a>
                                                    <a href="{{ route('product.destroy' , $row) }}" class="ms-3"><i class="bx bxs-trash"></i></a>
											</div>
                                        </td>
									</tr>
                                @endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>{{ __('translation.Image') }}</th>
										<th>{{ __('translation.Name') }}</th>
										<th>{{ __('translation.Price') }}</th>
										<th>{{ __('translation.Price After Discount') }}</th>
										<th>{{ __('translation.Category') }}</th>
										<th>{{ __('translation.Stock') }}</th>
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


