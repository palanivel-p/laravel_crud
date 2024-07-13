@extends('layouts.app')

@section('content')
@if (session()->has('message'))   
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <strong>Employee List</strong>
                <a href="{{ route('employee.create') }}" class="btn btn-primary btn-xs float-end py-0">Create Employee</a>
                
                <!-- Make table responsive -->
                <div class="table-responsive" style="margin-top:10px;">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Joining Date</th>
                                <th>Joining Salary</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee as $key => $tableName)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $tableName->name }}</td>
                                <td>{{ $tableName->email }}</td>
                                <td>{{ $tableName->joining_date }}</td>
                                <td>{{ $tableName->joining_salary }}</td>
                                <td>
                                    <span class="btn {{ $tableName->is_active == 1 ? 'btn-success' : 'btn-danger' }} btn-xs py-0">
                                        {{ $tableName->is_active == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('employee.edit', $tableName->id) }}" class="btn btn-warning btn-xs py-0 mx-1">Edit</a>
                                    <a href="{{ route('employee.show', $tableName->id) }}" class="btn btn-primary btn-xs py-0 mx-1">Show</a>
                                    <form action="{{ route('employee.destroy', $tableName->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs py-0">Delete</button>
                                    </form>
                                    </div>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $employee->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
