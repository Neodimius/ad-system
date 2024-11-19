@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Дошка оголошень</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-4">
            <form method="GET" action="{{ route('ads.index') }}">
                <div class="row g-3">
                    <div class="col-md-4">
                        <select name="category" class="form-select">
                            <option value="">Всі категорії</option>
                            <option value="Auto" {{ request('category') == 'Auto' ? 'selected' : '' }}>Auto</option>
                            <option value="Animals" {{ request('category') == 'Animals' ? 'selected' : '' }}>Animals</option>
                            <option value="Tech" {{ request('category') == 'Tech' ? 'selected' : '' }}>Tech</option>
                            <option value="Other" {{ request('category') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-secondary w-100">Фільтрувати</button>
                    </div>
                </div>
            </form>
        </div>

        <a href="{{ route('ads.create') }}" class="btn btn-primary mb-4">Додати оголошення</a>

        <div class="row g-3">
            @forelse ($ads as $ad)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ad->title }}</h5>
                            <p class="card-text">{{ $ad->description }}</p>
                            <p><strong>Категорія:</strong> {{ $ad->category }}</p>
                            <p><small>Опубліковано: {{ $ad->published_at }}</small></p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('ads.edit', $ad->id) }}" class="btn btn-warning btn-sm">Редагувати</a>
                                <form action="{{ route('ads.destroy', $ad->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Оголошень поки немає.</p>
            @endforelse
        </div>
    </div>
@endsection
