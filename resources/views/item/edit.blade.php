@extends('master')
@section('content')
    <form action="{{route('items.update',$item->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="container-fluid p-4">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="card p-2 bg-light">
                        <div class="mb-2">
                            <h4>Edit item</h4>
                        </div>
                        <div class="mb-2">
                            <label for="barandname" class="form-label"><b>Brand</b></label>
                            <select class="form-select" name="brand_id" id="brand_id">
                                <option selected>--Select Brand Name--</option>
                                @foreach ($brands as $brand)
                                <option 
                                @if ($item->brand_id==$brand->id)
                                selected
                                @endif
                                value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="modelname" class="form-label"><b>model</b></label>
                            <select class="form-select" name="brand_id" id="brand_id">
                                <option selected>--Select model Name--</option>
                                @foreach ($models as $model)
                                <option 
                                @if ($item->model_id==$model->id)
                                selected
                                @endif
                               
                                value="{{$model->id}}">{{$model->name}}</option>
                                
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label"><b>Name</b></label>
                            <input type="name" class="form-control" value="{{ $item->name }}" name="name">
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label"><b>date</b></label>
                            <input type="datetime-local" class="form-control" value="{{ $item->entry_date }}" id="date"
                                name="date">
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection