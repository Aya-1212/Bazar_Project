@if (session('errors'))
    <div class="alert alert-dark">{{ session('errors') }}</div>
@endif