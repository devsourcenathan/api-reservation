<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $books = Booking::paginate(100);

        return BookingResource::collection($books);
        
    }

    public function find($param)
    {
        
        $books = Booking::select('*')
                    ->where('noms', 'LIKE','%'.$param.'%')
                    ->orWhere('prenom', 'LIKE','%'.$param.'%')
                    ->orWhere('n_table', 'LIKE','%'.$param.'%')
                    ->orWhere('table', 'LIKE','%'.$param.'%')
                    ->get();
        return new BookingResource($books);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->file("image");
        $book = new Booking();


        
        $data = $request;
        //$data = json_decode($request->data);

        $book->noms = $request->noms;
        $book->prenom = $request->prenom;
        $book->sexe = $request->sexe;
        $book->n_table = $request->n_table;
        $book->table = $request->table;
        

        if($book->save()){
            return new BookingResource($book);
        }
    }




}
