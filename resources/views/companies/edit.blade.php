@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-1 col-sm-2"></div>
    <div class="col-10 col-sm-8">
        <div class="card card-pages m-t-40 shadow-none bg-transparent">
            <h1 class="title text-center">Firma Düzenle</h1><hr>
            <form method="POST" action="/companies/{{ $companies->id }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Firma Adı</label>
                    <input type="text" class="form-control" required id="name" name="name" value="{{ $companies->name }}">
                </div>
                <br>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="btn btn-success btn-block  waves-effect waves-light" >Kaydet</button>
                    </div>
                </div>
            </form><br>

        </div>
    </div>
<div class="col-1 col-sm-2"></div>
</div>
@endsection