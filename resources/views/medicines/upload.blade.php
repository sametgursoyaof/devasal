@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-1 col-sm-2"></div>
    <div class="col-10 col-sm-8">
        <div class="card card-pages m-t-40 shadow-none bg-transparent">
            <h1 class="title text-center">İlaç Resmi Ekle</h1><hr>
            <form method="POST" action="{{route('addimage')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $medicine->id }}" name="medicine_id">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input">
                        <label class="custom-file-label">Resim Seç</label>
                    </div>
                </div><br>
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