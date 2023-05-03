@extends('layouts.appDashboard')
@section('title', 'Управление отпуском')

@section('content')
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4>Создать отпуск</h4>
        </div>
        <div class="mt-2 p-0">
            <form method="post" action="{{ route('vacations.add') }}">
                @csrf

                <div>
                    <label for="start_date">Начало:</label>
                    <input {{ Auth::user()->vacation?->approved ? 'disabled' : '' }} type="date" id="start_date"
                        name="start_date" min="{{ date('Y-m-d') }}"
                        value="{{ Auth::user()->vacation ? Auth::user()->vacation->start_date : '' }}">
                </div>

                <div class="mt-3">
                    <label for="end_date">Конец: </label>
                    <input {{ Auth::user()->vacation?->approved ? 'disabled' : '' }} type="date" id="end_date"
                        name="end_date" min="{{ date('Y-m-d') }}"
                        value="{{ Auth::user()->vacation ? Auth::user()->vacation->end_date : '' }}">
                </div>

                <div class="mt-3">
                    <button {{ Auth::user()->vacation?->approved ? 'disabled' : '' }} type="submit"
                        class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
