@extends('layouts.main')




@section('content')



<div class="container"> 
  <h1>{{ $wonder->Name }}</h1> 
  <div class="wonder-image"> 
    <img src="{{ asset('images/' . $wonder->image) }}" alt="{{ $wonder->Name }}"> 
  </div> 

  <div class="wonder-details"> 
    <p><strong>Location:</strong> {{$wonder->Location }}</p> 
    <p><strong>YearBuilt:</strong> {{ $wonder->YearBuilt }}</p>
    <p><strong>HeightInMeters:</strong> {{ $wonder->HeightInMeters }}</p>
    <strong>Description:</strong> 
    <p>{!! $wonder->Description !!}</p>
  </div> 

</div>



@endsection