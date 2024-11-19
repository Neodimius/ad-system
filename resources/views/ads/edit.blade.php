@php use Illuminate\Support\Carbon; @endphp
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Редагувати оголошення</h1>

        <form action="{{ route('ads.update', $ad->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $ad->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Опис</label>
                <textarea name="description" class="form-control" id="description"
                          required>{{ $ad->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Категорія</label>
                <select name="category" class="form-select" id="category" required>
                    <option value="Auto" {{ $ad->category == 'Auto' ? 'selected' : '' }}>Auto</option>
                    <option value="Animals" {{ $ad->category == 'Animals' ? 'selected' : '' }}>Animals</option>
                    <option value="Tech" {{ $ad->category == 'Tech' ? 'selected' : '' }}>Tech</option>
                    <option value="Other" {{ $ad->category == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="published_at" class="form-label">Дата публікації</label>
                <input type="date" name="published_at" class="form-control" id="published_at"
                       value="{{ $ad->published_at ? Carbon::parse($ad->published_at)->format('Y-m-d') : '' }}">
            </div>
            <button type="submit" class="btn btn-primary">Оновити</button>
            <a href="{{ route('ads.index') }}" class="btn btn-secondary">Назад</a>
        </form>
    </div>
@endsection
