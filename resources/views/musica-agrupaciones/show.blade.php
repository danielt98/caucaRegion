@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">musicaAgrupacione {{ $musicaagrupacione->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/musica-agrupaciones') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/musica-agrupaciones/' . $musicaagrupacione->id . '/edit') }}" title="Edit musicaAgrupacione"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('musicaagrupaciones' . '/' . $musicaagrupacione->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete musicaAgrupacione" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $musicaagrupacione->id }}</td>
                                    </tr>
                                    <tr><th> Foto </th><td> {{ $musicaagrupacione->foto }} </td></tr><tr><th> Nombre </th><td> {{ $musicaagrupacione->nombre }} </td></tr><tr><th> Informacion </th><td> {{ $musicaagrupacione->informacion }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
