@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">
                Pedidos
            </h2>

            <a class="btn btn-default btn-lg btn-block" href="{{url('invoices/create')}}">Crear Pedido</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th style="width:160px;" class="text-right">Sub Total</th>
                        <th style="width:150px;" class="text-right">ITBIS</th>
                        <th style="width:160px;" class="text-right">Total</th>
                        <th style="width:180px;" class="text-right">Creado</th>
                        <th style="..."></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($model as $m)
                    <tr>
                        <td>
                            <a href="{{ url('invoices/detail/'.$m->id) }}">
                                {{ $m->client->name }}
                            </a>
                        </td>
						 <td class="text-right">Bs.S {{ number_format($m->subTotal, 2, ",", ".") }}</td>
                        <td class="text-right">Bs.S {{ number_format($m->iva, 2, ",", ".") }}</td>                       
                        <td class="text-right">Bs.S {{ number_format($m->total, 2, ",", ".") }}</td>
                        <td class="text-right">{{ $m->created_at->format('d-m-Y h:i A') }}</td>
                        <td>
                            <a class="btn btn-success btn-block btn-xs" href="{{ url('invoices/pdf/'.$m->id) }}">
                                <i class="fa fa-file-pdf-o"></i> Descargar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
