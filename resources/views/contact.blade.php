@extends('layouts.app')

@section('content')
     <h1> Contact Page </h1>
     @if(count($people)>0)
        <ul>
            @foreach ($people as $person)
                <li>{{$person}}</li>
            @endforeach
        </ul>
     @endif


@endsection
        
