@extends('layouts.app')
@section('content')
    <table class="table table-responsive table-bordered">
        <tr>
            <th>Name</th>
            <th>Dob</th>
            <th>Own</th>
            <th>Active</th>
            <th>Options</th>
        </tr>
        @each('animal.index.item', $animals, 'animal', 'raw|There are no items.')
    </table>
    {{$animals->links()}}
@stop