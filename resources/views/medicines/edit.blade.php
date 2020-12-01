@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-1 col-sm-2"></div>
    <div class="col-10 col-sm-8">
        <div class="card card-pages m-t-40 shadow-none bg-transparent">
            <h1 class="title text-center">İlaç Düzenle</h1><hr>
            <form method="POST" action="/medicines/{{ $medicine->id }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Firma Adı</label>
                    <input type="text" class="form-control" required id="name" name="name" value="{{ $medicine->name }}">
                </div><br>
                <div class="form-group">
                    <label for="active_ingredient">Etken Madde</label>
                    <input type="text" class="form-control" id="active_ingredient" name="active_ingredient" value="{{ $medicine->active_ingredient }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="description">Kısa Açıklama</label>
                    <textarea class="form-control"  id="description" name="description">{{ $medicine->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="formula">Formülü</label>
                    <input type="text" class="form-control" id="formula" name="formula" value="{{ $medicine->formula }}">
                </div>
                <div class="form-group">
                    <label for="pharmacological">Fermakolojik Özellikleri</label>
                    <textarea type="text" class="form-control" id="pharmacological" name="pharmacological">{{ $medicine->pharmacological }}</textarea>
                </div>
                <div class="form-group">
                    <label for="indication">Endikasyonları</label>
                    <textarea type="text" class="form-control" id="indication" name="indication">{{ $medicine->indication }}</textarea>
                    @error('indication')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kontrendikasyon">Kontrendikasyonları</label>
                    <textarea type="text" class="form-control" id="kontrendikasyon" name="kontrendikasyon">{{ $medicine->kontrendikasyon }}</textarea>
                </div>
                <div class="form-group">
                    <label for="warning">Uyarı</label>
                    <textarea type="text" class="form-control" id="warning" name="warning">{{ $medicine->warning }}</textarea>
                </div>
                <div class="form-group">
                    <label for="side_effects">Yan Etkileri</label>
                    <textarea type="text" class="form-control" id="side_effects" name="side_effects">{{ $medicine->side_effects }}</textarea>
                </div>
                <div class="form-group">
                    <label for="usage">Kullanım Şekli ve Dozu</label>
                    <textarea type="text" class="form-control" id="usage" name="usage">{{ $medicine->usage }}</textarea>
                </div>
                <div class="form-group">
                    <label for="extra_information">Extra Bilgiler</label>
                    <textarea type="text" class="form-control" id="extra_information" name="extra_information">{{ $medicine->extra_information }}</textarea>
                </div>
                <div class="form-group">
                    <label for="barcode">Barkod</label>
                    <input type="text" class="form-control" id="barcode" name="barcode" value="{{ $medicine->barcode }}">
                </div>
                <label class="label" for="title">Üretici</label>
                <div class="col-sm-12">
                    <select class="form-control" name=companies_id>
                        @foreach ($company as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
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