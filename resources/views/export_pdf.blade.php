<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel 8 HTML to PDF Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body class="antialiased container mt-5">

    <table class="table">
        <thead>
            <tr class="table-primary">
                <td><h1>{{ $p->title }}</h1></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><h4>{{ $p->desc }}<h4></td>
            </tr>
        </tbody>
    </table>
</body>

</html>