
 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Sukurti</div>

               <div class="card-body">
                <form method="POST" action="{{route('truck.store')}}">
                    <div class="form-group">
                        <label>Maker</label>
                        <input type="text" class="form-control" name="truck_maker" value="{{old('truck_maker')}}">
                        <small class="form-text text-muted">Truck'o pavadinimas.</small>
                        <label>Plate</label>
                        <input type="text" class="form-control" name="truck_plate" value="{{old('truck_plate')}}">
                        <small class="form-text text-muted">Plate'o pavadinimas.</small>
                        <label>Year</label>
                        {{-- <input type="text" class="form-control" name="truck_make_year" value="{{old('truck_make_year')}}"> --}}
                        <input type="text" name="truck_make_year" class="form-control" type="date" placeholder="yyyy-mm-dd" value="{{ date('Y/m/d') }}">
                        <small class="form-text text-muted">Year'o pavadinimas.</small>
                        <label>Notices</label>
                        <textarea class="form-control" name="truck_mechanic_notices" value="{{old('truck_mechanic_notices')}}" id="summernote"></textarea>
                        <small class="form-text text-muted">Notices'o pavadinimas.</small>
                    </div>
                    {{-- Maker: <input type="text" class="form-control" name="truck_maker">
                    Plate: <input type="text" class="form-control" name="truck_plate">
                    Year: <input type="text" class="form-control" name="truck_make_year">
                    Notices: <textarea class="form-control" name="truck_mechanic_notices"></textarea> --}}
                    <select name="mechanic_id">
                        @foreach ($mechanics as $mechanic)
                            <option value="{{$mechanic->id}}">{{$mechanic->name}} {{$mechanic->surname}}</option>
                        @endforeach
                    </select>
                    @csrf
                    <button type="submit" class="btn btn-primary">ADD</button>
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
