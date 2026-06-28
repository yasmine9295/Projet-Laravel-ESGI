<h1>Update un TODO #{{ $todo->id }}</h1>

<form action="/todos/update" method="post">
    @csrf
    titre : 
    </br>
    <input type="text" name="title" value="{{ $todo->title }}" />
    </br>
    description : 
    </br>
    <textarea name="description">{{ $todo->description }}</textarea>
    </br>
        <input type="hidden" name="id" value="{{ $todo->id }}" />
    <button type="submit">Update</button>
</form>