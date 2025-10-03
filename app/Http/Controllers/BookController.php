<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Pastikan nama model sesuai
use App\Models\Bookss;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $penulis = $request->input('author');
        $keyword = $request->input('keyword');
        $title   = $request->input('title');   

        $query = Bookss::query();

        if ($penulis) {
            $query->where('author', $penulis);
        }

        if ($keyword) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        $book_data = $query->get();

        $daftar_penulis = Bookss::select('author')->distinct()->get();

        $total_books   = $book_data->count();
        $total_price   = $book_data->sum('price');
        $average_price = $book_data->avg('price');
        $max_price     = $book_data->max('price');
        $min_price     = $book_data->min('price');

        
        return view('books.index', compact(
            'book_data',
            'daftar_penulis',
            'penulis',
            'keyword',
            'title',
            'total_books',
            'total_price',
            'average_price',
            'max_price',
            'min_price'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi sederhana
        $request->validate([
            'title'          => 'required|string|max:255',
            'author'         => 'required|string|max:255',
            'price'          => 'required|numeric',
            'published_date' => 'required|date',
        ]);

        $book = new Bookss();
        $book->title          = $request->input('title');
        $book->author         = $request->input('author');
        $book->price          = $request->input('price');
        $book->published_date = $request->input('published_date'); // konsisten dengan form
        $book->save();

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit( $id)
    {
        $book = Bookss::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'author'         => 'required|string|max:255',
            'price'          => 'required|numeric',
            'published_date' => 'required|date',
        ]); 

        $book = Bookss::findOrFail($id);
        $book-> update([
            'title'          => $request->input('title'),
            'author'         => $request->input('author'),
            'price'          => $request->input('price'),
            'published_date' => $request->input('published_date'),
        ]);
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $book = Bookss::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
