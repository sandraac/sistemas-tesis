<tr>
    <td>{{$kardex->id}}</td>
    <td>{{$kardex->name}}</td>
    <td>
        {{date('d-m-Y', strtotime($kardex->kardex_date))}}

    </td>
    @if( is_null($kardex->input_units))
        <td>0</td>
        <td>0</td>
    @else
        <td>{{$kardex->input_units}}</td>
        <td>{{$kardex->	input_cost}}</td>
    @endif
    @if(is_null($kardex->output_units))
        <td>0</td>
        <td>0</td>
    @else
        <td>{{$kardex->output_units}}</td>
        <td>{{$kardex->	output_cost}}</td>
    @endif
    <td style="width: 20%;">
        <a href="{{route('kardex.show', $kardex)}}" class="btn btn-outline-info"
        title="Ver detalles"><i class="far fa-eye"></i></a>
    </td>
</tr>