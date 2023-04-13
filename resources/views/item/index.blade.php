@extends('master')
@section('content')
    <div class="row">
        {{-- table-start --}}
        <div class=" col-12 bg-secondary pb-5 ">
            <div class="container mt-3">
                <div class="text-center text-white">
                    <h3>All item</h3>
                </div>
                <div class="p-3">
                    <button type="submit" class="btn btn-warning btn-block" data-bs-toggle="modal"
                        data-bs-target="#modeladd">Add item <i class="fa-solid fa-plus"></i></button>
                </div>

                <table class="table table-bordered text-white">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Item Name</th>
                            <th>Model Name</th>
                            <th>Brand Name</th>
                            <th>Entry_Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{optional($item->branditem)->name}}</td>
                            <td>{{$item->brandmodel->name}}</td>
                            <td>{{$item->entry_date}}</td>
                            <td>
                                <a href="{{ url('itemedit/'.$item->id) }}" class="btn btn-info"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return confirm('are you want to delete?')" href="{{ route('itemdelete',$item->id) }}"
                                    class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{-- table-end --}}

        </div>
    </div>

    <!--insert-models-Modal -->
    <form name="itemfrom" action="" method="POST" onsubmit="return validateForm()">
        @csrf
        <div class="modal fade" id="modeladd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="barandname" class="form-label"><b>Brand<span class="text-danger">*</span></b></label>
                            <select class="form-select" name="brand_id" id="brand_id">
                                <option value="" selected>--Select Brand Name--</option>
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <p id="data" class="text-danger">Barand name must be required !!</p>
                        <div class="mb-2">
                            <label for="modeldname" class="form-label"><b>model<span class="text-danger">*</span></b></label>
                            <select class="form-select" name="model_id" id="model_id">
                                <option value="" selected>--Select model Name--</option>
                                @foreach ($models as $model)
                                <option value="{{$model->id}}">{{$model->name}}</option>
                                @endforeach
                            </select>
                            <p id="data-2" class="text-danger">Model name must be required !!</p>
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label"><b>Item Name<span class="text-danger">*</span></b></label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Brand Name"
                                name="name">
                            <p id="data-3" class="text-danger">Item name must be required !!</p>
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label"><b>Date-Time</b></label>
                            <input type="datetime-local" class="form-control" id="date" name="date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        function validateForm() {
            let x = document.forms["itemfrom"]["brand_id"].value;
            let y = document.forms["itemfrom"]["model_id"].value;
            let z = document.forms["itemfrom"]["name"].value;
            
            if (x == "") {
                $("#data").show();
                return false;
            }else if(y == ""){
                $("#data-2").show();
                return false;
            }else if(z == ""){
                $("#data-3").show();
                return false;
            }
        }

        $(document).ready(function() {
            $("#data").hide();
            $("#data-2").hide();
            $("#data-3").hide();
        });
    </script>
@endsection
