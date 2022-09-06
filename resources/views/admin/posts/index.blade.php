@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Статьи</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Список статей</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Создать статью</a>
                @if(count($posts))
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">id</th>
                            <th>Наименование</th>
                            <th>Категория</th>
                            <th>Теги</th>
                            <th>Описание</th>
                            <th>Дата</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td>{{ $post->tags->pluck('title')->join(', ')}}</td>
                                <td>{{ $post->description}}</td>
                                <td>{{ $post->created_at}}</td>
                                <td>
                                    <a href="{{ route('posts.edit', ['post' => $post->id ]) }}">
                                        <i class="fa fa-edit float-left mr-2 pt-1" aria-hidden="true"></i></a>
                                    <form action="{{ route('posts.destroy', ['post' => $post->id ]) }}"
                                          class="float-none" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer clearfix">
                        {{ $posts->links() }}
                    </div>
                @else
                    <p>Статьи пока нет...</p>
                @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
