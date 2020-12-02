@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Museos</div>
                    <div class="card-body">
                        <a href="{{ url('/museos/create') }}" class="btn btn-success btn-sm" title="Add New museo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                        </a>

                        <form method="GET" action="{{ url('/museos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table  table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th><th>Foto</th><th>Nombre</th><th>Informacion</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($museos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src=" {{asset('storage').'/'.$item->foto }}" class="img-thumbnail img-fluid" alt="" width="150">
                                           </td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->informacion }}</td>
                                        <td>
                                            <a href="{{ url('/museos/' . $item->id . '/edit') }}" title="Edit museo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/museos' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete museo" onclick="return confirm(&quot;¿Seguro que desea elminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $museos->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
