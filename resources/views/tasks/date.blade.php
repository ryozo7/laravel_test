<input type="date" id="input_date" name="input_date" onchange="checkDate()" value="{{date('Y-m-d')}}" class="w-50 my-6 mx-auto border rounded-md shadow-sm py-0.5 border-slate-300" value="{{date('Y-m-d')}}" max="{{date('Y-m-d')}}">
<h1 id="todayCondition" class="text-2xl font-bold text-center my-3">今日の体調は？</h1>


<script>
    function checkDate() {
        const selectedDate = new Date(document.getElementById('input_date').value);
        const currentDate = new Date();

        if (selectedDate.toISOString().slice(0, 10) === currentDate.toISOString().slice(0, 10)) {
            document.getElementById('todayCondition').textContent = "今日の体調は？";
        } else {
            var formattedDate = selectedDate.toISOString().slice(0, 10);
            document.getElementById('todayCondition').textContent = formattedDate + "の体調は？";
        }
    }
</script>