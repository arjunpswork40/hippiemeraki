@extends('layouts.adminDashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Guest Name</th>
                    <th>Phone Number</th>
                    <th>Checkin</th>
                    <th>CheckOut</th>
                    <th>Category</th>
                    <th>Booked Rooms</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{$booking->guest_name}}</td>
                    <td>{{$booking->guest_phone_number}}
                    </td>
                    <td>{{$booking->check_in}}</td>
                    <td> {{ $booking->check_out }}</td>
                    <td>{{ \App\Http\Constants\RoomCategory::TYPES[$booking->category_id] }}</td>
                    <td>{{ $booking->booked_room_count }}</td>
                    <td>
                        <a class="btn btn-outline-success btn-sm" href="{{ route('guestDetailsManagement',$booking->id) }}">View</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Guest Name</th>
                    <th>Phone Number</th>
                    <th>Checkin</th>
                    <th>CheckOut</th>
                    <th>Category</th>
                    <th>Booked Rooms</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

@endpush

