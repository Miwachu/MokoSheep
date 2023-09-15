<x-app-layout>
    <h1>記録画面</h1>
        <form action="/logs" method="POST">
            @csrf
            <div class="date">
                <h2>日付</h2>
                <input type="date" name="log[date]"/>
                <p class="date__error" style="color:red">{{ $errors->first('log.date') }}</p>
            </div>
            
            <div>
                <h2>天気</h2>
                <input type="text" name="log[weather]" placeholder="くもり💧" />
            </div>
            
            <div>
                <h2>状況</h2>
                <input type="text" name="log[situation]" placeholder="状況" />
            </div>
            
           
            <div>

              <label><input type="checkbox" name="emotion[A]">A</label>
              <label>パーセント：<input type="number" name="emotion[percentage_of_A]" value="1"></label>
              <label><input type="checkbox" name="emotion[B]">B</label>
              <label>パーセント：<input type="number" name="emotion[percentage_of_B]" value="2"></label>
              <label><input type="checkbox" name="emotion[C]">C</label>
              <label>パーセント：<input type="number" name="emotion[percentage_of_C]" value="3"></label>
              <label><input type="checkbox" name="emotion[D]">D</label>
              <label>パーセント：<input type="number" name="emotion[percentage_of_D]" value="4"></label>
              <label><input type="checkbox" name="emotion[E]">E</label>
              <label>パーセント：<input type="number" name="emotion[percentage_of_E]" value="5"></label>
              <label><input type="checkbox" name="emotion[F]">F</label>
              <label>パーセント：<input type="number" name="emotion[percentage_of_F]" value="6"></label>
            </div>   
            
            <div class="image mt-20">
                    <h3>画像</h3>
                    <input type="file" name="log[image_url]">
                </div>
                
             <div>
                <h2>状況の証拠</h2>
                <input type="text" name="log[emotion]" placeholder="状況の証拠" />
            </div>
              
    
            <div>
                <h2>状況の証拠</h2>
                <input type="text" name="log[evidence_of_emotion]" placeholder="状況の証拠" />
            </div>
            
            <div>
                <h2>状況の証拠への反論</h2>
                <input type="text" name="log[counter_evidence_of_emotion]" placeholder="状況の証拠への反論" />
            </div>
            
            <div>
                <h2>柔軟な考え方</h2>
                <input type="text" name="log[flexible_thought]" placeholder="柔軟な考え方" />
            </div>

            <input type="submit" value="保存"/>
        </form>
         <div><a href="/">戻る</a></div>
      
</x-app-layout>