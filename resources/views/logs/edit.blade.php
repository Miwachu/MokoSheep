<x-app-layout>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/logs/{{ $log->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="date mt-10" >
                <h2>日付</h2>
                <input type="date" name="log[date]" value="{{$log->date}}"/>
            </div>
            
            <div class="mt-10">
                <h2>天気</h2>
                <input type=text name="log[weather]" value="{{$log->weather}}"/>
            </div>
            
            <div class="mt-10">
                <h2>出来事・状況</h2>
                <h2 class="text-lg">今あなたは、どんなことで悩んでいますか？どんなことが原因で切ってしまいましたか？具体的に書いてみましょう。</h2>
                <textarea name="log[situation]" style="width: 600px; height: 150px;" value="{{$log->situation}}"></textarea> 
            </div>
            
            <div>
                <h2>気分・感情</h2>
                <h2 class="text-lg">切ったときはどんな気分・感情でしたか？それぞれの強さとともに書いてみましょう。
                数値は「今までで一番その感情が強かった時を100%とすると、今の強さは何%くらいか？」で考えてみましょう</h2>

　            <p class="mt-10 text-lg">悲しみ</p>
              <label class="text-base">数値(0~100)：<input type="number" name="log[A]" value="{{$log->A}}">%</label><br>

              <p class="mt-10 text-lg" >不安</p>
              <label class="text-base">数値(0~100)：<input type="number" name="log[B]" value="{{$log->B}}">%</label><br>
              
　            <p class="mt-10 text-lg">恥ずかしい</p>
              <label class="text-base">数値(0~100)：<input type="number" name="log[C]" value="{{$log->C}}">%</label><br>
              
　            <p class="mt-10 text-lg">罪悪感</p>
              <label class="text-base">数値(0~100)：<input type="number" name="log[D]" value="{{$log->D}}">%</label><br>
              
　            <p class="mt-10 text-lg">自己嫌悪</p>
              <label class="text-base">数値(0~100)：<input type="number" name="log[E]" value="{{$log->E}}">%</label><br>

　            <p class="mt-10 text-lg">焦り</p>
              <label class="text-base">数値(0~100)：<input type="number" name="log[F]" value="{{$log->F}}">%</label><br>
            </div>   
            
            <div>
                <h2 class="mt-10">自動思考</h2>
                <h2 class="text-lg">切っているとき、頭の中では何とつぶやいていましたか？台詞のように書いてみましょう。</h2>
                <textarea name="log[emotion]" style="width: 600px; height: 150px;" value="{{$log->emotion}}"></textarea>
            </div>
              
    
            <div>
                <h2 class="mt-10">自動思考の証拠</h2>
                <h2 class="text-lg">⾃動思考を裏付ける根拠は何でしょうか？</h2>
                <textarea name="log[evidence_of_emotion]" style="width: 600px; height: 150px;" value="{{$log->evidence_of_emotion}}"></textarea> 
            </div>
            
            <div>
                <h2 class="mt-10">自動思考への反証</h2>
                <h2 class="text-lg">⾃動思考に異議を申し⽴ててみてください。</h2>
            <textarea name="log[counter_evidence_of_emotion]" style="width: 600px; height: 150px;" value="{{$log->counter_evidence_of_emotion}}"></textarea> 
            </div>
            
            <div>
                <h2 class="mt-10">柔軟な考え方・とらえ方</h2>
                <h2 class="text-lg">より柔軟で、合理的な考えを記⼊してください。</h2>
                <textarea name="log[flexible_thought]" style="width: 600px; height: 150px;" value="{{$log->flexible_thought}}"></textarea> 
            </div>

            <input type="submit" class="bg-blue-200 mt-10 px-2 py-1 my-4" value="保存">
        </form>
    </div>
</x-app-layout>