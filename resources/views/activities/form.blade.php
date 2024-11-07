@csrf
@method($method ?? 'POST')

<div>
    <label for="type">Tipo de Actividad:</label>
    <select name="type" id="type">
        <option value="surf" {{ old('type', $activity->type ?? '') === 'surf' ? 'selected' : '' }}>surf</option>
        <option value="windsurf" {{ old('type', $activity->type ?? '') === 'windsurf' ? 'selected' : '' }}>windsurf</option>
        <option value="kayak" {{ old('type', $activity->type ?? '') === 'kayak' ? 'selected' : '' }}>kayak</option>
        <option value="atv" {{ old('type', $activity->type ?? '') === 'atv' ? 'selected' : '' }}>atv</option>
        <option value="hot air balloon" {{ old('type', $activity->type ?? '') === 'hot-air-balloon' ? 'selected' : '' }}>hot air balloon</option>
    </select>
</div>

<div>
    <label for="datetime">Fecha y Hora:</label>
    <input type="datetime-local" id="datetime" name="datetime" value="{{ old('datetime', $activity->datetime ?? '') }}" required>
</div>

<div>
    <label for="notes">Notas:</label>
    <textarea id="notes" name="notes">{{ old('notes', $activity->notes ?? '') }}</textarea>
</div>

<button type="submit">Enviar</button>
