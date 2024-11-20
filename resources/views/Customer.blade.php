@extends('layouts.app')

@section('content')

<style>
    /* Jumbotron Styles */
    .jumbotron {
        padding: 2rem;
        background: linear-gradient(to right, #4CAF50, #2E8B57);
        color: white;
        text-align: center;
        border-radius: 8px;
        margin-bottom: 2rem;
    }

    .jumbotron h1 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .jumbotron p {
        font-size: 1.2rem;
        margin-top: 0;
    }

    /* Form Container */
    .filter-form {
        background: white;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }

    .filter-form .form-control {
        border-radius: 5px;
    }

    .filter-form button {
        background: #4CAF50;
        border: none;
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 5px;
        font-weight: bold;
        transition: background 0.3s;
    }

    .filter-form button:hover {
        background: #45A049;
    }

    /* Table Styles */
    .table-container {
        background: white;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table {
        margin-bottom: 0;
        border-collapse: collapse;
        width: 100%;
    }

    .table th {
        background: #4CAF50;
        color: white;
        padding: 10px;
        text-align: left;
        font-weight: bold;
    }

    .table td {
        padding: 10px;
        border-bottom: 1px solid #f0f0f0;
    }

    .table tbody tr:hover {
        background: #f9f9f9;
    }

    /* Pagination Container */
    .pagination-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 1rem;
        gap: 1rem;
        font-size: 14px;
        color: #666;
    }

    /* Pagination Links */
    .pagination {
        display: flex;
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .pagination .page-item {
        margin: 0 4px;
    }

    .pagination .page-link {
        color: #4CAF50;
        border: 1px solid #ddd;
        padding: 8px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: background 0.3s;
    }

    .pagination .page-link:hover {
        background: #4CAF50;
        color: white;
        border-color: #4CAF50;
    }

    .pagination .active .page-link {
        background: #4CAF50;
        color: white;
        border-color: #4CAF50;
    }

    /* Results Info */
    .results-info {
        font-size: 0.9rem;
        color: #333;
        text-align: center;
    }
</style>

<div class="jumbotron">
    <h1>Welcome to Customer Management System</h1>
    <p>Track, filter, and manage customer data effortlessly with our powerful system.</p>
</div>

<div class="filter-form">
    <form action="{{ route('customers.filter') }}" method="GET" class="row g-3 align-items-center">
        <div class="col-md-4">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" id="gender" class="form-control">
                <option value="">-- Select Gender --</option>
                <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="birth_date" class="form-label">Birth Year</label>
            <select name="birth_date" id="birth_date" class="form-control">
                <option value="">-- Select Birth Year Filter --</option>
                <option value="after_2000" {{ request('birth_date') == 'after_2000' ? 'selected' : '' }}>After 2000</option>
            </select>
        </div>

        <div class="col-md-4 align-self-end">
            <button type="submit" class="btn">Apply Filters</button>
        </div>
    </form>
</div>

<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Birth Date</th>
            </tr>
        </thead>
        <tbody>
            @if($data->count() > 0)
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->phone_number }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->birth_date }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" style="text-align:center;">No data found. Try adjusting the filters.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

<div class="pagination-container">
    <div class="results-info">
        Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} results
    </div>
    <nav>
        {{ $data->links('pagination::bootstrap-4') }}
    </nav>
</div>
@endsection
