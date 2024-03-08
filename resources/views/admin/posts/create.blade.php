
@extends('admin.layouts.app')

@section('title', 'Criar Novo Post')

@section('content')

<h1>Cadastrar novo post</h1>

<form action="{{ route('posts.store') }}" method="post">

    @include('admin.posts._partials.form')

</form>

@endsection
