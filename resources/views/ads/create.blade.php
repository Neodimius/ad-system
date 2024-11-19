@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Додати оголошення</h1>

        <form action="{{ route('ads.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Опис</label>
                <textarea name="description" class="form-control" id="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Категорія</label>
                <select name="category" class="form-select" id="category" required>
                    <option value="Auto">Auto</option>
                    <option value="Animals">Animals</option>
                    <option value="Tech">Tech</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="published_at" class="form-label">Дата публікації</label>
                <input type="date" name="published_at" class="form-control" id="published_at">
            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
            <a href="{{ route('ads.index') }}" class="btn btn-secondary">Назад</a>
        </form>
    </div>
@endsection
