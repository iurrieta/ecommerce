@extends("layouts.app")

@section("title", "Productos Facilito")

@section("content")
    <div class="text-center products-container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-xs-12 col-sm-6">
                    @include("products.product", ["product" => $product])
                </div>
            @endforeach
        </div>
        <div>
            {{$products->links()}}
        </div>
    </div>
@endsection