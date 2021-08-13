@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new task</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('task.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title"
                                           value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="detail" class="col-md-4 col-form-label text-md-right">Detail</label>

                                <div class="col-md-6">
                                    <textarea id="detail" type="text"
                                              class="form-control @error('detail') is-invalid @enderror" name="detail"
                                              value="{{ old('detail') }}" autocomplete="detail"></textarea>

                                    @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="day"
                                       class="col-md-4 col-form-label text-md-right">Day</label>

                                <div class="col-md-6 row row-cols-2">
                                    @for($i = 0; $i < 7; $i++)
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="day_{{ $i }}" name="day"
                                                   class="custom-control-input" value="{{ $i }}">
                                            <label class="custom-control-label"
                                                   for="day_{{ $i }}">{{ \MyHelper::instance()->convertDay( $i ) }}</label>
                                        </div>
                                    @endfor

                                    @error('day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time"
                                       class="col-md-4 col-form-label text-md-right">Time</label>

                                <div class="col-md-6">
                                    <input id="time" type="time"
                                           class="form-control @error('time') is-invalid @enderror" name="time"
                                           required>

                                    @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
