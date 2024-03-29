@extends('admin.layout')
@section('main')
@section('color_active','active')
@section('page_title','Manage Color')
    <h1 class="mb10">Manage Color</h1>
    <a href="{{ url('admin/color') }}"> <button type="button" class="btn btn-success">Back</button> </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('manage_color_process') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="color" class="control-label mb-1">Color</label>
                            <input id="color" name="color" value="{{$color}}" type="text" class="form-control"
                                 >
                            @error('color')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                           <div>
                            <button id="button" type="submit" class="btn btn-lg btn-info btn-block">
                                Submit
                            </button>
                        </div>
                        <input type="hidden" name="id" value="{{$id}}">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
