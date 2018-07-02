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
					<li class="active">Aggiungi info</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<form method="POST" action="{{ route('note.add') }}">
		@csrf
		<div style="max-width:400px">
			<label>Nome documento</label>
			<input class="form-control my-2" type="text" name="fileName" placeholder="Inserisci nome documento" required>
			<label>Nome categoria</label>
			<input class="form-control my-2" type="text" name="category" placeholder="Inserisci nome categoria" required>
			<button class="btn btn-primary my-2" type="submit">Scegli nome</button>
		</div>
	</form>
	@if($errors->any())
		<div class="alert alert-danger my-2" role="alert">
			{{$errors->first()}}
		</div>
	@endif
</div>
@endsection
