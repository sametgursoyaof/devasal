@extends('layouts.app')
@section('content')
    <div class="container">  
        <div class="row">
            <div class="col-1 col-sm-2"></div>
            <div class="col-10 col-sm-8">
                <div class="title text-center">
                    <h1>YENİ VERİ OLUŞTUR</h1>
                </div>
                <form action="/medicines" method="post">
                    @csrf
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Lütfen formu doğru bir şekilde doldurun.
                        </div>
                    @endif --}}
                    <div class="form-group">
                        <label for="name">İlaç Adı</label>
                        <input type="text" class="form-control" required id="name" name="name" value="{{ old('name') }}">
                        {{-- @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <label for="description">Kısa Açıklama</label>
                        <textarea class="form-control"  id="description" name="description">{{ old('description') }}</textarea>
                        {{-- @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <label for="formula">Formülü</label>
                        <input type="text" class="form-control" id="formula" name="formula" value="{{ old('formula') }}">
                    </div>
                    <div class="form-group">
                        <label for="pharmacological">Fermakolojik Özellikleri</label>
                        <input type="text" class="form-control" id="pharmacological" name="pharmacological" value="{{ old('pharmacological') }}">
                    </div>
                    <div class="form-group">
                        <label for="indication">Endikasyonları</label>
                        <input type="text" class="form-control" id="indication" name="indication" value="{{ old('indication') }}">
                        @error('indication')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kontrendikasyon">Kontrendikasyonları</label>
                        <input type="text" class="form-control" id="kontrendikasyon" name="kontrendikasyon" value="{{ old('kontrendikasyon') }}">
                    </div>
                    <div class="form-group">
                        <label for="warning">Uyarı</label>
                        <input type="text" class="form-control" id="warning" name="warning" value="{{ old('warning') }}">
                    </div>
                    <div class="form-group">
                        <label for="side_effects">Yan Etkileri</label>
                        <input type="text" class="form-control" id="side_effects" name="side_effects" value="{{ old('side_effects') }}">
                    </div>
                    <div class="form-group">
                        <label for="usage">Kullanım Şekli ve Dozu</label>
                        <input type="text" class="form-control" id="usage" name="usage" value="{{ old('usage') }}">
                    </div>
                    <div class="form-group">
                        <label for="extra_information">Extra Bilgiler</label>
                        <input type="text" class="form-control" id="extra_information" name="extra_information" value="{{ old('extra_information') }}">
                        {{-- @error('extra_information')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <label for="barcode">Barkod</label>
                        <input type="text" class="form-control" id="barcode" name="barcode" value="{{ old('barcode') }}">
                        {{-- @error('barcode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                    </div>
                    <label class="label" for="title">Üretici</label>
                    <div class="col-sm-12">
                        <select class="form-control" name=companies_id>
                            @foreach ($companies as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div><br>
                    {{-- <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}">
                    </div><br> --}}
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
                </div>
            </div>
            <div class="col-1 col-sm-2"></div>
        </div>
    </div>
@endsection

