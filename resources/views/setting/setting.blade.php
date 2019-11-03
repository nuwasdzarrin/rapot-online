@extends('layout.master')

@section ('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
	<div class="row">
		@if(session('sukses'))
		<div class="alert alert-success" role="allert">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{session('sukses')}}
		</div>
		@endif
<div class="row">
	<div class="col-lg-6">
		<form action="/setting/{{auth()->user()->id}}/" method="post">
			{{csrf_field()}}
			<div class="form-group">
			<label for="signin-password" class="control-label sr-only">Password</label>
			<input name="password" type="password" class="form-control" id="signin-password" value="" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@stop
