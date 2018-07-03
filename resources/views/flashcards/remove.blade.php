@extends ('layouts.dashboard')

@section ('content')
<input type="hidden" id="docType" value="flashcard">
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Flashcard</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Elimina</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="container">
	@if($errors->any())
	<div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
		{{$errors->first()}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
	<h6>Sei sicuro di voler eliminare l'appunto "{{ $fileName }}"?</h6>
	<form method="POST" class="my-2" action="{{ route('flashcard.remove') }}">
		@csrf
		<input type="hidden" value="{{ $fileName }}" name="fileName" id="fileName">
		<button type="submit" class="btn btn-danger">Elimina</button>
		<a href="{{ URL::previous() }}" class="btn btn-secondary">Annulla</a>
	</form>
</div>
@endsection
