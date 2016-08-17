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
    <div class="panel-heading">Panel heading</div>

    <!-- Table -->
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section("scriptAppendArea")
<!-- Slider -->
<script type="text/javascript" src="{{asset("js/bxslider.min.js")}}"></script>
<script type="text/javascript" src="{{asset("js/script.slider.js")}}"></script>
@endsection
