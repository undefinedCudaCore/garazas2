
 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">SUKURTI</div>

               <div class="card-body">
                <form method="POST" action="{{route('mechanic.store')}}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="mechanic_name" value="{{old('mechanic_name')}}">
                        <small class="form-text text-muted">Mechanic'o vardas.</small>
                        <label>Surname</label>
                        <input type="text" class="form-control" name="mechanic_surname" value="{{old('mechanic_surname')}}">
                        <label>Image</label>
                        <input type="file" class="form-control" name="mechanic_portret">
                        <small class="form-text text-muted">Mechanic'o pavarde.</small>
                    </div>
                    {{-- Name: <input type="text" class="form-control" name="mechanic_name">
                    Surname: <input type="text" class="form-control" name="mechanic_surname"> --}}
                    @csrf
                    <button type="submit" class="btn btn-primary">ADD</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>

@endsection
