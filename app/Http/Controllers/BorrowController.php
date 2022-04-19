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

    // public function __construct()
    // {
    //     $this->authorizeResource(Borrow::class, 'borrow');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $this->middleware('auth');
        if (Auth::id() and User::where('id', Auth::id())->first()->is_librarian == 1) {
            $admin_id = Auth::id();
            error_log($admin_id);
            $data['borrows'] =  Borrow::where('request_managed_by', $admin_id)->orwhereNull('request_managed_by')->get();
            return view('borrows.index', $data);
        }else {
            return view('auth.login');
        }
        
    }

    public function rentals()
    {
        //
        if (Auth::id() ) {
            $user_id = Auth::id();
            $data['borrows'] =  Borrow::where('reader_id', $user_id)->get();

            // Full book details of borrowed books
            $book_ids = array();
            foreach ($data['borrows'] as $borrow ) {
                array_push($book_ids, $borrow->book_id );
            }
            $data['books'] = Book::whereIn('id', $book_ids)->get();

            return view('borrows.user-rental', $data);
        } else {
            return view('auth.login');
        }
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
        if (Auth::id() and User::where('id', Auth::id())->first()->is_librarian == 1) {
            $borrow = new Borrow;
            $borrow->reader_id = Auth::id();
            $borrow->book_id = $request->book_id;
            $borrow->request_processed_at = Carbon::now();
            $borrow->status = 'PENDING';
            error_log($borrow);
            $borrow->save();
            return redirect()->route('books.show', $borrow->book_id);
        } else {
            return view('auth.login');
        }
    }

    public function approve(Request $request)
    {
        if (Auth::id() and User::where('id', Auth::id())->first()->is_librarian == 1) {
            $borrow = Borrow::where('id', $request->id)->first();
            if ($borrow->status == 'PENDING') {

                $book = Book::where('id', $borrow->book_id)->first();
                
                if ($book->in_stock>1) {
                    $book->in_stock = $book->in_stock - 1;
                    $book->save();
                    $borrow->status = 'ACCEPTED';
                    $borrow->request_managed_by = User::where('id', Auth::id())->first()->id;
                } else {
                    return redirect()->route('borrows.reject');
                }

            } else if ($borrow->status == 'RETURNED') {

                $book = Book::where('id', $borrow->book_id)->first();
                $book->in_stock = $book->in_stock + 1;
                $book->save();

                $borrow->status = null;
                $borrow->return_managed_by = User::where('id', Auth::id())->first()->id;
                error_log('return finished');
            }
            
            $borrow->deadline = $request->deadline;
            error_log($borrow);
            $borrow->save();
            error_log('approved');
            return redirect()->route('borrows.index');
        } else {
            return view('auth.login');
        }
    }

    public function reject(Request $request)
    {
        
        if (Auth::id() and User::where('id', Auth::id())->first()->is_librarian == 1) {
            $borrow = Borrow::where('id', $request->id)->first();
            $borrow->status = 'REJECTED';
            $borrow->save();
            return redirect()->route('borrows.index');
        } else {
            return view('auth.login');
        }
    }

    public function return(Request $request)
    {
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
