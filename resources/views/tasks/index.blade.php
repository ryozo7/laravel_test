<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>こんこん</title>

    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-[100vh]">
    @include("tasks.header")
    <main class="grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-[100px]">
                @include('tasks.content')
            </div>
        </div>
    </main>
    @include("tasks.footer")
    <script>
        function deleteTask() {
            if (confirm('本当に削除しますか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <script>
        function updateTemperatureLabel(value) {
            document.getElementById('temperature-label').innerText = "体温: " + value + '℃';
            document.getElementById('temperature-bar').style.width = ((value - 35.0) / 0.5) + '%';
            document.getElementById('temperature-bar').setAttribute('aria-valuenow', value);
        }
    </script>
</body>

</html>