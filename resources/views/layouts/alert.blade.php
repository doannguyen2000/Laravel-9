@if ($errors->any() && $errors->first() == 'Account does not exist')
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ $errors->first() }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
