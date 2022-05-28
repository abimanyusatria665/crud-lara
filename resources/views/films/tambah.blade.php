@extends('layouts.main')
 @section('title', 'Tambah Film')

 @section('content')
     <div class="container mt-5">
           <div class="card">
               <div class="card-header">
                   <h1>Tambah data film</h1>
               </div>
               <div class="card-body">
              <form action="{{ route('films.store') }}" method="post">
                @csrf

                <div class="form-group mb3">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul"class="form-control" value="{{ old('judul') }}" required>
                </div>
                <div class="form-group mb3">
                    <label for="author">Author</label>
                    <input type="text" name="author"class="form-control" value="{{ old('author') }}" required>
                </div>
                <div class="form-group mb3">
                    <label for="studio">Studio</label>
                    <input type="text" name="studio"class="form-control" value="{{ old('studio') }}" required>
                </div>
                <div class="form-group mb3">
                    <label for="rating">Rating</label>
                    <input type="text" name="rating"class="form-control" value="{{ old('rating') }}" required>
                </div>
                <div class="form-group d-flex justify-content-beetwen mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('films.index') }}" class=" mx-3 btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
            </div>
     </div>
 @endsection