@extends('partials.layout')
@section('content')
    <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
    <table class="table table-zebra">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{$post->id}}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{$post->title}}</td>
            </tr>
            <tr>
                <th>Content</th>
                <td>{{$post->body}}</td>
            </tr>
            <tr>
                <th>Created</th>
                <td>{{$post->created_at}}</td>
            </tr>
            <tr>
                <th>Updated</th>
                <td>{{$post->updated_at}}</td>
            </tr>
        </tbody>
    </table>
@endsection