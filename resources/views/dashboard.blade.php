@extends("layouts.app")
@section("content")
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
                        
                                    @if ($user_role == 'admin')
                                    <th>Գործողություն</th>
                                    @elseif($user_role == 'user')
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->price }} ֏</td>
                                    <td>{{ $product->user->name }}</td>
                                     @if ($user_role == 'admin')
                                       <td>
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary">Խմբագրել</a>
                                            <form action="{{ route('product.delete', $product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Վստա՞հ եք:')">Ջնջել</button>
                                            </form>
                                        </td>
                                     @elseif($user_role == 'user')
                                    @endif
                            
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
</main>
@endsection