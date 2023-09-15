<x-app-layout>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/logs/{{ $log->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='date'>
                <h2>日付</h2>
                <input type='date' name='log[date]'>
            </div>
                <input type="submit" value="保存">
        </form>
    </div>
</x-app-layout>