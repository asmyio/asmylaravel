<!-- resources/views/calculator.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <!-- Link the CSS file -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Simple Calculator</h1>

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    @if(session('result'))
        <p>Result: {{ session('result') }}</p>
    @endif

    <form action="/calculate" method="post">
        @csrf
        <label for="num1">Number 1:</label>
        <input type="text" name="num1" required>

        <label for="operator">Operator:</label>
        <select name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>

        <label for="num2">Number 2:</label>
        <input type="text" name="num2" required>

        <button type="submit">Calculate</button>
    </form>
</body>
</html>
