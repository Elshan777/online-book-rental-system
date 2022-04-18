@extends('layouts.base')

@section('content')
<div class="container">

    <br>
    <br>
    
    <div class="center">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Book Count</h5>
                  <p class="card-text">  {{$book_count}} </p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Genre Count</h5>
                  <p class="card-text"> {{$genre_count}} </p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Users Registered</h5>
                  <p class="card-text">  {{$user_count}}  </p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Book Borrowal</h5>
                  <p class="card-text"> {{$book_count}} </p>
                </div>
              </div>
            </div>
            <div class="col">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Currently active Book Rentals</h5>
                    <p class="card-text"> {{$borrow_count_active}}  </p>
                  </div>
                </div>
              </div>
          </div>
    </div>
</div>
@endsection
