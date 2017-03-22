@extends("layouts.app")

@section("content")
    <div class="container white">
        <h1>Editar Producto</h1>

        {{--Formulario--}}
        @include("products.form",
        ["product" => $product,
        "url" => "/products/".$product->id,
        "method" => "PATCH"])

    </div>
@endsection