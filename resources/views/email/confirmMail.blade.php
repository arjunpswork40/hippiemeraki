<!DOCTYPE html>
<html>
<head>
    <title>zubis inn</title>
</head>
<body>
    <p>Dear <b>{{ ucfirst($status['guest_name']) }}</b>,<p>

        <p>We are pleased to inform you that your booking [booking id: <b>{{ $status['id'] }}</b>] is processed,
            Zubis Inn will get in touch with you soon.</p>

        <p style="font-weight:300px;">Your check-in: <b>{{ $status['check_in']}}</b></p>
        <p style="font-weight:300px;">Your check-out: <b>{{ $status['check_out']}}</b></p>

        <h4 style="text-align:center;"><u>Reservation details:</u></h4>
        <style>
        tr{
            border:1px solid #000;
        }
        th{
            float:left;
        }
        </style>

            <table style="width:100%">
                <tr>
                  <th>Room type </th>
                  <td><b> {{ $status['category']->category }}</b></td>
                </tr>
                <tr>
                  <th>Booked rooms</th>
                  <td><b> {{ $status['booked_room_count'] }}</b></td>
                </tr>
                <tr>
                  <th>Number of people</th>
                  <td><b> {{ $status['guest_count'] }}</b></td>
                </tr>
                <tr>
                    <th>Given contact number</th>
                    <td> <b> {{ $status['guest_phone_number'] }}</b></td>
                  </tr>
                  <tr>
                    <th>Booked on</th>
                    <td><b> {{ date('d-m-Y', strtotime($status['created_at'])) }}</b></td>
                  </tr>
                  <tr>
                    <th>Amount</th>
                    <td>Rs.<b> {{ $status['totalPrice'] }}</b></td>
                  </tr>
              </table>



    <p>Your booking is confirmed.</p>
    <p> Thank you</p>
</body>
</html>

