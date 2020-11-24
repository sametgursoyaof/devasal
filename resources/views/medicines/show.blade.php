
@extends('layouts.app')
@section('content')
<div class="tab-content rtableholder">
    <table class="table">
    <thead>
      <tr>
        <td colspan="2"><h3>{{$medicines->name}}</h3></td>
      </tr>
    </thead>
    
    <tbody>
      <tr>
        <td>İlaç ismi</td>
        <td>{{$medicines->name}}</td>
      </tr>
      <tr>
        <td>Kısa açıklama</td>
        <td>{{$medicines->description}}</td>
      </tr>
      <tr>
        <td>Formülü</td>
        <td>{{$medicines->formula}}</td>
      </tr>
      <tr>
        <td>Fermakolojik Özellikleri</td>
        <td>{{$medicines->pharmacological}}</td>
      </tr>
      <tr>
        <td>Endikasyonları</td>
        <td>{{$medicines->indication}}</td>
      </tr>
      <tr>
        <td>Kontrendikasyonları</td>
        <td>{{$medicines->kontrendikasyon}}</td>
      </tr>
      <tr>
        <td>Uyarı</td>
        <td>{{$medicines->warning}}</td>
      </tr>
      <tr>
        <td>Yan etkileri</td>
        <td>{{$medicines->side_effects}}</td>
      </tr>
      <tr>
        <td>Kullanım Şekli ve Dozu</td>
        <td>{{$medicines->usage}}</td>
      </tr>
      <tr>
        <td>Extra Bilgiler</td>
        <td>{{$medicines->extra_information}}</td>
      </tr>
      <tr>
        <td>Barkod </td>
        <td>{{$medicines->barcode}}</td>
      </tr>
      <tr>
        <td>Üretici </td>
        @foreach ($company as $c)
          <td>{{$c->name}}</td>
        @endforeach
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
@endsection