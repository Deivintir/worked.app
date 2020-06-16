<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Worked-app</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<body>
    <div class="jumbotron text-center">
        <div class="container">

            <h1>- Worked-app -</h1>

            @if(!isset($session))
                <p class="lead text-muted">No hay ninguna sesión creada.</p>
            @else
                <p class="lead text-muted">La sesión actual es la número {{ $session->id }} y está <span class="badge badge-{{ $session->getStatusColor() }}">{{ $session->status }}</span>.</p>
            @endif
    
            <div class="d-flex justify-content-center">
                @if(App\WorkedSession::canStart())
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="start">
                    <button class="btn btn-success mr-1" type="submit">Empezar sesión</button>
                </form>
                @endif
                @if(App\WorkedSession::canPause())
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="pause">
                    <button class="btn btn-primary mr-1" type="submit">Descanso</button>
                </form>
                @endif
                @if(App\WorkedSession::canResume())
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="resume">
                    <button class="btn btn-primary mr-1" type="submit">Fin descanso</button>
                </form>
                @endif
                @if(App\WorkedSession::canStop())
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="stop">
                    <button class="btn btn-danger mr-1" type="submit">Terminar sesión</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
