@props(['id', 'title', 'action', 'buttonText'])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
            <div class="modal-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                <h5 class="modal-title fw-bold" id="{{ $id }}Label">
                    <i class="bi bi-pencil-square me-2"></i><span class="modal-title-text">{{ $title }}</span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ $action }}" method="POST" id="form-{{ $id }}">
                @csrf
                <div id="method-field-{{ $id }}"></div> {{-- Para el @method('PUT') --}}

                <div class="modal-body p-4 text-dark">
                    {{ $slot }} {{-- AQUÍ SE "INYECTA" EL FORMULARIO --}}
                </div>

                <div class="modal-footer border-0 pb-4 justify-content-center">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-naranja rounded-pill px-4 fw-bold">{{ $buttonText }}</button>
                </div>
            </form>
        </div>
    </div>
</div>