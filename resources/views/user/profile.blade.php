<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <title>Իմ Պրոֆիլը</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Իմ Կայքը</a>
            <form method="POST" action="/logout" class="d-flex">
                @csrf
                <button class="btn btn-sm btn-danger">Դուրս գալ</button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" width="100" class="rounded-circle mb-3">
                        <h4>{{ Auth::user()->name }}</h4>
                        <p class="text-muted">Դերը: <span class="badge bg-secondary">{{ Auth::user()->role }}</span></p>
                        <hr>
                        <div class="text-start">
                            <p><strong>Էլ․ հասցե:</strong> {{ Auth::user()->email }}</p>
                            <p><strong>Անդամակցության ամսաթիվ:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                        </div>
                        <button class="btn btn-primary w-100 mt-3">Խմբագրել պրոֆիլը</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>