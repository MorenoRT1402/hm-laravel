<form action="@yield('form_action')" method="POST">
    @csrf
    @method($method ?? 'POST')

    <label for="customer">Customer:</label>
    <input name="customer" type="text" placeholder="Customer Name" value="{{ old('customer', $data->customer ?? '') }}" required />
    <br/><br/>

    <label for="email">Email:</label>
    <input name="email" type="email" placeholder="Email Address" value="{{ old('email', $data->email ?? '') }}" required />
    <br/><br/>

    <label for="phone">Phone:</label>
    <input name="phone" type="text" placeholder="Phone Number" value="{{ old('phone', $data->phone ?? '') }}" />
    <br/><br/>

    <label for="subject">Subject:</label>
    <input name="subject" type="text" placeholder="Subject" value="{{ old('subject', $data->subject ?? '') }}" required />
    <br/><br/>

    <label for="comment">Comment:</label>
    <textarea name="comment" placeholder="Comment" rows="4" required>{{ old('comment', $data->comment ?? '') }}</textarea>
    <br/><br/>

    <button>Enviar</button>
</form>
