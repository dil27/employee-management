@extends('layouts.app')

@section('content')
<div class="container">

    <div class="employee-card">
        <div class="card-col left">
            <img src="{{ asset($employee->photo) }}" alt="Photo" class="employee-photo">
        </div>
        <div class="card-col right">
            <div class="card-employee-detail">
                <div class="employee-name">{{ $employee->name }}</div>
                <div class="employee-job">{{ $employee->position }}, {{ $employee->department }}</div>
                <div class="employee-email"><i class="bi bi-envelope-at"></i> <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></div>
                <div class="employee-join"><i class="bi bi-building-add"></i> Join this company at {{ \Carbon\Carbon::parse($employee->join_date)->isoFormat('MMMM Do, YYYY') }}</div>
            </div>
            <div class="card-employee-footer">
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn custom-button"><i class="bi bi-pencil-square"></i> Edit</a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn custom-button"><i class="bi bi-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
