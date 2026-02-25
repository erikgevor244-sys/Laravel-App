<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background: #212529; color: white; position: fixed; }
        .sidebar a { color: #adb5bd; text-decoration: none; padding: 12px 20px; display: block; transition: 0.3s; }
        .sidebar a:hover { background: #343a40; color: white; }
        .main-content { margin-left: 16.66667%; padding: 20px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 sidebar p-3">
                <h4 class="text-center py-3 border-bottom border-secondary">Admin Panel</h4>
                <div class="mt-4">
                    <a href="/admin/dashboard" class="active text-white">Ապրանքներ</a>
                </div>
            </nav>
            <main class="col-md-10 main-content">
                <div class="d-flex justify-content-between align-items-center p-3 bg-white shadow-sm mb-4 rounded">
                    <h4>Բոլոր ապրանքները</h4>
                    <form method="POST" action="/logout">@csrf <button class="btn btn-outline-danger btn-sm">Դուրս գալ</button></form>
                </div>
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Անվանում</th>
                                    <th>Գին</th>
                                    <th>Ավելացնող</th>
                                    <th>Գործողություն</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->price }} ֏</td>
                                    <td>{{ $product->user->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Խմբագրել</a>
                                        <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Վստա՞հ եք:')">Ջնջել</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>