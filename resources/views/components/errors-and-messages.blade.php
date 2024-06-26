@if($errors->all())
    @foreach($errors->all() as $message)
        <div class="alert bg-soft-danger fw-medium d-flex bd-highlight mb-3" role="alert">
            <div class="bd-highlight">
                <i class="uil uil-exclamation-octagon fs-5 align-middle me-1"></i>
                {{ $message }}
            </div>
            <div class="ms-auto bd-highlight">
                <button type="button" class="btn-close bg-soft-danger" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endforeach

@elseif(session()->has('message'))
    <div class="alert bg-soft-success fw-medium d-flex bd-highlight mb-3" role="alert">
        <div class="bd-highlight">
            <i class="uil uil-check-circle fs-5 align-middle me-1"></i>
            {{ session()->get('message') }}
        </div>
        <div class="ms-auto bd-highlight">
            <button type="button" class="btn-close bg-soft-success" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@elseif(session()->has('error'))
    <div class="alert bg-soft-danger fw-medium d-flex bd-highlight mb-3" role="alert">
        <div class="bd-highlight">
            <i class="uil uil-check-circle fs-5 align-middle me-1"></i>
            {{ session()->get('error') }}
        </div>
        <div class="ms-auto bd-highlight">
            <button type="button" class="btn-close bg-soft-danger" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
