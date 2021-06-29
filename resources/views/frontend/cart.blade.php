@extends('layouts.frontend.master')

@section('css')
	<style>
		.img-cart {
			display: block;
			max-width: 50px;
			height: auto;
			margin-left: auto;
			margin-right: auto;
		}
		table tr td{
			border:1px solid #FFFFFF;    
		}
		
	</style>
@endsection

@section('title', 'Cart')

@section('content')

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Cart</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Blank</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					
					<div class="row">

						@if ($cart)
							
							<div class="col-md-12">
								<div class="panel panel-info">
									<div class="panel-body"> 
										<div class="">
											<table class="table">
												<thead>
													<tr>
														<th>Product</th>
														<th>Qty</th>
														<th>Price</th>
														<th>Total</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($cart->items as $item)
														<tr>
															<td><img src="{{ $item['image'] }}" class="img-cart"></td>
															<td>
															<form class="form-inline">
																<input class="form-control" type="text" value="{{ $item['qty'] }}">
																<button rel="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></button>
																<a href="#" class="btn btn-primary"><i class="fa fa-trash-o"></i></a>
															</form>
															</td>
															<td>${{ $item['price'] }}</td>
															<td>${{ $item['qty'] * $item['price'] }}</td>
														</tr>
													@endforeach
													<tr>
														<td colspan="5">&nbsp;</td>
													</tr>
													<tr>
														<td colspan="3" class="text-right"><strong>Total Qty</strong></td>
														<td>{{ $cart->totalQty }}</td>
													</tr>
													<tr>
														<td colspan="3" class="text-right"><strong>Total</strong></td>
														<td>${{ $cart->totalPrice }}</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<a href="#" class="btn btn-primary  pull-right">&nbsp;CheckOut</a>
								<a href="{{ route('products.shop') }}" class="btn btn-success pull-left">&nbsp;Continue Shopping</a>
							</div>
						@else
							<p class="text-center">asasas</p>
						@endif

					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@endsection		