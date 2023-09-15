@extends('Backend.Dashboard.Layout.master')


@section('content')
    <div class="main-content">
                 

            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                                            @if (session()->has("reviewusubmit"))
                                                   <p class="text-center text-success">{{session()->get("reviewusubmit")}}</p>
                                            @endif
                             <form action={{route("submitReivew")}} method="post">
                                @csrf
                                  <div class="form-group">
                                    <label for="">Review</label>
                                    <textarea name="review" class="form-control"></textarea>
                                    @error('review')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="">Technician</label>
                                    <select name="technicain_id" id="" class="form-control">
                                        <option value="">Select Technician</option>
                                        @foreach ($technician as $tech)
                                           <option value={{$tech->id}}>{{$tech->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('technicain_id')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                           <input type="submit" value="submit" class="btn btn-sm btn-danger">
                                  </div>
                             </form>
                    </div>
                </div>
            </div>
    </div>
@endsection