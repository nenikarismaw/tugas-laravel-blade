@extends('layout.master')
@section('content')
    <div class="ml-3 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Questions Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success" >
                        {{ session('success') }}
                    </div>
                @endif
                <a href="{{ route('pertanyaan.create') }}" class="btn btn-primary mb-3">Add New Question</a>
                <table class="table table-bordered">
                <thead>                  
                    <tr>
                    <th style="width: 10px">No</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th style="width: 40px">Action</th>
                    </tr>
                </thead>
                <tbody> 
                    @forelse($questions as $key => $question)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$question -> judul}}</td>
                            <td>{{$question -> isi}}</td>
                            <td style="display: flex;">
                                <a href="{{ route('pertanyaan.show', ['pertanyaan' => $question->id]) }}" class="btn btn-info btn-sm">show</a>
                                <a href="{{ route('pertanyaan.edit', ['pertanyaan' => $question->id])}}" class="btn btn-default btn-sm">edit</a>
                                <form action="{{ route('pertanyaan.destroy', ['pertanyaan' => $question->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" align="center">
                                No Datas
                            </td>
                        </tr>
                    @endforelse
                </tbody> 
                </table>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div> -->
        </div>
    </div>
@endsection