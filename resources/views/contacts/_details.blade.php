<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Detalles del Contacto</h4>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $item->id }}</p>
            <p><strong>Fecha de Contacto:</strong> {{ \Carbon\Carbon::parse($item->date)->format('d/m/Y H:i:s') }}</p>
            <p><strong>Cliente:</strong> {{ $item->customer }}</p>
            <p><strong>Email:</strong> {{ $item->email }}</p>
            <p><strong>Teléfono:</strong> {{ $item->phone }}</p>
            <p><strong>Asunto:</strong> {{ $item->subject }}</p>
            <p><strong>Comentario:</strong></p>
            <p>{{ $item->comment }}</p>

            <p><strong>Archivado:</strong> 
                <span class="badge {{ $item->archived ? 'bg-success' : 'bg-warning' }}">
                    {{ $item->archived ? 'Sí' : 'No' }}
                </span>
            </p>
        </div>
    </div>
</div>
