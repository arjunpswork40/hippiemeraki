@extends('layouts.adminDashboard')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">

    <table style="width:100%" class="table  service_tab">
        <tr>
            <th class="thwidth ">Customer Name </th>
            <td class="">{{$details->guest_name}}</td>
        </tr>
        <tr>
            <th class="thwidth ">Customer Mobile </th>
            <td class="">{{$details->guest_phone_number}}</td>
        </tr>
        <tr>
            <th class="thwidth ">Email</th>
            <td class=" ">{{$details->email}}</td>
        </tr>
        <tr>
            <th class="thwidth ">Category</th>
            <td class="">{{ \App\Http\Constants\RoomCategory::TYPES[$details->category_id] }}</td>
        </tr>
        <tr>
            <th class="thwidth ">Booked Rooms</th>
            <td class="">{{$details->booked_room_count}}</td>
        </tr>
        <tr>
            <th class="thwidth ">CheckIn</th>
            <td class="">{{$details->check_in}}</td>
        </tr>
        <tr>
            <th class="thwidth ">CheckOut</th>
            <td class=" ">{{$details->check_out}}</td>
        </tr>

        <tr>
            <th class="thwidth ">ID Proof</th>
            <td class=" ">
                <img src="{{ \App\Http\Helpers\Core\FileManager::getIDImagePath($details->guest_ID_proof) }}" style="width: 25%;display: block">
                </td>
        </tr>
        <tr>
            <th class="thwidth ">Total Amount</th>
            <td class=" ">{{$details->totalPrice}}</td>
        </tr>


        <tr>
            <th class="thwidth">Status </th>
            <td class=" ">



            </td>
        </tr>

        <tr >
            <th class="thwidth">Customer Query  </th>


           <td> Query made by customer on the request  will be shown here, if any !.</td>
        </tr>

    </table>

</div>

@endsection
