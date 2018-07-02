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
					<li class="active">Visualizza appunti</li>
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
	<h4>{{ $fileName }}</h4>
	<p>{{ $category }}</p>
	<form method="POST" action="{{ route('note.add') }}">
		@csrf
		<input type="hidden" value="{{ $fileName }}" name="fileName" id="fileName">
		<input type="hidden" value="{{ $category }}" name="category" id="category">
		<button type="submit" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Aggiungi</button>
		<div id="editorContainer">
			<textarea name="editorData" id="editor" readonly>
				@if (isset($editorData))
					{{ $editorData }}
				@endif
			</textarea>
		</div>
	</form>
</div>
@endsection
