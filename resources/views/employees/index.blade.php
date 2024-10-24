@extends('layouts.app')

@section('content')
    <div class="container" style="margin-bottom: 50px">
        <div class="row">
            <h1 class="col-md-6">Employee List</h1>
            <div class="col-md-6" style="text-align: right">
                <a href="{{ route('employees.create') }}" class="btn btn-primary">Add New Employee</a>
            </div>
        </div>

        <div class="row mb-3" style="margin-top: 20px;">
            <div class="col-md-12">
                <input type="text" id="search" class="form-control " placeholder="Search">
            </div>
            <div style="margin: 20px auto; width: 100%; text-align: center;">Filter</div>
            <div class="col-md-1" style="margin-bottom: 10px">
                <input type="text" id="searchId" class="form-control " placeholder="ID">
            </div>
            <div class="col-md-2" style="margin-bottom: 10px">
                <input type="text" id="searchName" class="form-control " placeholder="Name">
            </div>
            <div class="col-md-3" style="margin-bottom: 10px">
                <input type="text" id="searchEmail" class="form-control " placeholder="Email">
            </div>
            <div class="col-md-3" style="margin-bottom: 10px">
                <input type="text" id="searchPosition" class="form-control " placeholder="Position">
            </div>
            <div class="col-md-3" style="margin-bottom: 10px">
                <input type="text" id="searchDepartment" class="form-control " placeholder="Department">
            </div>
        </div>
        
        <p style="font-size: small; text-align: center; font-style: italic;">Click row to view</p>

        <table class="table" id="employeeTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Join Date</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td><span class="employeeId">{{ $employee->id }}</span></td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($employee->join_date)->format('d/m/Y') }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->department }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn custom-button"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn custom-button"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                        <td style="opacity: 0">{{ $employee->id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            let table = $('#employeeTable').DataTable({
                "responsive": true,
                "ordering": true,
                "searching": true,
                "paging": true,
                "pageLength": 25,
                "lengthChange": true,
                "language": {
                    "lengthMenu": "Entries of each page: _MENU_",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries"
                },
                "columnDefs": [
                    {
                        target: 7,
                        visible: false
                    }
                ]
            });

            $('#employeeTable tbody').on('click', 'tr', function () {

                window.location.href = `/employees/${table.row(this).data()[7]}`;
            });

            $('#search').on('keyup change', function() {
                table.search(this.value).draw(); // Kolom Name
            });

            $('#searchId').on('keyup change', function() {
                table.column(1).search(this.value).draw(); // Kolom Name
            });

            $('#searchName').on('keyup change', function() {
                table.column(1).search(this.value).draw(); // Kolom Name
            });

            $('#searchEmail').on('keyup change', function() {
                table.column(2).search(this.value).draw(); // Kolom Email
            });
            
            $('#searchPosition').on('keyup change', function() {
                table.column(4).search(this.value).draw(); // Kolom Position
            });

            $('#searchDepartment').on('keyup change', function() {
                table.column(5).search(this.value).draw(); // Kolom Department
            });
        });
    </script>
@endsection
