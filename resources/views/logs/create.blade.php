<x-app-layout>
<div class="bg-blue-100">
<div class="w-2/3 text-xl mx-auto font-normal flex justify-self-auto text-black font-sans">

        <form action="/logs" method="POST">
        <h1 class="text-xl mt-10">記録画面</h1>

            @csrf
            <div class="date mt-10" >
                <h2>日付</h2>
                <input type="date" name="log[date]"/>
                <p class="date__error" style="color:red">{{ $errors->first('log.date') }}</p>
            </div>
            
            <div class="mt-10">
                <h2>天気</h2>
                <input type=text name="log[weather]" placeholder="（例）くもり" />
            </div>
            
            <div class="mt-10">
                <h2>出来事・状況</h2>
                <h2 class="text-lg">今あなたは、どんなことで悩んでいますか？どんなことが原因で切ってしまいましたか？具体的に書いてみましょう。</h2>
                <textarea name="log[situation]" placeholder="（例）仕事でミスをして上司に叱られた。" style="width: 600px; height: 150px;" ></textarea> 
            </div>
            
            <div class="image mt-20">
                    <h3>画像</h3>
            <a href="/canvas">傷の位置</a>
                    <input type="file" name="log[image_url]">
                </div>

            <div>
                <h2>気分・感情</h2>
                <h2 class="text-lg">切ったときはどんな気分・感情でしたか？それぞれの強さとともに書いてみましょう。
                数値は「今までで一番その感情が強かった時を100%とすると、今の強さは何%くらいか？」で考えてみましょう</h2>

　            <p class="mt-10 text-lg">悲しみ</p>
              <label class="text-base">数値(0~100)：<input type="number" name="log[A]" value="50">%</label><br>

              <p class="mt-10 text-lg" >不安</p>
              <label class="text-base">数値(0~100)：<input type="number" name="log[B]" value="50">%</label><br>
              
　            <p class="mt-10 text-lg">恥ずかしい</p>
              <label class="text-base">数値(0~100)：<input type="number" name="log[C]" value="50">%</label><br>
              
　            <p class="mt-10 text-lg">罪悪感</p>
              <label class="text-base">数値(0~100)：<input type="number" name="log[D]" value="50">%</label><br>
              
　            <p class="mt-10 text-lg">自己嫌悪</p>
              <label class="text-base">数値(0~100)：<input type="number" name="log[E]" value="50">%</label><br>

　            <p class="mt-10 text-lg">焦り</p>
              <label class="text-base">数値(0~100)：<input type="number" name="log[F]" value="50">%</label><br>
            </div>   
            
            <div>
                <h2 class="mt-10">自動思考</h2>
                <h2 class="text-lg">切っているとき、頭の中では何とつぶやいていましたか？台詞のように書いてみましょう。</h2>
                <textarea name="log[emotion]" placeholder="（例）絶対に上司に嫌われた。きっと私なんかこの職場に必要ないんだ。みんなが私のことを無能だと思っている。" style="width: 600px; height: 150px;"></textarea>
            </div>
              
    
            <div>
                <h2 class="mt-10">自動思考の証拠</h2>
                <h2 class="text-lg">⾃動思考を裏付ける根拠は何でしょうか？</h2>
                <textarea name="log[evidence_of_emotion]" placeholder="（例）上司が私にあきれていた。" style="width: 600px; height: 150px;" ></textarea> 
            </div>
            
            <div>
                <h2 class="mt-10">自動思考への反証</h2>
                <h2 class="text-lg">⾃動思考に異議を申し⽴ててみてください。</h2>
            <textarea name="log[counter_evidence_of_emotion]" placeholder="（例）上司はミスをしたことに注意したけど、私自身を否定したわけじゃない。成果を上げたら褒めてくれることもある。" style="width: 600px; height: 150px;"></textarea> 
            </div>
            
            <div>
                <h2 class="mt-10">柔軟な考え方・とらえ方</h2>
                <h2 class="text-lg">より柔軟で、合理的な考えを記⼊してください。</h2>
                <textarea name="log[flexible_thought]" placeholder="（例）今日はミスをしてしまったが、この失敗を今後に生かして次からはミスしないように気を付けよう。明日からも仕事頑張ろう。" style="width: 600px; height: 150px;" ></textarea> 
            </div>

            <input type="submit" class="bg-blue-200 mt-10 px-2 py-1 my-4" value="保存"/>
         <div><a href="/" type="button" class="bg-blue-200 mt-10 px-2 py-1 my-4">  戻る</a></div>

        </form>
      
</x-app-layout>