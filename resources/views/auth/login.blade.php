<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <title>Մուտք</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">Մուտք</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Էլ. հասցե</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Գաղտնաբառ</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Մուտք գործել</button>
                        </form>
                        <div class="text-center mt-3 pt-3 border-top">
                            <a href="{{ route('register') }}" class="small text-decoration-none">Գրանցվել</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>