@extends('master')
@section('content')
    <form action="" method="POST">
        @csrf
        @method('PATCH')
        <div class="container-fluid p-4">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="card p-2 bg-light">
                        <div class="mb-2">
                            <h4>Edit Model</h4>
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label"><b>Name</b></label>
                            <input type="name" class="form-control" value="{{ $bran->name }}" name="name">
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
@endsection