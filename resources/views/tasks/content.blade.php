<form action="/tasks" method="post" class="mt-10">
    @csrf
    @include("tasks.date")
    <div class="flex flex-row items-center">
        <label class="my-3 w-full max-w-3xl mx-auto border rounded-md shadow-sm py-0.5 border-slate-300">
            <p id="temperature-label" class="text-1xl text-center">体温: 36.0℃</p>
            <div class="progress">
                <div id="temperature-bar" class="progress-bar bg-success" role="progressbar" aria-valuenow="36.0" aria-valuemin="35.0" aria-valuemax="42.0"></div>
            </div>
            <input id="temperature-slider" type="range" name="temp" class="form-range mx-auto" style="width: 10vw" min="35.0" max="42.0" step="0.1" value="36.0" oninput="updateTemperatureLabel(this.value)">
        </label>
        <label class="w-full max-w-3xl mx-auto border rounded-md shadow-sm py-0.5 border-slate-300">
            <legend class="text-center">睡眠</legend>
            <div class="flex flex-row">
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
        <label class="w-full max-w-3xl mx-auto border rounded-md shadow-sm py-0.5 border-slate-300">
            <legend class="text-center">体調</legend>
            <div class="flex flex-row">
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
        <label class="w-full max-w-3xl mx-auto border rounded-md shadow-sm py-0.5 border-slate-300">
            <legend class="text-center">食事</legend>
            <div class="flex flex-row">
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
            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="特筆事項" type="text" name="point" />
        </label>

        <button type="submit" class=" p-4 bg-slate-800 text-white w-80 rounded-md hover:bg-slate-900 transition-colors">
            登録
        </button>
    </div>
</form>
@if ($tasks->isNotEmpty())
<div class="max-w-7xl mx-auto mt-20">
    <div class="inline-block min-w-full py-2 align-middle">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">
                            日時</th>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">
                            体温</th>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">
                            睡眠</th>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">
                            体調</th>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">
                            食事</th>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">
                            特筆事項
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($tasks as $item)
                    <tr>
                        <td class="px-3 py-4 text-sm text-gray-500">
                            <div>
                                {{ $item->input_date }}
                            </div>
                        </td>
                        <td class="px-3 py-4 text-sm text-gray-500">
                            <div>
                                {{ $item->temp }}
                            </div>
                        </td>
                        <td class="px-3 py-4 text-sm text-gray-500">
                            <div>
                                {{ $item->sleeped }}
                            </div>
                        </td>
                        <td class="px-3 py-4 text-sm text-gray-500">
                            <div>
                                {{ $item->eated }}
                            </div>
                        </td>
                        <td class="px-3 py-4 text-sm text-gray-500">
                            <div>
                                {{ $item->condition }}
                            </div>
                        </td>
                        <td class="px-3 py-4 text-sm text-gray-500">
                            <div>
                                {{ $item->point }}
                            </div>
                        </td>
                        <td class="p-0 text-right text-sm font-medium">
                            <div class="flex justify-end">
                                <div>
                                    <a href="/tasks/{{ $item->data_id }}/edit/" class="inline-block text-center py-4 w-20 underline underline-offset-2 text-sky-600 md:hover:bg-sky-100 transition-colors">編集</a>
                                </div>
                                <div>
                                    <form onsubmit="return deleteTask();" action="/tasks/{{ $item->data_id }}" method="post" class="inline-block text-gray-500 font-medium" role="menuitem" tabindex="-1" name="{{ $item->data_id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="py-4 w-20 md:hover:bg-slate-200 transition-colors">削除</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif