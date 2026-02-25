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
                        <a href="/dashboard" class="active text-white">Ապրանքներ</a>
                    </div>
                    @if ($user_role == 'admin')
                    <div class="mt-4">
                        <a href="/product/create" class="active text-white">Ապրանքներ ստեղծել</a>
                    </div>
                    @elseif($user_role == 'user')
                    @endif
                  
                </nav>
                @yield("content")

            </div>
        </div>

</body>
</html>