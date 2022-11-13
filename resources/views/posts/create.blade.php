@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header text-center">ADD NEW MOVIE</div>
                <div class="card-body text-center text-muted">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Hey, in here, you can add a new movie! cool righ?!!') }}
                </div>
            </div>

            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            <div class="card-body">
                <form method="post" action="{{route('post.store')}}">
                    @csrf

                    <div class="form-group row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Movie Title') }}</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" required>
                            <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Movie Description') }}</label>
                        <div class="col-md-6">
                            <textarea id="description" class="form-control" name="description" rows="3" required></textarea>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('add movie') }}
                                </button>
                            </div>
                        </div>

                </form>
            </div>        

        </div>
    </div>
</div>
@endsection