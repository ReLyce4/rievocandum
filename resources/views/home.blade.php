@extends ('layouts.dashboard')

@section ('content')
        <!-- Header-->

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

        <div class="row no-margin-x">
            <div class="col-md-6">
                <div class="profile-nav alt">
                    <div class="card">
                        <div class="card-header user-header alt bg-dark">
                            <div class="media">
                                <div class="media-body">
                                    <h2 class="text-light display-6"><i class="hawcons icon-document" style="font-size:28px"></i> Appunti</h2>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="{{ route('note.add') }}"><i class="hawcons icon-document-add"></i> Scrivi appunti</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('note.list', ['userId' => Auth::user()->name]) }}"><i class="hawcons icon-document-list"></i> Lista appunti</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('note.explore') }}"><i class="hawcons icon-document-search"></i> Esplora appunti</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="profile-nav alt">
                    <div class="card">
                        <div class="card-header user-header alt bg-dark">
                            <div class="media">
                                <div class="media-body">
                                    <h2 class="text-light display-6"><i class="hawcons icon-note" style="font-size:28px"></i> Flashcard</h2>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#"><i class="hawcons icon-note-add"></i> Crea flashcard</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#"><i class="hawcons icon-note-list"></i> Lista flashcard</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#"><i class="hawcons icon-note-search"></i> Esplora flashcard</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
@endsection