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
					<input type="hidden" name="userId" value="{{ $userId or null }}" >
					<button class="form-control" type="submit"><span class="fa fa-search"></span></button>
				</div>
			</form>
		</div>
	</div>
	@forelse($list as $note)
		<div class="card card-body border-light">
			<div class="row">
				@if (Auth::user()->id == $note->user_id)
				<div class="col-md-6">
					<h5 class="card-title text-capitalize">
						<a href="{{ route('note.write', ['fileName' => $note->file_name]) }}">{{$note->file_name}}</a>
						<small> &bull; <a class="text-danger" href="{{ route('note.remove', ['fileName' => $note->file_name]) }}">Elimina</a></small>
					</h5>
				</div>
				@else
				<div class="col-md-6">
					<h5 class="card-title text-capitalize">
						<a href="{{ route('note.view', ['fileName' => $note->file_name, 'userId' => $note->user_id, 'category' => $note->category]) }}">{{$note->file_name}}</a>
					</h5>
				</div>
				@endif
				<div class="col-md-6">
					<p class="card-text text-right"><a href="{{ route('profile', ['name' => $note->name]) }}">{{$note->name}}</a></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p class="card-text text-capitalize"><small class="text-muted">{{$note->category}}</small></p>
				</div>
				<div class="col-md-6 text-right">
					<p class="card-text"><small class="text-muted">Creato il {{$note->created_at}}</small></p>
				</div>
			</div>
		</div>
	@empty
		<div class="text-center">
			<p>Nessun appunto</p>
		</div>
	@endforelse
	{{ $list->links() }}
</div>
@endsection
