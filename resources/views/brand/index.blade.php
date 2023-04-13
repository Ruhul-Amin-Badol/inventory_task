@extends('master')
@section('content')
    <div class="row">
        {{-- table-start --}}
        <div class=" col-12 bg-secondary pb-5 ">
            <div class="container mt-3">
                <div class="text-center text-white">
                    <h3>All Brand</h3>
                </div>
                <div class="p-3">
                    <button type="submit" class="btn btn-warning btn-block" data-bs-toggle="modal"
                        data-bs-target="#brandadd">Add Brand <i class="fa-solid fa-plus"></i></button>
                </div>

                <table class="table table-bordered text-white">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Entry_Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bran as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->entry_date }}</td>
                                <td>
                                    <a href="{{ url('edit/' . $item->id) }}" class="btn btn-info"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a onclick="return confirm('are you want to delete?')"
                                        href="{{ url('brand/' . $item->id) }}" class="btn btn-danger"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{-- table-end --}}

        </div>
    </div>
    <!--insert-brand-Modal -->
    <form name="brandfrom" action="" method="POST" onsubmit="return validateForm()">
        @csrf
        <div class="modal fade" id="brandadd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Brand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-2">
                            <label for="name" class="form-label"><b>Name <span class="text-danger">*</span> </b></label>
                            <input type="name" class="form-control" id="name" placeholder="Enter Brand Name"
                                name="name">
                            <p id="req" class="text-danger">name must be required</p>
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label"><b>date</b></label>
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
            let x = document.forms["brandfrom"]["name"].value;
            if (x == "") {
                $("#req").show();
                return false;
            }
        }

        $(document).ready(function() {
            $("#req").hide();
        });
    </script>
@endsection
