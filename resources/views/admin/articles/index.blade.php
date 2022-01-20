@extends('layouts.app')


@section('content')

<div class="heading d-flex justify-content-between container">
    <h1>All Articles in a table</h1>
    <a class="btn btn-primary" href="{{route('admin.articles.create')}}" role="button">Create</a>
</div>


@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Create At</th>
                <th>Updated At</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td scope="row">{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->created_at}}</td>
                <td>{{$article->updated_at}}</td>
                <td>
                    <a class="btn btn-primary" title="View post" href="{{route('admin.articles.show', $article->id)}}"><i class="fas fa-eye"></i> </a>

                    <a class="btn btn-secondary" href="{{route('admin.articles.edit', $article->id)}}"> <i class="fas fa-pencil-alt"></i> </a>


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$article->id}}">
                        <i class="fas fa-trash"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="delete{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$article->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Article {{$article->title}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        ⚡ Attenzione questa operazione non puo essere annullata!
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{route('admin.articles.destroy', $article->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    {{$posts->links()}}
</div>

@endsection