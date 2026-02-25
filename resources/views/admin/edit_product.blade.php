<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <div class="card border-0 shadow-sm mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h4>Խմբագրել ապրանքը</h4>
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                    @csrf
                    <div class="mb-3"><input type="text" name="title" class="form-control" value="{{ $product->title }}"></div>
                    <div class="mb-3"><input type="number" name="price" class="form-control" value="{{ $product->price }}"></div>
                    <div class="mb-3"><textarea name="description" class="form-control">{{ $product->description }}</textarea></div>
                    <button class="btn btn-primary w-100">Պահպանել</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>