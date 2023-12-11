<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>テスト</title>
    @vite('resources/css/app.css')
</head>

<body>
    <h1 class="text-3xl font-bold underline bg-orange-600">
        Hello world!
    </h1>
    <h1 class="text-6xl text-center font-bold underline">aaaaaa</h1>
    @if ($todo_lists->isNotEmpty())
    <ul class="text-3xl text-center">
        @foreach ($todo_lists as $item)
        <li>
            {{ $item->name }}
        </li>
        @endforeach
    </ul>
    @endif

</body>

</html>