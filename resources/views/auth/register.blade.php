<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <title>Գրանցում</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">Գրանցում</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Անուն</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Էլ. հասցե</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Գաղտնաբառ</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Դերը</label>
                                <select name="role" class="form-select">
                                    <option value="user">Օգտատեր (User)</option>
                                    <option value="admin">Ադմինիստրատոր (Admin)</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Գրանցվել</button>
                        </form>
                        <div class="text-center mt-3 pt-3 border-top">
                            <a href="{{ route('login') }}" class="small text-decoration-none">Արդեն ունե՞ք հաշիվ: Մուտք</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>