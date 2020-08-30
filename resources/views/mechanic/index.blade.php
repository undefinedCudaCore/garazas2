{{-- 1 variantas --}}
{{-- @foreach ($mechanics as $mechanic)
  {{$mechanic->name}} {{$mechanic->surname}}<br>
@endforeach --}}

{{-- 1 variantas --}}
{{-- @foreach ($mechanics as $mechanic)
  <a href="{{route('mechanic.edit',[$mechanic])}}">{{$mechanic->name}} {{$mechanic->surname}}</a><br>
@endforeach --}}

{{-- Galutinis variantas --}}

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">🧑‍🔧 INFO</div>

               <div class="card-body">
                @foreach ($mechanics as $mechanic)
                <a style="font-size: 30px;" href="{{route('mechanic.edit',[$mechanic])}}">{{$mechanic->name}} {{$mechanic->surname}}</a>
                <form method="POST" action="{{route('mechanic.destroy', [$mechanic])}}">
                 @csrf
                 <button type="submit" class="btn btn-primary">DELETE</button>
                </form>
              <img src="{{asset('images/'.$mechanic->portret)}}" style="width: 250px; height: auto;" alt="">
                <br>
              <a href="{{route('mechanic.show', [$mechanic])}}">Parodyti ar saunuote</a><br><br>
              @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
