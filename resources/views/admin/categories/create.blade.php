@extends('admin.layouts.layout')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Создание категории</h3>
                </div>

                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="admin-category">Название категории</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="admin-category" placeholder="Название категории" name="title"
                                   value="{{ old('title') }}">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary ">Создать категорию</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
