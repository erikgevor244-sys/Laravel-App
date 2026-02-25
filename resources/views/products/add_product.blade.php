@extends("layouts.app")

@section("content")
    <main class="col-md-10 main-content">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5>Ավելացնել նոր ապրանք</h5>
                    <form action="{{ route("product.store") }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-4"><input type="text" name="title" class="form-control" placeholder="Անվանում" required></div>
                        <div class="col-md-4"><input type="number" name="price" class="form-control" placeholder="Գին" required></div>
                        <div class="col-md-4"><button class="btn btn-success w-100">Ավելացնել</button></div>
                        <div class="col-12"><textarea name="description" class="form-control" placeholder="Նկարագրություն"></textarea></div>
                    </form>
                </div>
            </div>
    </main>
        @endsection