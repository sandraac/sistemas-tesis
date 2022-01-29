<tr>
    <td>{{$purchase->id}}</td>
    <td>
        {{\Carbon\Carbon::parse($purchase->purchase_date)->format('d M y h:i a')}}
    </td>
    <td>{{$purchase->total}}</td>
    <td>{{$purchase->status}}</td>
    <td style="width: 20%;">
        <a href="{{route('purchases.pdf', $purchase)}}" class="btn btn-outline-danger"
        title="Generar PDF"><i class="far fa-file-pdf"></i></a>
        <a href="" class="btn btn-outline-warning"
        title="Imprimir boleta"><i class="fas fa-print"></i></a>
        <a href="{{route('purchases.show', $purchase)}}" class="btn btn-outline-info"
        title="Ver detalles"><i class="far fa-eye"></i></a>
    </td>
</tr>