@extends ('layouts.dashboard')

@section ('content')
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Utente</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Profilo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-nav alt px-2">
            <div class="card">
                <div class="card-header user-header alt bg-dark">
                    <div class="media">
                        <div class="media-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="img__wrap text-center">
                                        <img class="img__img" src="{{ URL::asset(Auth::user()->avatar_url) }}"/>
                                        <span class="img__description" data-toggle="modal" data-target="#myModal">Cambia</span>                               
                                        <!-- The Modal -->
                                        <div class="modal fade" id="myModal">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Scegli un'immagine</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                - Lista immagini
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                                </div>
                                                
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7 center-y">
                                    <h2 class="text-light display-6">
                                        {{ Auth::user()->name }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item row no-margin-x">
                        <div class="col-md-2">
                            <label class="form-control-label">E-Mail</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="{{ Auth::user()->email }}" readonly>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-md-2">
                            <label class="form-control-label">Password</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="password" value="00000000" readonly>
                            <a href="{{ route('password.request') }}" class="help-block">Cambia password</a>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-md-2">
                            <label class="form-control-label">Data creazione account</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="{{ Auth::user()->created_at }}" readonly>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
@endsection