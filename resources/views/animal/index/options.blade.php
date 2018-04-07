<a href="{{ action('AnimalController@show', ['id' => $id]) }}" class="glyphicon glyphicon-eye-open"></a>
<a href="{{ action('AnimalController@edit', ['id' => $id]) }}" class="glyphicon glyphicon-edit"></a>
<form action="{{ action('AnimalController@destroy', ['id' => $id]) }}" method="POST" style="display:inline;">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button class="btn-link glyphicon glyphicon-remove" style="padding:0"></button>
</form>
