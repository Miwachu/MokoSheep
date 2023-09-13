<x-app-layout>
       <h1>Blog Name</h1>
        <div class='logs'>
            @foreach ($logs as $log)
                    <h3 class='id'>{{ $log->id }}</h3>  
            
                    <h5 class="date">{{$log->date}}</h5>
            
                    <h5 class='weather'>{{ $log->weather }}</h5>
            
                    <h5 class='image_url'>{{ $log->image_url }}</h5>
                    
                    <h5 class='evidence_of_emotion'>{{ $log->evidence_of_emotion }}</h5>
                    
                    <h5 class='counter_evidence_of_emotion'>{{ $log->counter_evidence_of_emotion }}</h5>
                    
                    <h5 class='flexible_thought'>{{ $log->flexible_thought }}</h5>
                
                <h5 class='emotion'>
                    @foreach($log->emotions as $emotion)   
                         {{ $emotion->emotion_data }}
                         {{ $emotion->emotion_percentage }}
                    @endforeach
                </h5>

        
            @endforeach
        </div>
        <form action="/logs/{{ $log->id }}" id="form_{{ $log->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deleteLog({{ $log->id }})">delete</button> 
        </form>
        <a href='/logs/create'>create</a>
       
        <script>
            function deletePost(id) {
            'use strict'
    
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
        }
    }
</script>
</x-app-layout>
    