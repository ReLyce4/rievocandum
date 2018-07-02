@extends ('layouts.dashboard')

@section ('content')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Appunti</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Lista appunti</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="container">
		@if($errors->any())
			<div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
				{{$errors->first()}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
	<div class="row">
		<div class="col-md-12">
			<form class="form-group form-inline float-right" method="GET" action="{{ route('note.search') }}">
				<div>
					<input class="form-control" type="text" name="fileName" placeholder="Cerca" required>
					<input type="hidden" name="userId" value="{{ Auth::user()->id }}">
					<button class="form-control" type="submit"><span class="fa fa-search"></span></button>
				</div>
			</form>
		</div>
	</div>
	@foreach($list as $note)
		<div class="card card-body border-light">
			<div class="row">
				<div class="col-md-6">
					<h5 class="card-title"><a href="{{ route('note.open', ['file_name' => $note->file_name]) }}">{{$note->file_name}}</a></h5>
				</div>
				<div class="col-md-6">
					<p class="card-text text-right"><a href="{{ route('profile', ['name' => $note->name]) }}">{{$note->name}}</a></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p class="card-text"><small class="text-muted">Ultima modifica {{$note->updated_at}}</small></p>
				</div>
				<div class="col-md-6 text-right">
					<p class="card-text"><small class="text-muted">Creato il {{$note->created_at}}</small></p>
				</div>
			</div>
		</div>
	@endforeach
	{{ $list->links() }}
</div>
@endsection
