<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>

    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-[100vh]">
    <header class="bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-6">
                <p class="text-white text-xl">こんこん-編集画面</p>
            </div>
        </div>
    </header>

    <main class="grow grid place-items-center">
        <div class="w-full mx-auto px-4 sm:px-6">
            <div class="py-[100px]">
                <form action="/tasks/{{ $task->data_id }}" method="post" class="mt-10">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col items-center">
                        <h1 id="todayCondition" class="text-2xl font-bold text-center my-3" value="{{ $task->point }}">{{ $task->input_date }}の体調は？</h1>
                        <label class="my-3 w-full max-w-3xl mx-auto border rounded-md shadow-sm py-0.5 border-slate-300">
                            <legend class="text-center my-3">体温</legend>
                            <p id="temperature-label" class="text-1xl text-center">36.0℃</p>
                            <div class="progress">
                                <div id="temperature-bar" class="progress-bar bg-success" role="progressbar" aria-valuenow="36.0" aria-valuemin="35.0" aria-valuemax="42.0"></div>
                            </div>
                            <input id="temperature-slider" type="range" class="form-range mx-auto" style="width: 30vw" min="35.0" max="42.0" step="0.1" value="36.0" oninput="updateTemperatureLabel(this.value)">
                        </label>
                        <label class="my-3 w-full max-w-3xl mx-auto border rounded-md shadow-sm py-0.5 border-slate-300">
                            <legend class="text-center my-3">睡眠</legend>
                            <div class="flex flex-row my-3">
                                <div class="mx-auto">
                                    <input id="sleep_good" class="peer/sleep_good" type="radio" name="sleeped" value="Good" checked />
                                    <label for="sleep_good" class="peer-checked/sleep_good:text-sky-500">Good</label>
                                </div>
                                <div class="mx-auto">
                                    <input id="sleep_soso" class="peer/sleep_soso" type="radio" name="sleeped" value="Soso" />
                                    <label for="sleep_soso" class="peer-checked/sleep_soso:text-sky-500">Soso</label>
                                </div>
                                <div class="mx-auto">
                                    <input id="sleep_bad" class="peer/sleep_bad" type="radio" name="sleeped" value="Bad" />
                                    <label for="sleep_bad" class="peer-checked/sleep_bad:text-sky-500">Bad</label>
                                </div>
                            </div>
                        </label>
                        <label class="my-3 w-full max-w-3xl mx-auto border rounded-md shadow-sm py-0.5 border-slate-300">
                            <legend class="text-center my-3">体調</legend>
                            <div class="flex flex-row my-3">
                                <div class="mx-auto">
                                    <input id="good" class="peer/good" type="radio" name="condition" value="Good" checked />
                                    <label for="good" class="peer-checked/good:text-sky-500">Good</label>
                                </div>
                                <div class="mx-auto">
                                    <input id="soso" class="peer/soso" type="radio" name="condition" value="Soso" />
                                    <label for="soso" class="peer-checked/soso:text-sky-500">Soso</label>
                                </div>
                                <div class="mx-auto">
                                    <input id="bad" class="peer/bad" type="radio" name="condition" value="Bad" />
                                    <label for="bad" class="peer-checked/bad:text-sky-500">Bad</label>
                                </div>
                            </div>
                        </label>
                        <label class="my-3 w-full max-w-3xl mx-auto border rounded-md shadow-sm py-0.5 border-slate-300">
                            <legend class="text-center my-3">食事</legend>
                            <div class="flex flex-row my-3">
                                <div class="mx-auto">
                                    <input id="good" class="peer/good" type="radio" name="eated" value="Good" checked />
                                    <label for="good" class="peer-checked/good:text-sky-500">Good</label>
                                </div>
                                <div class="mx-auto">
                                    <input id="soso" class="peer/soso" type="radio" name="eated" value="Soso" />
                                    <label for="soso" class="peer-checked/soso:text-sky-500">Soso</label>
                                </div>
                                <div class="mx-auto">
                                    <input id="bad" class="peer/bad" type="radio" name="eated" value="Bad" />
                                    <label for="bad" class="peer-checked/bad:text-sky-500">Bad</label>
                                </div>
                            </div>
                        </label>
                        <label class="w-full max-w-3xl mx-auto">
                            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" type="text" name="point" value="{{ $task->point }}" />
                        </label>

                    </div>
                    <div class="mt-8 w-full flex items-center justify-center gap-10">
                        <a href="/tasks" class="block shrink-0 underline underline-offset-2">
                            戻る
                        </a>
                        <button type="submit" class="p-4 bg-sky-800 text-white w-full max-w-xs hover:bg-sky-900 transition-colors">
                            更新
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </main>
    <footer class="bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-4 text-center">
                <p class="text-white text-sm">こんこん</p>
            </div>
        </div>
    </footer>
    <script>
        function updateTemperatureLabel(value) {
            document.getElementById('temperature-label').innerText = value + '℃';
            document.getElementById('temperature-bar').style.width = ((value - 35.0) / 0.5) + '%';
            document.getElementById('temperature-bar').setAttribute('aria-valuenow', value);
        }
    </script>
</body>

</html>