<x-app-layout>
<div class="w-full h-screen bg-blue-100">

       <h1>記録一覧</h1>
        <div type="button" class="grid grid-cols-1 justify-items-center mt-10">
         @foreach ($logs as $log)
            <a href="/logs/{{ $log->id }}" type="button" class="bg-indigo-50 rounded px-20 py-10 mx-10 my-4 hover:bg-pink-100 hover:translate-y-0.5 transform transition">
                <h3 class='id text-center'>{{ $log->id }}</h3>  
                    <p class="date text-center">{{$log->date}}</p>
                    
                    
         @endforeach
            </a>
       </div>
       
        <div class='paginate'>{{ $logs->links() }}</div>
           
 </div>
 
        <a href='/logs/create'>create</a>
       
</x-app-layout>
    