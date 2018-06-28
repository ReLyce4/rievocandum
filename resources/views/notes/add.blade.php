@extends ('layouts.dashboard')

@section ('content')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Home</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Menù</li>
				</ol>
			</div>
		</div>
	</div>
</div>
	<div class="row m-2" id="editorFormName">
		<div class="col-md-4">
			<input class="form-control" type="text" id="editorFileName">
		</div>
		<div class="col-md-2">
			<button class="btn btn-primary" onclick="showEditor()">Scegli nome</button>
		</div>
	</div>
<div class="container">
	<div id="editorContainer" style="display:none">
		<textarea name="editor" id="editor">
		</textarea>
	</div>
</div>
@endsection
