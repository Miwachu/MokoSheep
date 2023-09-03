<x-app-layout>
        <!-- formタグにenctypeを追加 -->
        <form action="/logs" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
            </div>
            <!-- ここから追加 -->
            <div class="image">
                <input type="file" name="image">
            </div>
            <!-- ここまで追加 -->
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
</x-app-layout>
    