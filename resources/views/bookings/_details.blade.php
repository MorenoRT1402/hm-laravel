<div class="container my-4">
    <div class="card shadow-lg">
        <div class="card-header bg-info text-white">
            <h3 class="mb-0">Detalles de la Reserva</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>ID de Reserva:</strong> {{ $item->id }}</p>
                    <p><strong>Cliente:</strong> {{ $item->guest }}</p>
                    <p><strong>Fecha de Reserva:</strong> {{ \Carbon\Carbon::parse($item->order_date)->format('d/m/Y') }}</p>
                    <p><strong>Descuento:</strong> {{ number_format($item->discount, 2) }}%</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Check-In:</strong> {{ \Carbon\Carbon::parse($item->check_in)->format('d/m/Y') }}</p>
                    <p><strong>Check-Out:</strong> {{ \Carbon\Carbon::parse($item->check_out)->format('d/m/Y') }}</p>
                    <p><strong>Estado:</strong> 
                        <span class="badge {{ $item->status === 'confirmed' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </p>
                    <p><strong>Habitación:</strong> {{ $item->room->name ?? 'No asignada' }}</p> <!-- Aquí asumiendo que tienes una relación 'room' definida -->
                </div>
            </div>

            @if ($item->picture)
                <div class="mb-3">
                    <img src="{{ $item->picture }}" alt="Imagen del cliente" class="img-fluid rounded" style="max-width: 200px;">
                </div>
            @endif

            <div class="mb-3">
                <h5>Detalles Adicionales</h5>
                <p><strong>Comentarios:</strong></p>
                <p>
                    {{$item->notes}}
                </p>
            </div>

            <div class="mb-3">
                <p><strong>Archivado:</strong> 
                    <span class="badge {{ $item->archived ? 'bg-success' : 'bg-warning' }}">
                        {{ $item->archived ? 'Sí' : 'No' }}
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
