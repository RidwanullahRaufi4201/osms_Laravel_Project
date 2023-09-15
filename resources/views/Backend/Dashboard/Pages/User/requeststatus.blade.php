@extends('Backend.Dashboard.Layout.master',['page'=>"requeststatus"])

@section('content')
          <div class="main-content">
             <div class="conainer">
               <div class="row justify-content-center">
                    @if(session()->has('requeststatus'))
    <div class="alert alert-success">
        {{ session()->get('requeststatus') }}
    </div>
@endif
                    <div class="col-md-10">
                             <div class="row">
                                  <div class="col-md-10">
                                                   <h4>Check Your Request Status </h4>
                                           <div class="row mt-3">
                                             <div class="col-md-5">
                                                   <form action="{{route("checkrequeststatus")}}" method="post">
                                                       @csrf
                                                       <div class="form-group">
                                                            <label for="">Request ID</label>
                                                            <input type="text" name="requestid" class="form-control">
                                                            @error('requestid')
                                                                <p class="text-danger">{{$message}}</p>
                                                            @enderror
                                                         </div>
                                                         <div class="form-group">
                                                            <button class="btn btn-sm btn-danger " type="submit">Search</button>
                                                         </div>
                                                   </form>
                                             </div>
                                           </div>
                                  </div>
                             </div>
                    </div>
               </div>
             </div>
          </div>
@endsection