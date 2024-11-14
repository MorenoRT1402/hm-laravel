<div class="container my-4">
    <div class="card shadow-lg">
        <div class="card-header bg-info text-white">
            <h3 class="mb-0">Detalles de la Reserva</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>ID de Reserva:</strong> {{ $booking->id }}</p>
                    <p><strong>Cliente:</strong> {{ $booking->guest }}</p>
                    <p><strong>Fecha de Reserva:</strong> {{ \Carbon\Carbon::parse($booking->order_date)->format('d/m/Y') }}</p>
                    <p><strong>Descuento:</strong> {{ number_format($booking->discount, 2) }}%</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Check-In:</strong> {{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}</p>
                    <p><strong>Check-Out:</strong> {{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}</p>
                    <p><strong>Estado:</strong> 
                        <span class="badge {{ $booking->status === 'confirmed' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </p>
                    <p><strong>Habitación:</strong> {{ $booking->room->name ?? 'No asignada' }}</p> <!-- Aquí asumiendo que tienes una relación 'room' definida -->
                </div>
            </div>

            @if ($booking->picture)
                <div class="mb-3">
                    <img src="{{ $booking->picture }}" alt="Imagen del cliente" class="img-fluid rounded" style="max-width: 200px;">
                </div>
            @endif

            <div class="mb-3">
                <h5>Detalles Adicionales</h5>
                <p><strong>Comentarios:</strong></p>
                <p>
                    @if(is_array($booking->notes) && count($booking->notes) > 0)
                        {!! implode('<br>', $booking->notes) !!}
                    @else
                        No hay comentarios adicionales
                    @endif
                </p>
            </div>

            <div class="mb-3">
                <p><strong>Archivado:</strong> 
                    <span class="badge {{ $booking->archived ? 'bg-success' : 'bg-warning' }}">
                        {{ $booking->archived ? 'Sí' : 'No' }}
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
