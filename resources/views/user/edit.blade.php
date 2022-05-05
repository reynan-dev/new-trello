@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('edit.update', Auth::user()->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Edit Email
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div id="edit-email">
                                        <div class="row mb-3">
                                            <label for="new-email" class="col-md-4 col-form-label text-md-end">{{ __('New email') }}</label>
            
                                            <div class="col-md-6">
                                                <input id="new-email" type="email" class="form-control @error('new-email') is-invalid @enderror" name="new-email" autofocus>
            
                                                @error('new-email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
            
                                        <div class="row mb-3">
                                            <label for="confirm-email" class="col-md-4 col-form-label text-md-end">{{ __('Confirm new email') }}</label>
            
                                            <div class="col-md-6">
                                                <input id="confirm-email" type="email" class="form-control @error('confirm-email') is-invalid @enderror" name="confirm-email" autofocus>
            
                                                @error('confirm-email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Edit Password
                                </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row mb-3">
                                        <label for="new-password" class="col-md-4 col-form-label text-md-end">{{ __('New password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="new-password" type="password" class="form-control @error('new-password') is-invalid @enderror" name="new-password">
            
                                            @error('new-password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="confirm-password" class="col-md-4 col-form-label text-md-end">{{ __('Confirm new password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="confirm-password" type="password" class="form-control @error('confirm-password') is-invalid @enderror" name="confim-password">
            
                                            @error('confirm-password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                            </div>
                              </div>
                            </div>
                          </div>

                        </div>
                        

                        <div class="row mb-3">
                            <label for="current-'password'" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control @error('current-password') is-invalid @enderror" name="current-password">

                                @error('current-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row" style="display:flex; justify-content:center;">
                            <button type="submit" class="btn btn-primary" style="width:fit-content;">
                                {{ __('Modifier') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

