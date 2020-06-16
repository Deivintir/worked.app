<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Worked-app</title>
</head>
<body>
<h2>La sesión está $status</h2>
    <span></span>
<div>
<form action="{{ route('store') }}" method="POST">
        @csrf
        <input type="hidden" name="status" value="start">
        <button type="submit">Empezar sesión</button>
    </form>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <input type="hidden" name="status" value="pause">
        <button type="submit">Descanso</button>
    </form>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <input type="hidden" name="status" value="stop">
        <button type="submit">Terminar sesión</button>
    </form>
</div>
<div>
    <div><label for="start">Hora de inicio: </label>
        <span></span>
    </div>
    <div>
        <label for="pause">Descanso: </label>
        <span>01:35:10</span>
    </div>
    <div>
        <label for="stop">Hora de finalización: </label>
        <span>13:35:10</span>
    </div>
    <div>
        <label for="total">Tiempo total: </label>
        <span>02:00:00</span>
    </div>
</div>

</body>
</html>