@extends('layouts.admin')


@section('content')

@include('partials.session_message')

<div class="heading d-flex justify-content-between align-items-center pt-5">
    <h1>DC - Characters</h1>
    <a class="btn btn-primary" href="{{route('admin.characters.create')}}" role="button">Create</a>
</div>
<table class="table table-striped table-light">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cover Image</th>
            <th>Title</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        @foreach($characters as $character)
        <tr>
            <td scope="row">{{$character->id}}</td>
            <td> <img width="50" src="{{$character->cover}}" alt=""></td>
            <td>{{$character->title}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('admin.characters.show', $character->id)}}"><i class="fas fa-eye fa-lg fa-fw"></i></a>

                <a class="btn btn-secondary" href="{{route('admin.characters.edit', $character->id)}}"><i class="fas fa-pencil-alt fa-lg fa-fw"></i></a>



                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#character_delete_modal_{{$character->id}}">
                    <i class="fas fa-trash fa-lg fa-fw"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="character_delete_modal_{{$character->id}}" tabindex="-1" role="dialog" aria-labelledby="delete_character_{{$character->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Character {{$character->title}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Operazione distruttiva irreversibile!! sei sicuro di voler continuare?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{route('admin.characters.destroy', $character->id)}}" method="post">
                                    @csrf
                                    @method("DELETE")

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

<div class="">
    {{$characters->links()}}
</div>

@endsection