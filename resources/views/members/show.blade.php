@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Member Details</h1>
    <div class="card" style="width: 18rem;">
        <img src="{{ asset($member->qr_code) }}" class="card-img-top" alt="Member QR Code">
        
        <div class="card-body">
            <h5 class="card-title">{{ $member->name }}</h5>
            <p class="card-text">
                <strong>Student ID:</strong> {{ $member->student_id }}<br>
                <strong>Joined:</strong> {{ $member->created_at->format('M d, Y') }}
            </p>
            <a href="{{ route('members.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection