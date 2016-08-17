@extends("layouts.main")
@section("title")
test
@endsection

@section("price")
$100
@endsection

@section("diffArea")
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Products List</div>

    <!-- Table -->
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Add to Cart</th>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <form method="POST" action="{{url("cart/add")}}">
                        <input type="hidden" name="product_id" value={{$product->id}}>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" class="btn-default"><i class="fa fa-shopping-cart"></i> Add</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection