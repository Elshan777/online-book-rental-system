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
        <th scope="col">Request Managed By</th>
        <th scope="col">Returned At</th>
        <th scope="col">Return Managed By</th>
        <th scope="col">Deadline</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($borrows as $borrow)
        <tr>
            <td scope="col">{{ $borrow->reader_id }}</td>
            <td scope="col">{{ $borrow->book_id }} </td>
            <td scope="col">
              @if ($borrow->status == null) 
                <p>FINISHED</p>
              @else 
                {{$borrow->status}}
              @endif
            </td>
            <td scope="col">{{ $borrow->request_processed_at }} </td>
            <td scope="col">{{ $borrow->request_managed_by  }} </td>
            <td scope="col">{{ $borrow->returned_at }} </td>
            <td scope="col">{{ $borrow->return_managed_by  }} </td>
            <td scope="col"> 
              @if ( $borrow->status == 'PENDING' )
                <form action="{{ route('approve') }}" method="GET">
                  <input name="deadline" type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" placeholder="" value="{{ old('deadline', $borrow->deadline) }}">
                  <br>
                  <input type="hidden" name="id" required value="{{$borrow->id}}"/>
                  <button type="submit" class="btn btn-success">Approve</button>
                </form>
                <br>
                <form action="{{ route('reject') }}" method="GET">
                  <input type="hidden" name="id" required value="{{$borrow->id}}"/>
                  <button type="submit" class="btn btn-danger">Reject</button>
                </form>
              @elseif( $borrow->status == 'RETURNED' )
                <form action="{{ route('approve') }}" method="GET">
                  <input name="deadline" type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" placeholder="" value="{{ old('deadline', $borrow->deadline) }}">
                  <input type="hidden" name="id" required value="{{$borrow->id}}"/>
                  <button type="submit" class="btn btn-success">Approve</button>
                </form>
              @endif
              {{ $borrow->deadline  }} 


            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @endsection
