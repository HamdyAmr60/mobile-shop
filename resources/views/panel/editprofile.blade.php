@extends('layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')

@include('../layouts/sucess')
				<!-- row -->
				<div class="row row-sm">
					<!-- Col -->
				

					<!-- Col -->
					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<div class="mb-4 main-content-label">Personal Information</div>
								<form class="form-horizontal" action="{{url('/editprofile') . "/" . Auth::user()->id}}" method="POST" enctype="multipart/form-data">
								@csrf
									<div class="mb-4 main-content-label">Name</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">User Name</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control" name="name" placeholder="User Name" value="{{Auth::user()->name}}">
												@error('name')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											</div>
										</div>
									</div>
								
									<div class="mb-4 main-content-label">Contact Info</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">Email</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control" name="email" placeholder="Email" value="{{Auth::user()->email}}">
												@error('email')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											</div>
											<div class="col-md-3">
												<label class="form-label">profile photo</label>
											</div>
											<div class="col-md-9">
												<input type="file" class="form-control" name="profile_photo_path" placeholder="profile photo">
												@error('profile_photo_path')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											</div>
										</div>
									</div>
									<div class="card-footer text-left">
										<button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button>
									</div>
								</form>
							</div>
							
						</div>
					</div>
					<!-- /Col -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection