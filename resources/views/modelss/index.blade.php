@extends('master')
@section('content')
    <div class="row">
        {{-- table-start --}}
        <div class=" col-12 bg-secondary pb-5 ">
            <div class="container mt-3">
                <div class="text-center text-white">
                    <h3>All Model</h3>
                </div>
                <div class="p-3">
                    <button type="submit" class="btn btn-warning btn-block" data-bs-toggle="modal"
                        data-bs-target="#modeladd">Add Model <i class="fa-solid fa-plus"></i></button>
                </div>

                <table class="table table-bordered text-white">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Model Name</th>
                            <th>Brand Name</th>
                            <th>Entry_Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mod as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->brand->name}}</td>
                            <td>{{$item->entry_date}}</td>
                            <td>
                                <a href="{{ url('modeledit/'.$item->id) }}" class="btn btn-info"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return confirm('are you want to delete?')" href="{{ url('modeldelete/'.$item->id) }}"
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
    <form name="modelfrom" action="" method="POST" onsubmit="return validateForm()">
        @csrf
        <div class="modal fade" id="modeladd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Model</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="barandname" class="form-label"><b>Brand <span class="text-danger">*</span> </b></label>
                            <select class="form-select" name="brand_id" id="brand_id">
                                <option value="" selected>--Select Brand Name--</option>
                                @foreach ($bran as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <p id="req" class="text-danger">Barand name must be required</p>
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label"><b> Model Name <span class="text-danger">*</span> </b></label>
                            <input type="name" class="form-control" id="name" placeholder="Enter model Name"
                                name="name">
                            <p id="req-1" class="text-danger">Model name must be required</p>
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
            let x = document.forms["modelfrom"]["name"].value;
            let y = document.forms["modelfrom"]["brand_id"].value;
            console.log(x);
            console.log(y);
            if (x == "") {
                $("#req-1").show();
                return false;
            }else if(y == ""){
                $("#req").show();
                return false;
            }
        }

        $(document).ready(function() {
            $("#req").hide();
        });
        $(document).ready(function() {
            $("#req-1").hide();
        });
    </script>
@endsection
