
 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">REDAGUOTI</div>
               <div class="card-body">
                <form method="POST" action="{{route('mechanic.update',[$mechanic])}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control"  name="mechanic_name" value="{{old('mechanic_name',$mechanic->name)}}">
                        <small class="form-text text-muted">Mechanic'o vardas.</small>
                        <label>Surname</label>
                        <input type="text" class="form-control"  name="mechanic_surname" value="{{old('mechanic_surname',$mechanic->surname)}}">
                        <small class="form-text text-muted">Mechanic'o pavarde.</small>
                    </div>
                    {{-- Name: <input type="text" class="form-control"  name="mechanic_name" value="{{$mechanic->name}}">
                    Surname: <input type="text" class="form-control"  name="mechanic_surname" value="{{$mechanic->surname}}"> --}}
                    @csrf
                    <button type="submit" class="btn btn-primary">EDIT</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>


@endsection
