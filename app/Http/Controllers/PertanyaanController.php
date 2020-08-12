<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pertanyaan;
use Auth;
class PertanyaanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function create() {
        return view('pertanyaan.create');
    }
    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'judul' => 'required|unique:questions',
            'isi' => 'required'
        ]);

        // $query = DB::table('questions')->insert([
        //     "judul" => $request["judul"],
        //     "isi" => $request["isi"]
        // ]);

        // $pertanyaan = new Pertanyaan;
        // $pertanyaan->judul = $request["judul"];
        // $pertanyaan->isi = $request["isi"];
        // $pertanyaan->save();
        $pertanyaan = Pertanyaan::create([
            "judul" => $request["judul"],
            "isi" => $request["isi"],
            "user_id" => Auth::id()
        ]);
        return redirect('/pertanyaan')->with('success', 'Successfully Saved!');
    }
    public function index() {
        // $questions = DB::table('questions')->get();
        // dd($questions);
        $questions = Pertanyaan::all();
        return view('pertanyaan.index', compact('questions'));
    }
    public function show($id) {
        // $questions = DB::table('questions')->where('id', $id)->first();
        $questions = Pertanyaan::find($id);
        return view('pertanyaan.show', compact('questions'));
    }
    public function edit($id) {
        // $questions = DB::table('questions')->where('id', $id)->first();
        $questions = Pertanyaan::find($id)->first();
        return view('pertanyaan.edit', compact('questions'));
    }
    public function update($id, Request $request) {
        $request->validate([
            'judul' => 'required|unique:questions',
            'isi' => 'required',
        ]);

        // $query = DB::table('questions')->where('id', $id)
        //             ->update([
        //                 'judul'=>$request['judul'],
        //                 'isi'=>$request['isi']
        //             ]);
        $query = Pertanyaan::where('id', $id)->update([
            "judul" => $request["judul"],
            "isi" => $request["isi"]
        ]);
        return redirect('/pertanyaan')->with('success', 'Successfully Updated!');;
    }
    public function destroy($id) {
        // $query = DB::table('questions')->where('id', $id)->delete();
        $query = Pertanyaan::find($id);
        $query->delete();
        return redirect('pertanyaan')->with('success', 'Successfully Deleted!');
    }
}
