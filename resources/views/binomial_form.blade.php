<!DOCTYPE html>
<html>
<head>
    <title>Binomial Expansion</title>
</head>
<body>
    <h1>Expansión de Binomios</h1>
    <form action="{{ url('calculate') }}" method="post">
        @csrf
        <label for="n">Introduce la potencia a la que se desea elevar el binomio (a + b):</label>
        <input type="number" id="n" name="n" required>
        <button type="submit">Calcular</button>
    </form>
</body>
</html>
