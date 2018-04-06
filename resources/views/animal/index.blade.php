@extends('layouts.app')
@section('content')
    @if(count($animals) == 0)
        {{__('There are no animals.')}}
    @else
    <table class="table table-responsive table-bordered">
        <tr>
            <th>{{__('Name')}}</th>
            <th>{{__('Dob')}}</th>
            <th>{{__('Own')}}</th>
            <th>{{__('Active')}}</th>
            <th>{{__('Options')}}</th>
        </tr>
        @each('animal.index.item', $animals, 'animal')
    </table>
    {{$animals->links()}}
    @endif
@stop