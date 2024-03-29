@extends('admin.layout')
@section('main')
@section('coupon_active','active')
@section('page_title','Manage Coupons')
    <h1 class="mb10">Manage Coupons</h1>
    <a href="{{ url('admin/coupon') }}"> <button type="button" class="btn btn-success">Back</button> </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('manage_coupon_process') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                            <label for="Title" class="control-label mb-1">Title</label>
                            <input id="title_name" name="title" value="{{$title}}" type="text" class="form-control"
                                 >
                            @error('title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="code" class="control-label mb-1">Code</label>
                            <input id="Code" name="code" value="{{$code}}" type="text" class="form-control"
                                 >
                                @error('code')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                            <label for="Value" class="control-label mb-1">Value</label>
                            <input id="Value" name="value" value="{{$value}}" type="text" class="form-control"
                                 >
                                @error('value')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="type" class="control-label mb-1">Type</label>
                            <select id="type" name="type" value="{{$type}}" class="form-control">
                                @if ($type=="value")
                                <option value="value" selected>Value</option>
                                <option value="per">Percentage</option>
                         @elseif ($type=="value")
                                <option value="value">Value</option>
                                <option value="per" selected>Percentage</option>
                            @else
                                <option value="value">Value</option>
                                <option value="per" >Percentage</option>
                         @endif
                            </select>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                    <label for="min_order_amt" class="control-label mb-1">Min order amt</label>
                    <input id="min_order_amt" name="min_order_amt" value="{{$min_order_amt}}" type="text" class="form-control">
                        @error('min_order_amt')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="is_one_time" class="control-label mb-1">Is one time</label>
                    <select id="is_one_time" name="is_one_time" value="{{$is_one_time}}" class="form-control">
                        @if ($is_one_time=="1")
                        <option value="1" selected>Yes</option>
                             <option value="0">No</option>
                                 @else
                                <option value="1">Yes</option>
                                  <option value="0" selected>No</option>
                        @endif
                    </select>

                </div>
            </div>
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



