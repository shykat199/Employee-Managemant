@extends('layouts.admin.app')

@section('section')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <a class="float-left font-extra-bold">New City</a>
                    </div>
                    <div>
                        <a type="submit" class="float-right" href="{{route('cities.index')}}">

                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full">
                                &nbsp; <i class="fa-sharp fa-solid fa-arrow-left"></i> &nbsp; Back
                            </button>

                        </a>
                    </div>
                </div>


                <div class="card-body">

                    <div class="container">


                        <form method="POST" action="{{ route('cities.update',$city->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-end">{{ __('City Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{$city->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-end">{{ __('State Name') }}</label>

                                <div class="col-md-6">
                                    <select name="state_id" id="state_id" class="bg-white border border-gray-300
                                    text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                    w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Choose A State</option>
                                        @foreach($states as $state)

                                            <option value="{{$state->id}}"
                                                {{$city->state_id === $state->id ? 'selected':''}}
                                            >
                                                {{$state->name}}
                                            </option>

                                        @endforeach
                                    </select>

                                    @error('state_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button
                                        class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-3 rounded-lg">
                                        &nbsp; Register &nbsp; <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- /.container-fluid -->

@endsection

@section('script')

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

@endsection
