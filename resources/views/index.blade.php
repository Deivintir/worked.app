<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Worked-app</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<body>
    <div class="jumbotron text-center mb-0">
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
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="text-center">Current session</h2>
                        <h3>Info</h3>
                        <ul>
                            <li>Initial hour: 08:00</li>
                            <li>Resting time:</li>
                            <li>Release hour:</li>
                        </ul>
                        <h3>resume</h3>
                        <ul>
                            <li>Starter hour:</li>
                            <li>Time working session: 07:00</li>
                            <li>Release time: 19:00</li>
                </div>  
                <div class="col-md-4">
                    <h2 class="text-center">Today sessions</h2>
                    <h3>Sessions list</h3>
                    <li>session-1</li>
                    <li>session-2</li>
                    <li>session-3</li>
                    <h3>resume day sessions</h3>
                    <ul>
                        <li>Time working today:</li>
                        <li>Time resting today</li>
                        <li>Starter hour:</li>
                        <li>Release hour:</li>
                        <li>Today has rest 4 times</li>    
                    </ul>
                </div>
                <div class="col-md-4">
                    <h2 class="text-center">This week sessions</h2>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
