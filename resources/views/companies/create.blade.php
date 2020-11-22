@extends('layouts.app')
@section('content')
    <div class="container">  
        <div class="row">
            <div class="col-1 col-sm-2"></div>
            <div class="col-10 col-sm-8">
                <div class="title text-center">
                    <h1>YENİ FİRMA EKLE</h1>
                </div>
                <form action="/companies" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Firma Adı</label>
                        <input type="text" class="form-control" required id="name" name="name" value="{{ old('name') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
                </div>
            </div>
            <div class="col-1 col-sm-2"></div>
        </div>
    </div>
@endsection