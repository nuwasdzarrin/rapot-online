@extends('layout.master')

@section ('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
	<div class="row">
@if(session('sukses'))
<div class="allert allert-success" role="allert">
	{{session('success')}}
</div>
@endif
<div class="row">
	<div class="col-lg-6">
		<form action="/setting/{{auth()->user()->id}}/updatepassword" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label for="text">Password</label>
				<input type="text" name="password" class="form-control" aria-describedby="emailHelp" placeholder="Password">
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