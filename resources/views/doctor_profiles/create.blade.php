@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Doctor Profile for {{ $user->name }}</h1>
    <form action="{{ route('doctor_profiles.store', $user->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="specialty">Specialty</label>
            <input type="text" name="specialty" id="specialty" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="license_number">License Number</label>
            <input type="text" name="license_number" id="license_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
