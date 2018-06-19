<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Christian Gritto">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ URL::asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/landing-page.css') }}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-blue fixed-top" id="navbar">
      <div class="container">
        <a class="navbar-brand" href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-menu">
          <ul class="navbar-nav text-center">
            <li class="navbar-item">
              <a class="nav-link mx-2" href="#">Accedi</a>
            </li>
            <li class="navbar-item">
              <a class="nav-link mx-2" href="#">Registrati</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-4">Learn smarter with Rievocandum</h1>
            <p>
              Diventa un membro della nostra comunità di apprendimento<br />Troverai note su un grande numero di argomenti  
              e otterrai l'accesso ai<br /> nostri strumenti basati sull'SRS(Spaced Repetition System)
            </p>
            <a class="btn btn-light-blue" href="#section">Scopri di più</a>
          </div>
        </div>
      </div>
    </header>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center" id="section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-sticky-note-o m-auto text-blue"></i>
              </div>
              <h3>Appunti</h3>
              <p class="lead mb-0">Crea i tuoi appunti o ottieni l'accesso a quelli di tanti studenti sugli argomenti che ti interessano</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-clock-o m-auto text-blue"></i>
              </div>
              <h3>SRS</h3>
              <p class="lead mb-0">Gestisci le tue sessioni di studio in maniera intelligente attraverso un metodo provato scientificamente</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-check m-auto text-blue"></i>
              </div>
              <h3>Flashcard/Quiz</h3>
              <p class="lead mb-0">Utilizza un potente strumento di creazione delle flashcard strutturate con lo schema domanda-risposta</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Appunti</h2>
            <p class="lead mb-0">
              Attraverso un potente editor online avrai la possibilità di scrivere i tuoi appunti e accedervi da qualsiasi dispositivo.
              Potrai inoltre leggere o copiare gli appunti di altri utenti che saranno resi pubblici nella nostra piattaforma.
            </p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h2>Spaced Repetition System</h2>
            <p class="lead mb-0">
              L'SRS è un sistema didattico che permette la gestione intelligente delle sessioni di studio sostituendo l'obsoleto e inefficace metodo del
              rileggere più volte in un arco di tempo breve per memorizzare. Inoltre grazie all'ottimizzazione del ripasso non dimenticarai mai più le informazioni apprese.
            </p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Flashcard/Quiz</h2>
            <p class="lead mb-0">
              Le flashcard sono considerate come uno dei migliori metodi di studio per l'apprendimento di piccole informazioni come brevi sintesi o definizioni.
              Sono molto usate infatti per lo studio delle lingue(straniere e non) poiché permettono una facile ed efficiente memorizzazione del lessico e delle regole sintattiche.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials
    <section class="testimonials text-center bg-light">
      <div class="container">
        <h2 class="mb-5">What people are saying...</h2>
        <div class="row">
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="{{ URL::asset('img/testimonials-1.jpg') }}" alt="">
              <h5>Margaret E.</h5>
              <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="{{ URL::asset('img/testimonials-2.jpg') }}" alt="">
              <h5>Fred S.</h5>
              <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="{{ URL::asset('img/testimonials-3.jpg') }}" alt="">
              <h5>Sarah	W.</h5>
              <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
            </div>
          </div>
        </div>
      </div>
    </section>
                -->

    <!-- Call to Action -->
    <section class="call-to-action bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h2 class="mb-4">Diventa parte della nostra community!</h2>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <button type="submit" class="btn btn-lg btn-blue">Registrati</button>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
<!--            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
            </ul> -->
            <p class="text-muted small mb-4 mb-lg-0">&copy; {{ env('APP_NAME') }} 2018. All Rights Reserved.</p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-facebook fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-twitter fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram fa-2x fa-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('js/scroll-effects.js') }}"></script>
    
  </body>

</html>
