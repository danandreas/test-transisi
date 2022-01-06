@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif
</div>

<div class="container">
    <div class="card p-3 m-2">
        <div class="d-flex justify-content-lg-end mb-3">
            <a class="btn btn-outline-dark" href="/employee/create"><span class="icon text">
                <i class="fas fa-plus"></i>
            </span>Tambah Baru</a>
    
        </div>
        <div class="table-responsive">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Company</th>
                <th scope="col">Pilihan</th>
              </tr>
            </thead>
            <tbody>
            
                @foreach($employee as $key => $item)
                <tr>
                <th scope="row">{{ $key + $employee->firstItem()}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->company->nama}}</td>
                    <td>
                        <a href="/employee/{{$item->id}}/edit" class="btn btn-success" >Edit</a>
                        <form action="/employee/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin menghapus data ini?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" >Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        {{$employee->links()}}
        </div>
    </div>
</div>
@endsection