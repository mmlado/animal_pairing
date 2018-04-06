<tr>
    <td>{{$animal->name}}</td>
    <td>{{$animal->dob}}</td>
    <td>{{$animal->own ? "Yes" : "No"}}</td>
    <td>{{$animal->active ? "Yes" : "No"}}</td>
    <td>
        @include('animal.index.options')
    </td>
</tr>