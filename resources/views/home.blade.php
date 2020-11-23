@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="text-center">Devasal</h1><hr>
                <a href="/medicines" type="submit" class="btn btn-primary">Anasayfa'ya Git</a><br>
                <a href="/medicines/create" type="submit" class="btn btn-primary">İlaç Ekle</a><br>
                <a href="/companies" type="submit" class="btn btn-primary">Firmalar / Firma Ekle</a><br>
            </div>
        </div>
    </div>
</div>
@endsection
