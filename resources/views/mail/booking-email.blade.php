<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        h1 { color: #0056b3; }
        .details { border: 1px solid #ddd; padding: 15px; border-radius: 5px; }
        .details ul { list-style-type: none; padding: 0; }
        .details ul li { margin: 5px 0; }
    </style>
</head>
<body>
    <h1>Booking Confirmation</h1>
    <p>Dear {{ $guest }},</p>
    <p>Thank you for your booking. Below are the details of your reservation:</p>

    <div class="details">
        <ul>
            <li><strong>Order Date:</strong> {{ $order_date }}</li>
            <li><strong>Room Name:</strong> {{ $room->get_name() }}</li>
            {{-- <li><strong>Room Description:</strong> {{ $room->description }}</li> --}}
            <li><strong>Price per Night:</strong> ${{ $room->rate }}</li>
            <li><strong>Total Price:</strong> ${{ $price }}</li>
            <li><strong>Check-In:</strong> {{ $check_in }}</li>
            <li><strong>Check-Out:</strong> {{ $check_out }}</li>
            @if($notes)
                <li><strong>Notes:</strong> {{ $notes }}</li>
            @endif
            @if($picture)
                <li><strong>Attached Picture:</strong> <img src="{{ $picture }}" alt="Booking Picture" style="max-width: 100px;"></li>
            @endif
        </ul>
    </div>

    <p>We look forward to welcoming you. If you have any questions, feel free to contact us.</p>
</body>
</html>
