@extends('layouts.app')

@section('title', 'Reservar Libros')

@section('content')
<main class="container my-5">
    
    <!-- Título Principal -->
    <div class="mb-4">
        <h1 class="text-dark fw-bold" style="font-size: 2.5rem;">Reservas</h1>
    </div>

    <!-- Sección: Libros a reservar (Contenedor Morado) -->
    <section class="agrupacion-contenido">
        <h2 class="fs-4 mb-4">Libros a reservar</h2>

        <form>
            <!-- Nota de Entrega -->
            <div class="mb-4">
                <label for="notaEntrega" class="form-label text-white">Delivery note</label>
                <div class="input-group">
                    <input type="text" id="notaEntrega" class="form-control form-control-lg" placeholder="Añade detalles...">
                    <button class="btn btn-light d-flex align-items-center justify-content-center" type="button" style="width: 50px;">
                        <i class="bi bi-plus-lg text-dark fs-5"></i>
                    </button>
                </div>
            </div>

            <!-- Checkbox -->
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="terminos">
                <label class="form-check-label text-white" for="terminos">
                    Acepto los términos y condiciones
                </label>
            </div>
            <a href="#" class="text-white-50 text-decoration-underline d-inline-block mb-4" style="font-size: 0.9rem;">Leer nuestros T&Cs</a>
        </form>
    </section>

    <!-- Sección: Calendario (Días) -->
    <section class="agrupacion-contenido mt-4">
        <h2 class="fs-4 mb-4">Seleccionar Días</h2>

        <!-- Selector mes y año -->
        <div class="d-flex align-items-center justify-content-between mb-3 rounded-top p-3" style="background-color: var(--color-tarjeta);">
            <button class="btn btn-sm btn-outline-light border-0"><i class="bi bi-chevron-left"></i></button>
            
            <div class="d-flex gap-2 w-50 justify-content-center">
                <select class="form-select form-select-sm w-50">
                    <option>Abril</option>
                </select>
                <select class="form-select form-select-sm w-50">
                    <option>2026</option>
                </select>
            </div>

            <button class="btn btn-sm btn-outline-light border-0"><i class="bi bi-chevron-right"></i></button>
        </div>

        <!-- Grilla de Calendario -->
        <div class="bg-white rounded-bottom p-3">
            <div class="row text-center fw-bold mb-3 text-secondary" style="font-size: 0.9rem;">
                <div class="col">Lu</div>
                <div class="col">Ma</div>
                <div class="col">Mi</div>
                <div class="col">Ju</div>
                <div class="col">Vi</div>
                <div class="col">Sa</div>
                <div class="col">Do</div>
            </div>

            <!-- Ejemplo de semana 1 -->
            <div class="row text-center mb-3">
                <div class="col"><div class="p-2 border rounded bg-light text-muted">30</div></div>
                <div class="col"><div class="p-2 border rounded bg-light text-muted">31</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">1</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">2</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">3</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">4</div></div>
                <div class="col"><div class="p-2 border rounded text-dark">5</div></div>
            </div>
            <!-- ... se pueden añadir más semanas o dejarlo como mockup visual ... -->
            <div class="row text-center mb-3 text-muted" style="font-size: 0.8rem;">
                <div class="col-12">(Diseño de calendario interactivo migrado)</div>
            </div>
        </div>
    </section>

    <!-- Botón final -->
    <section class="mt-4">
        <button class="btn btn-naranja btn-lg px-5">Realizar Reserva</button>
    </section>

</main>
@endsection
