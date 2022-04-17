<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\BorrowFormRequest;
use Illuminate\Support\Facades\Auth;
Use \Carbon\Carbon;




class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admin_id = Auth::id();
        error_log($admin_id);
        $data['borrows'] =  Borrow::where('request_managed_by', $admin_id)->orwhereNull('request_managed_by')->get();
        error_log($data['borrows'] );
        return view('borrows.index', $data);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
        
    //     // return redirect()->route('books.index');
    // }
    public function create_request(Request $request)
    {
        # code...
        error_log('incoming');
        // $validated_data = $request->validated();
        error_log('-----------Reader ID-----------');
        error_log($request->book_id);
        error_log('validated');
        

        $borrow = new Borrow;
        $borrow->reader_id = Auth::id();
        $borrow->book_id = $request->book_id;
        $borrow->request_processed_at = Carbon::now();
        $borrow->status = 'PENDING';
        error_log($borrow);
        $borrow->save();
        return redirect()->route('books.show', $borrow->book_id);
    }

    public function approve(Request $request)
    {
        # code...
        error_log('incoming');
        error_log($request->id);
        error_log($request->deadline);
        $borrow = Borrow::where('id', $request->id)->first();
        if ($borrow->status == 'PENDING') {
            
            $borrow->status = 'ACCEPTED';
            $borrow->request_managed_by = User::where('id', Auth::id())->first()->id;

        } else if ($borrow->status == 'RETURNED') {
            $borrow->status = null;
            $borrow->return_managed_by = User::where('id', Auth::id())->first()->id;
            error_log('return finished');
        }
        
        $borrow->deadline = $request->deadline;
        error_log($borrow);
        $borrow->save();
        error_log('approved');
        return redirect()->route('borrows.index');
    }

    public function reject(Request $request)
    {
        # code...
        error_log($request->id);
        $borrow = Borrow::where('id', $request->id)->first();
        error_log($borrow);
        $borrow->status = 'REJECTED';
        error_log($borrow);
        $borrow->save();
        error_log('rejected');
        return redirect()->route('borrows.index');
    }

    public function return(Request $request)
    {
        # code...
        $user_id = Auth::id();
        error_log($request->book_id);
        $borrow = Borrow::where('reader_id', $user_id)->where('book_id', $request->book_id)->first();
        $borrow->status = 'RETURNED';
        $borrow->returned_at = Carbon::now();
        error_log($borrow);
        $borrow->save();
        error_log('rejected');
        return redirect()->route('books.index');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Borrow  $borrow
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Borrow $borrow)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Borrow  $borrow
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Borrow $borrow)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Borrow  $borrow
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Borrow $borrow)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Borrow  $borrow
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Borrow $borrow)
    // {
    //     //
    // }
}
