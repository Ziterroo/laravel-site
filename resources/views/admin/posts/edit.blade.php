@extends('admin.layouts.layout')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Редактирование статьи</h3>
                </div>

                <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="admin-category">Название статьи</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="admin-category" placeholder="Название категории" name="title"
                                   value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="admin-post-desc">Описание статьи</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                      id="admin-post-desc" rows="2" placeholder="Контент статьи">
                                {{ $post->description }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="admin-post-content">Контент статьи</label>
                            <textarea class="form-control  @error('content') is-invalid @enderror" name="content"
                                      id="admin-post-content" rows="4"
                                      placeholder="Контент статьи">
                               {{ $post->content }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="admin-post-category">Категория</label>
                            <select class="custom-select rounded-0" id="admin-post-category" name="category_id">
                                <option>Выберите категорию</option>
                                @foreach($categories as $id => $title)
                                    <option value="{{ $id }}"
                                            @if($id == $post->category_id) selected @endif>{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="admin-post-tag">Теги</label>
                            <select class="select2" id="admin-post-tag" multiple="multiple" name="tags[]"
                                    style="width: 100%;">
                                @foreach($tags as $id => $title)
                                    <option value="{{ $id }}"
                                            @if(in_array($id, $post->tags->pluck('id')->all())) selected @endif>{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                <label class="custom-file-label" for="exampleInputFile">Добавить изображение</label>
                            </div>
                        </div>
                        <div class="#"><img src="{{ $post->defaultImage() }}" alt="image"></div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary ">Редактировать статью</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
