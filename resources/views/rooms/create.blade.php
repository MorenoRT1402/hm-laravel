<h1>Room Create</h1>
<form method="post" action="{{ route('rooms.store') }}">
    @csrf
    @method('post') 

    <select name="type" required>
        @foreach(config('params.room_types') as $roomType)
            <option value="{{ $roomType }}" {{ $roomType == 'Normal' ? 'selected' : '' }}>
                {{ $roomType }}
            </option>
        @endforeach
    </select>
    <br/><br/>

    <input name="number" type="number" placeholder="Introduce un numero" value="1" required />
    <br/><br/>

    <select name="bed_type" required>
        @foreach(config('params.bed_types') as $bedType)
            <option value="{{ $bedType }}" {{ $bedType == 'Single Bed' ? 'selected' : '' }}>
                {{ $bedType }}
            </option>
        @endforeach
    </select>
    <br/><br/>

    <label for="floor">Floor:</label>
    <select id="floor_letter" name="floor_letter" required>
        @foreach(config('params.room_floor_letters') as $floorLetter)
            <option value="{{ $floorLetter }}">{{ $floorLetter }}</option>
        @endforeach
    </select>

    <input id="floor_number" name="floor_number" type="number" 
           min="{{ config('params.room_floor_numbers.min') }}" 
           max="{{ config('params.room_floor_numbers.max') }}" 
           value="{{ config('params.room_floor_numbers.min') }}" 
           required />
    <br/><br/>

    <label for="facilities">Facilities:</label><br>
    @foreach(config('params.facilities') as $facility)
        <input type="checkbox" id="{{ $facility }}" name="facilities[]" value="{{ $facility }}">
        <label for="{{ $facility }}">{{ $facility }}</label><br>
    @endforeach
    <br/><br/>

    <select name="status" required>
        @foreach(config('params.room_status') as $status)
            <option value="{{ $status }}" {{ $status == 'Available' ? 'selected' : '' }}>
                {{ $status }}
            </option>
        @endforeach
    </select>
    <br/><br/>

    <input name="rate" type="number" step="0.01" placeholder="Precio" min="0" max="500" value="100.00" required />
    <br/><br/>

    <input name="discount" type="number" step="0.01" placeholder="Descuento" min="0" max="100" value="10.00" />
    <br/><br/>

    <button type="submit">Enviar</button>
</form>
