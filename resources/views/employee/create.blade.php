@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3 m-2">
            <form action="/employee" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  id="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <select name="company_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Company...</option>
                        @foreach ($company as $option)
                            <option value="{{$option->id}}">{{$option->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-dark">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection