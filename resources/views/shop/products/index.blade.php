<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="m-0">Products</h3>
    <a class="btn btn-outline-dark" href="/cart">Cart</a>
  </div>

  <form method="GET" action="{{ route('shop.products.index') }}" class="row g-3 mb-3">
    <div class="col-md-4">
      <select class="form-select" name="category_id" onchange="this.form.submit()">
        <option value="">All Categories</option>
        @foreach ($categories as $cat)
          <option value="{{ $cat->id }}" @selected((string)$categoryId === (string)$cat->id)>
            {{ $cat->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="col-md-8">
      <div class="input-group">
        <input class="form-control" name="q" value="{{ $q }}" placeholder="Search product name...">
        <button class="btn btn-primary" type="submit">Search</button>
        <a class="btn btn-outline-secondary" href="{{ route('shop.products.index') }}">Clear</a>
      </div>
    </div>
  </form>

  @if ($products->count() === 0)
    <div class="alert alert-warning">No products found.</div>
  @else
    <div class="row g-3">
      @foreach ($products as $p)
        <div class="col-6 col-md-3">
          <div class="card h-100">
            <div class="ratio ratio-4x3 bg-secondary-subtle">
  @if ($p->image)
    <img src="{{ $p->image }}" class="w-100 h-100 object-fit-cover" alt="{{ $p->name }}">
  @else
    <div class="p-4 text-center text-muted">No Image</div>
  @endif
</div>


            <div class="card-body">
              <div class="fw-semibold text-truncate">{{ $p->name }}</div>
              <div class="text-muted small">{{ $p->category?->name }}</div>
              <div class="mt-1">฿{{ number_format((float)$p->price, 2) }}</div>
              <div class="small {{ $p->stock > 0 ? 'text-success' : 'text-danger' }}">
                Stock: {{ $p->stock }}
              </div>
            </div>

            <div class="card-footer bg-white border-0 d-flex gap-2">
              <a class="btn btn-sm btn-outline-primary w-100" href="{{ route('shop.products.show', $p->id) }}">View</a>
              <button class="btn btn-sm btn-primary w-100" type="button" {{ $p->stock <= 0 ? 'disabled' : '' }}>
                Add
              </button>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="mt-4">
      {{ $products->links() }}
    </div>
  @endif
</div>
</body>
</html>
