@extends('layouts.base')

@section('content')

{{-- <form action="{{ route('approve') }}" method="GET">
    <input type="text" name="search" required/>
    <button type="submit">Search</button>
</form> --}}
<table class="table">
    <thead>
      <tr>
        <th scope="col">Book Name</th>
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
            <td scope="col">
                @foreach ($books as $book)
                    @if ($book->id == $borrow->book_id)
                        {{ $book->title }}
                    @endif
                @endforeach
            </td>
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
              {{ $borrow->deadline }}
            </td>
            <td scope="col">
                @if ($borrow->status == 'PENDING' or $borrow->status == 'REJECTED' or $borrow->status == 'RETURNED')
                    <button type="submit" class="btn btn-primary" disabled>{{$status}}</button>
                @elseif ($borrow->status == 'ACCEPTED')
                    <form action="{{ route('return') }}" method="GET">
                        <input type="hidden" name="book_id" required value="{{$borrow->book_id}}"/>
                        <button type="submit" class="btn btn-primary">RETURN</button>
                    </form>
                @endif
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @endsection
