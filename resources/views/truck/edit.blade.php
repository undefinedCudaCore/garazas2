
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Redaguoti</div>

               <div class="card-body">
                <form method="POST" action="{{route('truck.update',[$truck])}}">
                    <div class="form-group">
                        <label>Maker</label>
                        <input type="text" name="truck_maker" class="form-control" value="{{old('truck_maker', $truck->maker)}}">
                        <small class="form-text text-muted">Truck'o pavadinimas.</small>
                        <label>Plate</label>
                        <input type="text" name="truck_plate" class="form-control" value="{{old('truck_plate', $truck->plate)}}">
                        <small class="form-text text-muted">Plate'o pavadinimas.</small>
                        <label>Year</label>
                        {{-- <input type="text" name="truck_make_year" class="form-control" value="{{old('truck_make_year', $truck->make_year)}}"> --}}
                        <input type="text" name="truck_make_year" class="form-control" type="date" placeholder="yyyy-mm-dd" value="{{ date('Y/m/d') }}">
                        <small class="form-text text-muted">Year'o pavadinimas.</small>
                        <label>Notices</label>
                        {{-- <input type="text" name="truck_mechanic_notices" class="form-control" value="{{$truck->mechanic_notices}}"> --}}
                        <textarea name="truck_mechanic_notices" class="form-control" id="summernote">{{old('truck_mechanic_notices', $truck->mechanic_notices)}}"</textarea>
                        <small class="form-text text-muted">Notices'o pavadinimas.</small>
                    </div>
                    {{-- Maker: <input type="text" name="truck_maker" class="form-control" value="{{$truck->maker}}"> --}}
                    {{-- Plate: <input type="text" name="truck_plate" value="{{$truck->plate}}"> --}}
                    {{-- Year: <input type="text" name="truck_make_year" value="{{$truck->make_year}}"> --}}
                    {{-- Notices: <textarea name="truck_mechanic_notices">{{$truck->mechanic_notices}}"</textarea> --}}
                    <select name="mechanic_id">
                        @foreach ($mechanics as $mechanic)
                            <option value="{{$mechanic->id}}" @if($mechanic->id == $truck->mechanic_id) selected @endif>
                                {{$mechanic->name}} {{$mechanic->surname}}
                            </option>
                        @endforeach
                    </select>
                    @csrf
                    <button type="submit" class="btn btn-primary">EDIT</button>
                </form>
               </div>
           </div>
       </div>
   </div>
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endsection
