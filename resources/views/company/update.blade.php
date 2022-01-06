@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card p-3 m-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/company/{{$company->id}}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$company->nama}}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{$company->email}}" >
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" name="website" class="form-control @error('email') is-invalid @enderror" value="{{$company->website}}">
                    @error('website')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control-file" type="file" name="logo">
                
                    @error('logo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-dark">Sunting</button>
            </form>
        </div>
    </div>
</div>
</div>


@endsection