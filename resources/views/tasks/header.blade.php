<header class="bg-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="py-6">
            <p class="text-white text-xl">Todoアプリ</p>
        </div>
        <div name="userName">{{ Auth::user()->name }}</div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Log Out') }}
        </a>
    </div>
</header>