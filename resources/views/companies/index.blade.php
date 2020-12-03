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
                            {{-- @foreach ($companies as $c) --}}
                            @for ($i = 0; $i < count($companies); $i++)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$companies[$i]->name}}</td> 
                                    <td><a href="/companies/{{$companies[$i]->id}}/edit" type="submit" class="btn btn-success btn-sm">Düzenle</a></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div><br>
                <a href="companies/create" type="submit" class="btn btn-primary">Yeni Firma Ekle</a>
            </div>
            <div class="col-1 col-sm-2"></div>
        </div>
    </div>
@endsection