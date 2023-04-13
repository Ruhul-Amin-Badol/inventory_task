@extends('master')
@section('content')
    <form action="" method="POST" name="brandedit" onsubmit="return validateForm()">
        @csrf
        @method('PATCH')
        <div class="container-fluid p-4">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="card p-2 bg-light">
                        <div class="mb-2">
                            <h4>Edit Brand</h4>
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label"><b>Name<span class="text-danger">*</span></b></label>
                            <input type="name" class="form-control" value="{{ $bran->name }}" name="name">
                            <p id="req" class="text-danger">Brand name must be required</p>
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label"><b>date</b></label>
                            <input type="datetime-local" class="form-control" value="{{ $bran->entry_date }}" id="date"
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
    <script>
        function validateForm() {
            let x = document.forms["brandedit"]["name"].value;
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
