<x-app-layout>
    <h1 class="title">
            {{ $log->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $log->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
            <div class="edit"><a href="/logs/{{ $log->id }}/edit">edit</a></div>
        </div>
</x-app-layout>