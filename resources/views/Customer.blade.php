@extends('layouts.app')

@section('content')

<style>
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Playfair Display", Georgia, "Times New Roman", serif;
}

.jumbotron {
    margin-bottom: 20px;
}
</style>

<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">Welcome To Customer Management System</h1>
        <!-- <p class="lead my-3">This site is a place where you can learn more about me, my skills, and my interests. I've created this website to share my background and experiences in a professional way. You can explore my work, my journey, and get in touch with me. I hope this site gives you a good sense of who I am and what I do!"</p> -->
        <!-- <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p> -->
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Gender</th>
            <th scope="col">Birth Date</th>
        </tr>
    </thead>
    @foreach($data as $item)
    <tbody>
        <tr>
            <td> {{ $item -> id}}</td>
            <td> {{ $item -> name}}</td>
            <td> {{ $item -> email}}</td>
            <td> {{ $item -> address}}</td>
            <td> {{ $item -> phone_number}}</td>
            <td> {{ $item -> gender}}</td>
            <td> {{ $item -> birth_date}}</td>
        </tr>
    </tbody>
    @endforeach
</table>

<div>
    {{ $data->links() }}
</div>
<!-- <div class="jumbotron text-center">
    <h1>Welcome to My Profile</h1>
    <p>This is a brief introduction about me.</p>
</div> -->
@endsection