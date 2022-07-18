@if ($errors->any())
    <div class="alert alert-warning alert-dismissible" role="alert">
        @foreach ($errors->all() as $error)
            {{ $error.'! ' }}
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
