<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="position-ref full-height ">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Admin Anasayfa</a>
                    @endauth
                </div>
            @endif 

            <div class="content">
                <div class="title m-b-md">
                    Harfe Göre İlaçlar
                </div>
                <form method="POST" action="/search">
                    @csrf
                    <input type="search" placeholder="İlaç Ara" name="query">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Ara</button>
                </form><br>
                <div>
                    @foreach ($harfler as $h)
                        @if ($h=='#')
                            <a href="/?h=1">{{$h}}</a>&nbsp;
                        @else
                            <a href="/?h={{$h}}">{{$h}}</a>&nbsp;
                        @endif
                    @endforeach
                </div>
            </div><hr>
            <div class="links">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">
                                @if ($value1=='Anasayfa'|| $value1==null)
                                    Sitemize Son Eklenen İlaçlar
                                @elseif($value1=='1')
                                    # İlaçlar
                                @else
                                    {{$value1}} Harfi İle Başlayan İlaçlar
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th>İlaç No</th>
                            <th>İlaç İsmi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicines as $m)
                        <tr>
                            <td>{{$sayac}}</td>
                            <td>
                                <a href="{{ $m->slug }}">{{ $m->name }}</a><br>
                                <input type="hidden"{{$sayac=$sayac+1}}>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>