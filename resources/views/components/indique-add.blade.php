<div class="d-flex justify-content-between align-items-center">
    <x-indique-section class="me-auto">{{ $sectionTitle }}</x-indique-section>
    <button class="btn btnAdd">
        <a title="{{$title}}" href="{{ $route }}">
            <i class="bi bi-plus"></i>
            {{ $buttonText }}
        </a>
    </button>
</div>
