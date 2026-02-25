<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <title>User Panel - Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2>Իմ ապրանքները</h2>
            <form method="POST" action="/logout">@csrf <button class="btn btn-danger">Ելք</button></form>
        </div>
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h5>Ավելացնել նոր ապրանք</h5>
                <form action="/products/store" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-4"><input type="text" name="title" class="form-control" placeholder="Անվանում" required></div>
                    <div class="col-md-4"><input type="number" name="price" class="form-control" placeholder="Գին" required></div>
                    <div class="col-md-4"><button class="btn btn-success w-100">Ավելացնել</button></div>
                    <div class="col-12"><textarea name="description" class="form-control" placeholder="Նկարագրություն"></textarea></div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4">
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-body">
                        <h6>{{ $product->title }}</h6>
                        <p class="text-muted small">{{ $product->description }}</p>
                        <b class="text-primary">{{ $product->price }} ֏</b>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>