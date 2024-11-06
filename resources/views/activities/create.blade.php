<form method="post" action="{{route('activities.store')}}">
    @csrf
    @method('post')
    <select name="type" id="">
        <option value="surf">surf</option>
        <option value="windsurf">windsurf</option>
        <option value="kayak">kayak</option>
        <option value="atv">atv</option>
        <option value="hot-air-balloon">hot air balloon</option>
    </select>
    <input type="date" name="datetime" id="" placeholder="Datetime">
    <textarea name="notes" id="" placeholder="notes"></textarea>
    <button>Send</button>
</form>