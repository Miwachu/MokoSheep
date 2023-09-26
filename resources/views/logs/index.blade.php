<x-app-layout>
<div class="bg-blue-100">
<div class="w-2/3 text-xl mx-auto font-normal flex justify-self-auto text-black font-sans">

       <h1>記録一覧</h1>
        <div type="button" class="grid grid-cols-1 justify-items-center mt-10">
         
         @foreach ($logs as $log)
            <a href="/logs/{{ $log->id }}" type="button" class="bg-indigo-50 rounded px-20 py-10 mx-10 my-4 hover:bg-pink-100 hover:translate-y-0.5 transform transition">
                    <p class="date text-center">{{$log->date}}</p> </a>
                    
                    <form action="/logs/{{ $log->id }}" id="form_{{ $log->id }}" method="post" class="text-sm">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $log->id }})" class="bg-indigo-100 hover:bg-pink-200 hover:translate-y-0.5 transform transition">削除</button> 
                    </form>
        
         @endforeach
         
      
            
            
       </div>
       
       <div class='paginate'>{{ $logs->links() }}</div>
           
 </div>
 
    <script>
            function deletePost(id) {
            'use strict'
    
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
       
</x-app-layout>
    