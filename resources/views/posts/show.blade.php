<x-app-layout>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div>
            <div>
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
            <!-- ここから追加 -->
            <div>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
            </div>
            <!-- ここまで追加 -->
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
</x-app-layout>
    