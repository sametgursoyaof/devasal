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
                        <a data-toggle="modal" data-target=".status-modal" type="submit" class="btn btn-danger btn-block  waves-effect waves-light">Sil</a>
                    </div>
                </div>
            </form><br>

        </div>
    </div>
<div class="col-1 col-sm-2"></div>
{{-- status-modal --}}
<div class="col-1 col-sm-2"></div>
<div class="modal fade status-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">UYARI MESAJI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="media m-b-30">
                <div class="media-body align-self-center">
                    <h4 class="font-14 m-0">FİRMAYI SİLMEK İSTEDİĞİNİZE EMİN MİSİNİZ?</h4>
                    <div class="form-group text-center m-t-20">
                        <div>
                            <a href="/companies/status/{{$companies->id}}" class="btn btn-success btn-block btn-sm waves-effect waves-light" type="submit">EVET</a>
                            <a href="/companies/{{$companies->id}}/edit" class="btn btn-info btn-block btn-sm waves-effect waves-light" type="submit" >HAYIR</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
@endsection