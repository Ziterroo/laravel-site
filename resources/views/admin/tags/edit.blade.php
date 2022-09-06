@extends('admin.layouts.layout')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Редактирование тега</h3>
                </div>
                <form action="{{ route('tags.update', $tag->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="admin-tag-edit">Название тега</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="admin-tag-edit" name="title"
                                   value="{{ old('title', $tag->title) }}">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary ">Редактировать тег</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
