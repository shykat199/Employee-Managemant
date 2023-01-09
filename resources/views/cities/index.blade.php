@extends('layouts.admin.app')

@section('section')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <a class="float-left font-extrabold " style="text-decoration: none; color: inherit;">All
                                Cities</a>
                            <div class="col">
                                <form method="get" action="{{route('cities.index')}}"
                                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-1 small"
                                               placeholder="Search for..."
                                               name="search"
                                               aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class=" no-underline px-4 py-2 bg-blue-700
                                            hover:bg-blue-600 text-white rounded-r">Search</button>
                                            {{-- <button class="btn btn-primary" type="button">--}}
                                            {{--Search--}}
                                            {{--</button>--}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col">
                            <a type="submit" class="float-right" href="{{route('cities.create')}}">

                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full">
                                    Create New City &nbsp; <i class=" fa-solid fa-arrow-right"></i></button>

                            </a>

                        </div>
                    </div>

                </div>


                <div class="card-body">

                    <div class="container">

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        City Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        State Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center ml-5">
                                            Action
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach($cities as $city)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap dark:text-white">
                                            {{$i++}}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap dark:text-white">
                                            {{$city->name}}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap dark:text-white">
                                            {{$city->state->name}}
                                        </th>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex space-x-2">

                                                <a href="{{route('cities.edit',$city->id)}}"
                                                   style="text-decoration: none !important;"
                                                   class=" no-underline px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-lg">Edit</a>

                                                <form
                                                    class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                                    method="POST"
                                                    action="{{ route('cities.destroy', $city->id) }}"
                                                    onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>

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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>

@endsection
