<x-app-layout>
    <h1>Blog Name</h1>
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
                <h2>写真</h2>
                <input type="text" name="log[image_url]" placeholder="写真" />
            </div>
            
           
              <form>
             
              <label><input type="radio" name="radio">A</label>
              <label><input type="radio" name="radio">B</label>
              <label><input type="radio" name="radio">C</label>
              <label><input type="radio" name="radio">D</label>
              <label><input type="radio" name="radio">E</label>
              <label><input type="radio" name="radio">F</label>
              
              </form>
    
            
            
            <div>
            <script src="/MokoSheep/resources/views/logs/scar.js"></script>
            <form>
                <canvas
                id="draw-area"
                width="400px"
                height="400px"
                style="border: 1px solid #000000;"></canvas>
              <div>
                <button id="clear-button">全消し</button>
              </div>
            
                
                </form>
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

            <input type="submit" value="store"/>
        </form>
      
</x-app-layout>