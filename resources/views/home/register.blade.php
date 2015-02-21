@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-collapse">
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="register">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                <div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username">
							</div>
						</div>
                                                
						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail Address">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
						</div>
                                                
                                                <div class="form-group">
							<label class="col-md-4 control-label">Confirmation Password</label>
							<div class="col-md-6">
                                                                <input type="password" class="form-control" name="cpassword" placeholder="Confirmation Password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-5">
                                                                <br />
								<button type="submit" class="btn btn-success" style="margin-right: 15px;">
									Register
								</button>
                                                            
								<button class="btn btn-danger" style="margin-right: 15px;">
									Cancel
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
