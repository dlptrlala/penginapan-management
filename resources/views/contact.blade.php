@extends('layouts.app')

@section('content')
<style>
    .contact-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .contact-header h1 {
        font-size: 2.5rem;
        font-weight: 600;
        color: #07617D;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
    }

    .homestay-info,
    .form-section {
        background-color: #f8f9fa;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .employee-card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
    }

    .employee-card:hover {
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
    }

    .employee-card img {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .employee-card .card-body {
        background-color: #ffffff;
        padding: 1rem;
        text-align: center;
    }

    .employee-card .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #34495e;
    }

    .form-section form .form-label {
        font-weight: bold;
        color: #2c3e50;
    }

    .form-section button {
        background-color: #007bff;
        border: none;
        color: #ffffff;
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        font-size: 1rem;
        transition: all 0.3s ease-in-out;
    }

    .form-section button:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .container h3 {
        font-size: 2rem;
        font-weight: 600;
        color: #07617D;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
    }

    .container h3::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 4px;
        background-color: #07617D;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .alert {
        margin-bottom: 20px;
    }
</style>

<div class="container mt-5">
    <div class="contact-header">
        <h1>Contact Us</h1>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row mb-4">
        <!-- Homestay Info -->
        <div class="col-md-4 homestay-info">
            <h3>Homestay Info</h3>
            <p><strong>Phone:</strong> {{ $homestayContact['phone'] }}</p>
            <p><strong>Email:</strong> {{ $homestayContact['email'] }}</p>
            <p><strong>Hours:</strong> {{ $homestayContact['hours'] }}</p>
        </div>

        <!-- Employees List -->
        <div class="col-md-8">
            <h3>Our Employees</h3>
            <div class="row">
                @foreach($employees as $employee)
                <div class="col-md-6 mb-3">
                    <div class="card employee-card">
                        <img src="{{ asset('image/' . $employee->gambarKywn) }}" class="card-img-top" alt="{{ $employee->namaKywn }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $employee->namaKywn }}</h5>
                            <p>Contact: {{ $employee->kontakKywn }}</p>
                            <p>Position: {{ $employee->posisiKywn }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Message Form -->
    <div class="row">
        <div class="col-md-12 form-section">
            <h3>Send Us a Message</h3>
            <form action="{{ route('contact') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" id="message" rows="4" class="form-control" required></textarea>
                </div>
                <button type="submit">Send to WhatsApp</button>
            </form>
        </div>
    </div>
</div>
@endsection