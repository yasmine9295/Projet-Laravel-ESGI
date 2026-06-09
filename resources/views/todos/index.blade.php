<h1>TODO(s)</h1>

<div style="font-weight: bold; color: pink">
    {{ session('status') }}
</div>

<a href='/todos/create'>Ajouter un TODO</a>
</br>
liste : 
<ul>
@foreach ($salut as $todo)



<li>
    <a href="{{ route('show_todo', $todo->id) }}">{{ $todo->title }}</a>
   </br>
   {{ $todo->description }}
    
   <a href="{{ url('todos/update', $todo->id )}}">Update</a>
    <a href="{{ route('delete_todo', $todo->id ) }}">Delete</a>

</li>
@endforeach

</ul>