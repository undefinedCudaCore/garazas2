{{-- @foreach ($trucks as $truck)
  <a href="{{route('truck.edit',[$truck])}}">{{$truck->maker}}</a>
    <form method="POST" action="{{route('truck.destroy', [$truck])}}">
        @csrf
        <button type="submit">DELETE</button>
    </form>
    <br>
@endforeach --}}



@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">🚚 Info
                    <form action="{{route('truck.index')}}" method="get">
                        <select name="mechanic_id">
                            <option value="0">Show all</option>
                            @foreach ($mechanics as $mechanic)
                                <option value="{{$mechanic->id}}" @if ($selectId == $mechanic->id) selected @endif>{{$mechanic->name}} {{$mechanic->surname}}</option>
                            @endforeach
                        </select><br>
                        Sort by:<br>
                        Maker: <input type="radio" name="sort" value="maker" @if ('maker' == $sort) checked @endif><br>
                        Plate: <input type="radio" name="sort" value="plate" @if ('plate' == $sort) checked @endif><br>
                        <button type="submit">Filter</button>
                        <a href="{{route('truck.index')}}">Reset</a>
                    </form>
               </div>

               <div class="card-body">
                @foreach ($trucks as $truck)
                    <a style="font-size: 30px;" href="{{route('truck.edit',[$truck])}}"><span class="d-block p-2 bg-light text-dark" style="font-size: 20px;">Automobilis: </span>{{$truck->maker}}<span>, </span><span class="d-block p-2 bg-light text-dark" style="font-size: 20px;">Mechanikas: </span> {{$truck->truckMechanic->name}} {{$truck->truckMechanic->surname}}</a>
                    <form method="POST" action="{{route('truck.destroy', [$truck])}}">
                        @csrf
                        <button type="submit" class="btn btn-primary">DELETE</button>
                    </form>
                <br>
              @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
