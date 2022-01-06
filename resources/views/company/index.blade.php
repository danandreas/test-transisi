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
            <a class="btn btn-outline-dark" href="/company/create"><span class="icon text">
                <i class="fas fa-plus"></i>
            </span>Data Baru</a>
    
        </div>
        <div class="table-responsive">
        <table class="table table-hover" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
                <th>Pilihan</th>
              </tr>
            </thead>
            <tbody>
                
                <?php $i=1; ?>
              
                @foreach($company as $key => $d)
                <tr>
                <th scope="row">{{ $key + $company->firstItem()}}</th>
                    <td>{{$d->nama}}</td>
                    <td>{{$d->email}}</td>
                    <td><img src="uploads/{{$d->logo}}" class="img-fluid" style="width: 50px; height: 50px;" alt="" srcset=""></td>
                    <td><a href="https://{{$d->website}}" class="text-reset">{{$d->website}}</a></td>
                    <td>
                        <a href="/company/{{$d->id}}/edit" class="btn btn-success" >Edit</a>
                        <form action="/company/{{$d->id}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin menghapus data ini?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" >Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        {{$company->links()}}
        </div>
    </div>
</div>





@endsection