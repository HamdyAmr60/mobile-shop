@extends('layouts.master')
@section('css')
<!--Internal  Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')

@include('../layouts/sucess')
@include('../layouts/fail')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body h-100">
								<div class="row row-sm ">
									<div class=" col-xl-5 col-lg-12 col-md-12">
										<div class="preview-pic tab-content">
										  <div class="tab-pane active" id="pic-1"><img src="{{URL::asset('storage') . "/" . $product->image}}" alt="image"/></div>
										</div>

									</div>
									<div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
										<h4 class="product-title mb-1">{{$product->name}}</h4>
										
										<div class="rating mb-1">
											<span class="review-no">41 reviews</span>
										</div>
										<h6 class="price">current price: <span class="h3 ml-2">{{$product->price}}</span><span>LE</span></h6>
										<p class="product-description">{{$product->desc}}</p>
										<p class="text-muted tx-13 mb-1"><strong>Quantity: </strong> {{$product->quantity}}</p>

										<form action="{{url('product/quantity' . "/" .$product->id)}}" method="post">
											@csrf
											<div class="form-group col-sm-6 col-md-3 mg-t-10">
												<label for="exampleInputEmail1">Sold quantity</label>
												<input type="number" class="form-control" id="exampleInputEmail1" name="quantity" placeholder="enter sold quantity">
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10">
												<a href=""><button class="btn btn-dark btn-block" type="submit">sell</button></a>
											</div>
										</form>
									
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

@endsection
@section('js')
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection