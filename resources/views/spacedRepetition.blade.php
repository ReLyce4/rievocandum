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
<div class="container card">
    <div class="card-body">
        <h5 class="my-2">Tabella indicativa per la ripetizione dilazionata</h5>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th>Livello 1</th>
                    <th>Livello 2</th>
                    <th>Livello 3</th>
                    <th>Livello 4</th>
                    <th>Livello 5</th>
                    <th>Livello 6</th>
                    <th>Livello 7</th>
                    <th>Livello 8</th>
                </thead>
                <tbody>
                    <td>1 giorno</td>
                    <td>3 giorni</td>
                    <td>7 giorni</td>
                    <td>14 giorni</td>
                    <td>21 giorni</td>
                    <td>28 giorni</td>
                    <td>2 mesi</td>
                    <td>3 mesi</td>
                </tbody>
            </table>
        </div>
        <p>Per memorizzare con le flashcard niente è meglio del&nbsp;<strong>Sistema Leitner.</strong></p>
        <p>
            &Egrave; un metodo didattico a&nbsp;<strong>ripetizione dilazionata.&nbsp;</strong>La ripetizione dilazionata si basa sul principio che il miglior
            momento per ripassare un&rsquo;informazione per allocarla nella memoria a lungo termine(e quindi non dimenticarla) &egrave; quella di eseguire
             delle sessioni di ripasso poco prima che essa stia per essere dimenticata. La distanza fra una sessione ed un&rsquo;altra &egrave; 
             approssimabile attraverso la cosiddetta<strong>&nbsp;curva dell&rsquo;oblio</strong>(la tabella sopra riportata è un esempio di interpretazione).
             Nello specifico il sistema Leitner funziona così:
             Bisogna organizzare le flashcard in livelli; ogni flashcard partirà dal livello 1 e saliranno di un livello se alla successiva sessione di ripasso
              si è stati in grado di richiamare perfettamente l’informazione nel retro della flashcard. Se si sbaglierà, invece, si riporterà la flashcard al livello
               1 e si ricomincerà di nuovo. Maggiore sarà il livello, più distanti saranno le sessioni di ripasso di quel gruppo di flashcard. I tempi scritti 
               nella tabella sono puramente indicativi. Variano molto da persona a persona e da materia seguita pertanto è necessario che, partendo da quello,
               si adatti la distanza tra una sessione ed un altra nonché il numero di sessioni. Del resto i sistemi a ripetizione dilazionata sono molto flessibili.
        </p>
    </div>
</div>
@endsection