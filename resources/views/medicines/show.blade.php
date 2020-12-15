
@extends('layouts.app')
@section('title',$medicine->name)
@section('content')
<div class="tab-content rtableholder">
    <table class="table">
    <thead>
      <tr>
        <td colspan="2"><h3>{{$medicine->name}}</h3></td>
        @if (Auth::user())
          <div class="text-right">
            <a href="/medicines/{{$medicine->id}}/edit" type="submit" class="btn btn-success btn-md">Düzenle</a>
            <a data-toggle="modal" data-target=".status-modal" type="submit" class="btn btn-danger btn-md">Sil</a>
          </div>
        @endif
      </tr>
    </thead>
    
    <tbody>
      <tr>
        @foreach ($image as $i)
          <td><img src="{{asset('/storage/photo/'.$i->photo)}}" width="200px" height="200px" alt="photo">
            @auth
            <form action="/remove_image" method="post">
              @csrf
              <input type="hidden" name="i_id" value="{{ $i->id }}">
              <input type="hidden" name="medicine_id" value="{{ $medicine->id }}">
              <button type="submit" class="btn btn-danger btn-sm">X</button>
            </form>
            @endauth
          </td>
        @endforeach
    </tr>
      <tr>
        <td>İlaç ismi</td>
        <td>{{$medicine->name}}</td>
      </tr>
      <tr>
        <td>Etken Madde</td>
        <td>{{$medicine->active_ingredient}}</td>
      </tr>
      <tr>
        <td>Kısa açıklama</td>
        <td>{{$medicine->description}}</td>
      </tr>
      <tr>
        <td>Formülü</td>
        <td>{{$medicine->formula}}</td>
      </tr>
      <tr>
        <td>Fermakolojik Özellikleri</td>
        <td>{{$medicine->pharmacological}}</td>
      </tr>
      <tr>
        <td>Endikasyonları</td>
        <td>{{$medicine->indication}}</td>
      </tr>
      <tr>
        <td>Kontrendikasyonları</td>
        <td>{{$medicine->kontrendikasyon}}</td>
      </tr>
      <tr>
        <td>Uyarı</td>
        <td>{{$medicine->warning}}</td>
      </tr>
      <tr>
        <td>Yan etkileri</td>
        <td>{{$medicine->side_effects}}</td>
      </tr>
      <tr>
        <td>Kullanım Şekli ve Dozu</td>
        <td>{{$medicine->usage}}</td>
      </tr>
      <tr>
        <td>Extra Bilgiler</td>
        <td>{{$medicine->extra_information}}</td>
      </tr>
      <tr>
        <td>Barkod </td>
        <td>{{$medicine->barcode}}</td>
      </tr>
      <tr>
        <td>Üretici </td>
        <td>{{$company}}</td>
      </tr>
      
    </tbody></table>
  </div>
  <table class="table">
    <tbody><tr>
      <td><strong>Yasal Uyarı</strong></td>
      <td><strong>Yayınlanan bilgiler, ilaçların kendi üreticilerinin vermiş olduğu prospektüs bilgilerinden derlenmektedir. Doktorunuza danışmadan ilaç kullanmanız sakıncalıdır. Beklenmeyen bir etki görüldüğünde lütfen dokturunuza başvurunuz. İçerik sadece bilgilendirme amaçlıdır. Tavsiye yerine geçmez. Sitemiz bilgilerin doğruluğundan sorumlu değildir. Lütfen güncel bilgiler için almış olduğunuz ilacın prospektüsünü gözden geçiriniz.</strong></td>
    </tr>
  </tbody>
  </table>
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
                            <h4 class="font">İLACI SİLMEK İSTEDİĞİNİZE EMİN MİSİNİZ?</h4>
                            <div class="form-group text-center m-t-20">
                                <div>
                                    <a href="/medicines/status/{{ $medicine->id }}" class="btn btn-success btn-block btn-sm waves-effect waves-light" type="submit">EVET</a>
                                    <a href="/medicines" class="btn btn-info btn-block btn-sm waves-effect waves-light" type="submit" >HAYIR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection