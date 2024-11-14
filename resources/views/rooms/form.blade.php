<form action="@yield('form_action')" method="POST">
    @csrf
    @method($method ?? 'POST')

    <select name="type" required>
        @foreach(config('params.room_types') as $roomType)
            <option value="{{ $roomType }}" {{ old('type', $data->type ?? 'Normal') == $roomType ? 'selected' : '' }}>
                {{ $roomType }}
            </option>
        @endforeach
    </select>
    <br/><br/>

    <input name="number" type="number" placeholder="Introduce un número" value="{{ old('number', $data->number ?? 1) }}" required />
    <br/><br/>

    <select name="bed_type" required>
        @foreach(config('params.bed_types') as $bedType)
            <option value="{{ $bedType }}" {{ old('bed_type', $data->bed_type ?? 'Single Bed') == $bedType ? 'selected' : '' }}>
                {{ $bedType }}
            </option>
        @endforeach
    </select>
    <br/><br/>

    <label for="floor">Floor:</label>
    <select id="floor_letter" name="floor_letter" required>
        @foreach(config('params.room_floor_letters') as $floorLetter)
            <option value="{{ $floorLetter }}" {{ old('floor_letter', $data->floor_letter ?? '') == $floorLetter ? 'selected' : '' }}>
                {{ $floorLetter }}
            </option>
        @endforeach
    </select>

    <input id="floor_number" name="floor_number" type="number" 
           min="{{ config('params.room_floor_numbers.min') }}" 
           max="{{ config('params.room_floor_numbers.max') }}" 
           value="{{ old('floor_number', $data->floor_number ?? config('params.room_floor_numbers.min')) }}" 
           required />
    <br/><br/>

    <label for="facilities">Facilities:</label><br>
    @foreach(config('params.facilities') as $facility)
        <input type="checkbox" id="{{ $facility }}" name="facilities[]" value="{{ $facility }}" 
               {{ in_array($facility, old('facilities', json_decode($data->facilities ?? '[]', true))) ? 'checked' : '' }}>
        <label for="{{ $facility }}">{{ $facility }}</label><br>
    @endforeach
    <br/><br/>

    <select name="status" required>
        @foreach(config('params.room_status') as $status)
            <option value="{{ $status }}" {{ old('status', $data->status ?? 'Available') == $status ? 'selected' : '' }}>
                {{ $status }}
            </option>
        @endforeach
    </select>
    <br/><br/>

    <input name="rate" type="number" step="0.01" placeholder="Precio" min="0" max="500" value="{{ old('rate', $data->rate ?? 100.00) }}" required />
    <br/><br/>

    <input name="discount" type="number" step="0.01" placeholder="Descuento" min="0" max="100" value="{{ old('discount', $data->discount ?? 0.00) }}" />
    <br/><br/>

    <button type="submit">Enviar</button>
</form>
