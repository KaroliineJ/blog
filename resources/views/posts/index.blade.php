@extends('partials.layout')
@section('content')
    <a href="{{route('posts.create')}}" class="btn btn-primary">Add Post</a>
    <div class="flex justify-center">
        {{ $posts->links() }}
    </div>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Updated</th>
                <th>Created</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <div class="join">
                            <button class="btn join-item btn-info">View</button>
                            <button class="btn join-item btn-warning">Edit</button>
                            <button class="btn join-item btn-error">Delete</button>
                          </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Updated</th>
                    <th>Created</th>
                    <th>Actions</th>
            </tfoot>
        </table>
    </div>
@endsection
