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
                                Users</a>
                            <div class="col">
                                <form method="get" action="{{route('users.index')}}"
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
                            <a type="submit" class="float-right" href="{{route('users.create')}}">

                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full">
                                    Create New User &nbsp; <i class=" fa-solid fa-arrow-right"></i></button>

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
                                        User Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Full Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Email
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1"
                                                     aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                                    <path
                                                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/>
                                                </svg>
                                            </a>
                                        </div>
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
                                @foreach($users as $user)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap dark:text-white">
                                            {{$i++}}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap dark:text-white">
                                            {{$user->username}}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap dark:text-white">
                                            {{$user->first_name}} {{$user->last_name}}
                                        </th>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{$user->email}}
                                        </td>

                                        <td class="px-6 py-4 text-right">
                                            <div class="flex space-x-2">

                                                <a href="{{route('users.edit',$user->id)}}"
                                                   style="text-decoration: none !important;"
                                                   class=" no-underline px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-lg">Edit</a>

                                                <form
                                                    class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                                    method="POST"
                                                    action="{{ route('users.destroy', $user->id) }}"
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
