@if (session()->has('flash'))
    <div class="alert alert-{{ session('flash')['type'] }}" role="alert">
        {{ session('flash')['message'] }}
    </div>
@endif
