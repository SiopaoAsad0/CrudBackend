@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <form action="{{ route('posts.create') }}" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        
        <label for="body">Body</label>
        <textarea name="body" id="body"></textarea>
        
        <button type="submit">Submit</button>
    </form>
@endsection
