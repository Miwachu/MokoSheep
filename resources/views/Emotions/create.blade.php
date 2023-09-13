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
            
            <div>
                <h2>感情</h2>
                @foreach($emotions as $emotion)
        
                    <label>
                        {{-- valueを'$subjectのid'に、nameを'配列名[]'に --}}
                        <input type="checkbox" value="{{ $emotion->id }}" name="emotions_array[]">
                        <input type="text" value="{{ $emotion->id }}" name="emotions_array[]">

                            {{$emotion->emotions_data}}
                        </input>
                    </label>
                @endforeach         
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