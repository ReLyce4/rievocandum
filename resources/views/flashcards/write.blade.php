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
					<li class="active">Crea flashcard</li>
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
	<p id="save-datetime"></p>
	<input type="hidden" value="{{ $fileName }}" id="fileName">
	<div id="editorContainer">
		<textarea name="editor" id="editorFront">
			@if (isset($editorDataFront))
				{{ $editorDataFront }}
			@endif
		</textarea>
	</div>
	<h6>Retro:</h6>
	<button type="button" class="btn btn-primary my-2" onclick="showEditorBack()" id="btnShowEditorBack">Mostra retro</button>
	<button type="button" class="btn btn-primary my-2" onclick="hideEditorBack()" id="btnHideEditorBack">Nascondi retro</button>
	<div id="editorBackContainer">
		<textarea name="editorDataBack" id="editorBack">
			@if (isset($editorDataBack))
				{{ $editorDataBack }}
			@endif
		</textarea>
	</div>
</div>
@endsection
