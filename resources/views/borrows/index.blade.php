@extends('layouts.base')

@section('content')

{{-- <form action="{{ route('approve') }}" method="GET">
    <input type="text" name="search" required/>
    <button type="submit">Search</button>
</form> --}}
<table class="table">
    <thead>
      <tr>
        <th scope="col">Reader ID</th>
        <th scope="col">Book ID</th>
        <th scope="col">Status</th>
        <th scope="col">Request Processed At</th>
        <th scope="col">Deadline</th>
        <th scope="col">Returned At</th>
        <th scope="col">Managed By</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($borrows as $borrow)
        <tr>
            <td scope="col">{{ $borrow->reader_id }}</td>
            <td scope="col">{{ $borrow->book_id }} </td>
            <td scope="col">{{ $borrow->status }}</td>
            <td scope="col">{{ $borrow->request_processed_at }} </td>
            <td scope="col">{{ $borrow->deadline }}</td>
            <td scope="col">{{ $borrow->returned_at }} </td>
            <td scope="col">{{ $borrow->return_managed_by  }} </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @endsection
