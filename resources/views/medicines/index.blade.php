<!DOCTYPE html>
<html lang="tr">
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
            .links {
                line-height: 42px;
                }
            .links > a {
                color: #636b6f;
                padding: 8px 16px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                border: 1px solid #636b6f;
            }
            .links > .admin {
                text-transform: uppercase;
                border: none;
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
                        <a href="{{ url('/home') }}" class="admin">Admin Anasayfa</a>
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
                <div class="links">
                    <a class="link" href="/">Anasayfa</a>
                    <a class="link" href="/ilaclar/1">#</a>
                    @foreach ($harfler as $h)
                            <a class="link" href="/ilaclar/{{$h}}">{{$h}}</a>
                    @endforeach
                </div>
                <div style="padding-top:10px;padding-bottom:10px;font-size: 20px;">
                    <label for="title">Firmaya Göre Filtrele:</label>
                    <select style="font-size: 18px;" id="mySelect" name="mySelect" onchange="myFunction(this)"aria-controls="datatable" class="form-control form-control-sm">
                        <option {{$firma == null  ? "selected" : ""}}>Seçiniz</option>
                        @foreach ($companies as $c)
                            <option value="{{$c->id}}"{{$firma == "$c->id"  ? "selected" : ""}}>{{$c->name}}</option>
                        @endforeach
                    </select>
                    <script>
                        function myFunction(m) {
                        window.location ='/'+ '?firma=' + m.value;
                        }
                        </script>
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
                            @auth
                                <th>Resim Ekle</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($medicines); $i++)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>
                                <a href="/{{ $medicines[$i]->slug  }}">{{ $medicines[$i]->name }}</a><br>
                            </td>
                            @auth
                                <td>
                                    <a href="medicines/{{ $medicines[$i]->id }}/upload">+</a>
                                </td>
                            @endauth
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>