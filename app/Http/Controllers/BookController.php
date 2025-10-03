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
        // Ambil parameter filter & pencarian dari request
        $penulis = $request->input('author');   // dropdown penulis
        $keyword = $request->input('keyword');  // pencarian judul
        $title   = $request->input('title');    // nama untuk judul halaman

        // Query dasar
        $query = Bookss::query();

        // Filter penulis
        if ($penulis) {
            $query->where('author', $penulis);
        }

        // Pencarian berdasarkan judul
        if ($keyword) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        // Ambil data sesuai filter & pencarian
        $book_data = $query->get();

        // Daftar penulis untuk dropdown
        $daftar_penulis = Bookss::select('author')->distinct()->get();

        // Statistik dari hasil query
        $total_books   = $book_data->count();
        $total_price   = $book_data->sum('price');
        $average_price = $book_data->avg('price');
        $max_price     = $book_data->max('price');
        $min_price     = $book_data->min('price');

        // Kirim data ke view
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

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
