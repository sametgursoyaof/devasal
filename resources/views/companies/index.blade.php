@extends('layouts.app')
@section('content')
    <div class="container">  
        <div class="row">
            <div class="col-1 col-sm-2"></div>
            <div class="col-10 col-sm-8">
                <div class="title text-center">
                    <h1>FİRMALAR</h1>
                </div><br>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            @foreach ($companies as $c)
                                <tr>
                                    <td>{{$c->id}}</td>
                                    <td>{{$c->name}}</td> 
                                    <td><a href="/companies/{{$c->id}}/edit" type="submit" class="btn btn-success btn-sm">Düzenle</a>
                                    <a data-toggle="modal" data-target=".status-modal" type="submit" class="btn btn-danger btn-sm">Sil</a></td>
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
                                                                <a href="/companies/status/{{ $c->id }}" class="btn btn-success btn-block btn-sm waves-effect waves-light" type="submit">EVET</a>
                                                                <a href="/companies" class="btn btn-info btn-block btn-sm waves-effect waves-light" type="submit" >HAYIR</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><br>
                <a href="companies/create" type="submit" class="btn btn-primary">Yeni Firma Ekle</a>
            </div>
            <div class="col-1 col-sm-2"></div>
        </div>
    </div>
@endsection