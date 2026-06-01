<h1>TODO(s)</h1>

<a href='/todos/create'>Ajouter un TODO</a>
</br>
liste : 
<ul>
@foreach ($salut as $todo)

<li>
    {{ $todo->title }}
   </br>
   {{ $todo->description }}

   <a href='/////'>Delete</a>
</li>
@endforeach

</ul>