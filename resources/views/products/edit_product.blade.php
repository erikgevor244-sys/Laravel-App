@extends("layouts.app")
@section("content")

<main class="col-md-10 main-content">
        <div class="container">
            <div class="card border-0 shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <h4>Խմբագրել ապրանքը</h4>
                    <form action="{{ route('product.update', $product->id) }}" method="POST">
                        @csrf
                        <div class="mb-3"><input type="text" name="title" class="form-control" value="{{ $product->title }}"></div>
                        <div class="mb-3"><input type="number" name="price" class="form-control" value="{{ $product->price }}"></div>
                        <div class="mb-3"><textarea name="description" class="form-control">{{ $product->description }}</textarea></div>
                        <button class="btn btn-primary w-100">Պահպանել</button>
                    </form>
                </div>
            </div>
        </div>
</main>

@endsection