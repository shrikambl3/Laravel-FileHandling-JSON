<h2>Product Table</h2>

<table border="1" class="table table-hover">
    <thead>
    <tr>
        <th>Product name</th>
        <th>Quantity in stock</th>
        <th>Total value number</th>
    </tr></thead><tbody id="tablebody">
    <?php $total = 0 ?>
    @if(!empty($contents))
    @foreach ($contents as $data)
        <tr>
            @foreach ($data as $key=>$value)
                <td>{{$value}}</td>
                <?php $key == "price"?$total += $value : '' ;?>
            @endforeach
        </tr></tbody>
    @endforeach
    @endif
    <tr id="lastrow">
        <td colspan="3"><input type="hidden"  id="total" value="{{$total}}" >Total = {{$total}}</td>
    </tr>
</table>

