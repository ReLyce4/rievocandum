@extends ('layouts.dashboard')

@section ('content')
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
					<li class="active">Visualizza flashcard</li>
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
	<form method="POST" action="{{ route('flashcard.add') }}">
		@csrf
		<input type="hidden" value="{{ $fileName }}" name="fileName" id="fileName">
		<input type="hidden" value="{{ $category }}" name="category" id="category">
		<button type="submit" class="btn btn-primary my-2"><span class="fa fa-plus-circle"></span> Aggiungi</button>
		<div id="editorContainer">
			<textarea name="editorDataFront" id="editorFront" readonly>
				@if (isset($editorDataFront))
					{{ $editorDataFront }}
				@endif
			</textarea>
			<h6>Retro:</h6>
			<button type="button" class="btn btn-primary my-2" onclick="showEditorBack()" id="btnShowEditorBack">Mostra retro</button>
			<button type="button" class="btn btn-primary my-2" onclick="hideEditorBack()" id="btnHideEditorBack">Nascondi retro</button>
			<div id="editorBackContainer">
				<textarea name="editorDataBack" id="editorBack" readonly>
					@if (isset($editorDataBack))
						{{ $editorDataBack }}
					@endif
				</textarea>
			</div>
		</div>
	</form>
</div>
@endsection
