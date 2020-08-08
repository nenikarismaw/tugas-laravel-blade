<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PertanyaanController extends Controller
{
    //
    public function create() {
        return view('pertanyaan.create');
    }
    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'judul' => 'required|unique:questions',
            'isi' => 'required',
        ]);

        $query = DB::table('questions')->insert([
            "judul" => $request["judul"],
            "isi" => $request["isi"]
        ]);
        return redirect('/pertanyaan')->with('success', 'Successfully Saved!');
    }
    public function index() {
        $questions = DB::table('questions')->get();
        // dd($questions);
        return view('pertanyaan.index', compact('questions'));
    }
    public function show($id) {
        $questions = DB::table('questions')->where('id', $id)->first();
        return view('pertanyaan.show', compact('questions'));
    }
    public function edit($id) {
        $questions = DB::table('questions')->where('id', $id)->first();
        return view('pertanyaan.edit', compact('questions'));
    }
    public function update($id, Request $request) {
        $request->validate([
            'judul' => 'required|unique:questions',
            'isi' => 'required',
        ]);

        $query = DB::table('questions')->where('id', $id)
                    ->update([
                        'judul'=>$request['judul'],
                        'isi'=>$request['isi']
                    ]);
        return redirect('/pertanyaan')->with('success', 'Successfully Updated!');;
    }
    public function destroy($id) {
        $query = DB::table('questions')->where('id', $id)->delete();
        return redirect('pertanyaan')->with('success', 'Successfully Deleted!');
    }
}
