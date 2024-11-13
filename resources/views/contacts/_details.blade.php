<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Detalles del Contacto</h4>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $contact->id }}</p>
            <p><strong>Fecha de Contacto:</strong> {{ \Carbon\Carbon::parse($contact->date)->format('d/m/Y H:i:s') }}</p>
            <p><strong>Cliente:</strong> {{ $contact->customer }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Teléfono:</strong> {{ $contact->phone }}</p>
            <p><strong>Asunto:</strong> {{ $contact->subject }}</p>
            <p><strong>Comentario:</strong></p>
            <p>{{ $contact->comment }}</p>

            <p><strong>Archivado:</strong> 
                <span class="badge {{ $contact->archived ? 'bg-success' : 'bg-warning' }}">
                    {{ $contact->archived ? 'Sí' : 'No' }}
                </span>
            </p>
        </div>
    </div>
</div>
