<x-app-layout>
    <div class="w-full h-screen bg-blue-100">
    <div class="w-2/3 text-xl mx-auto font-normal flex justify-self-auto text-black font-sans">

            <div class='logs'>
                    <h3 class='id'>{{ $log->id }}</h3>  
            
                    <h5 class="date">{{$log->date}}</h5>
            
                    <h5 class='weather'>{{ $log->weather }}</h5>
                    
                    <h3 class='situation'>{{ $log->situation}}</h3>  
            
                    <p class='A'>A:
                                    　{{ $log->A }}%、
                                      B:
                                      {{ $log->B }}%  
                                      C:
                                      {{ $log->C }}%
                                      D:
                                      {{ $log->D }}%
                                      E:
                                      {{ $log->E }}%
                                      F:
                                      {{ $log->F }}%
                         </p>  
                    
                    <h3 class='emotion'>{{ $log->emotion}}</h3>  

                    <h5 class='evidence_of_emotion'>{{ $log->evidence_of_emotion }}</h5>
                    
                    <h5 class='counter_evidence_of_emotion'>{{ $log->counter_evidence_of_emotion }}</h5>
                    
                    <h5 class='flexible_thought'>{{ $log->flexible_thought }}</h5>
                    
       
            </div>
            
           
        
        <div class="footer">
            <a href="/home" type="button" class="bg-blue-200 mt-10 px-2 py-1 my-4">戻る</a>
            <div class="edit"><a href="/logs/{{ $log->id }}/edit" class="bg-blue-200 mt-10 px-2 py-1 my-4">編集</a></div>
        </div>
</x-app-layout>