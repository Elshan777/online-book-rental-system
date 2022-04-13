<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BorrowFormRequest;
use Illuminate\Support\Facades\Auth;
Use \Carbon\Carbon;




class BorrowController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

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
        error_log($borrow);
        $borrow->save();
        // error_log($borrow);
        // $project = Borrow::create([$borrow]);
        return redirect()->route('books.show', $borrow->book_id);
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
