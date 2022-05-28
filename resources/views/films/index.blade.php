@extends('layouts.main')
 @section('title', 'Films')

 @section('content')

 @if(session()->has('berhasil'))
   <div class="alert alert-success">
    {{ session()->get('berhasil') }}      
 @endif 
</div> 
<div class="card bg-navbar container">
    <nav class="nav">
        @auth
        <div class="dropdown">
            <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
              Wellcomeback, {{ auth()->user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-white" aria-labelledby="dropdownMenuButton2">
              <li>
                <form action="/logout" method="post">
                    @csrf
                <button type="submit" class="dropdown-item">Logout</button>  
                </form>
              </li>
            </ul>
          </div>
          @else
      <a class="nav-link" aria-current="page" href="/login">Login</a>
      @endauth
    </div>
    </nav>
     <div class="container mt-5">
         <div class="card">
          <div class="card-header">
              <h1>Data film</h1>
          </div>
        <div class="card-body">
       <div class="form-group">
           <a href="{{ route('films.create') }}" class="btn btn-success">Tambah</a>
       </div>
       <table class="table table-striped table-hover">
           <thead>
               <tr>
                   <th>#</th>
                   <th>Judul</th>
                   <th>author</th>
                   <th>Studio</th>
                   <th>Rating</th>
                   <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               @php
                   $increment=1;
               @endphp
               @foreach ($films as $item)
               <tr>
                   <td>{{ $increment++ }}</td>
                   <td>{{ $item->judul }}</td>
                   <td>{{ $item->author }}</td>
                   <td>{{ $item->studio }}</td>
                   <td>{{ $item->rating }}</td>
                   <td>
                       <a href="{{ route('films.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('films.destroy', $item->id) }}" method="post">
                     @csrf
                     @method('delete')
                     <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger mt-1">Hapus</button>
                    </form>
                   </td>

               </tr>
               @endforeach
           </tbody>
       </table>
       </div>
    </div>
     </div>
 @endsection