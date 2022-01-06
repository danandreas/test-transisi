@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3 m-2">
            <form action="/employee/{{$employee->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  id="name" value="{{$employee->name}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <select name="company" class="select2 custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option value="">Pilih</option>
                        @foreach ($company as $option)
                            <option value="{{$option->id}}" {{ $option->id == $employee->company_id ? 'selected' : ''}}>{{$option->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-dark">Sunting</button>
            </form>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection