@extends('layouts\main')

@section('container')

    <!-- content -->
    <div class="row content m-5">

        <!-- profile info -->
        <section class="profile-info col-lg-4">
            <div class="container">
                <div class="row">
                    <div class="card p-0">
                        <div class="img1">
                            <img src="img/Banner.png" alt="">
                        </div>
                        <div class="img2 position-relative">
                            <img src="img/comics-haikyuu.png" alt="">
                        </div>
                        <div class="main-text text-center position-relative">
                            <h3 class="fw-bold">{{ auth()->user()->user_name }}</h3>
                            <p>{{ auth()->user()->username }}</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class=" card card2 p-5">
                        <div class="text-center d-flex flex-column justify-content-center align-items-center">
                            <h3 class="mb-5 fw-bold">User Information</h3>
                            <div class="info-block">
                                <h5 class="fw-semibold">Name</h5>
                                <p>{{ auth()->user()->user_name }}</p>
                            </div>
                            <div class="info-block">
                                <h5 class="fw-semibold">Username</h5>
                                <p>{{ auth()->user()->username }}</p>
                            </div>
                            <div class="info-block">
                                <h5 class="fw-semibold">Email</h5>
                                <p>{{ auth()->user()->email }}</p>
                            </div>
                            <div class="info-block">
                                <h5 class="fw-semibold">Phone</h5>
                                <p>{{ auth()->user()->user_phoneNumber }}</p>
                            </div>
                            <div class="info-block">
                                <h5 class="fw-semibold">Address</h5>
                                <p>{{ auth()->user()->address }}</p>
                            </div>
                            <a class="nav-link btn-second mt-lg-0 mt-2" href="/editprofile">
                                Edit profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- tabbed nav -->
        <section class="tabbed-nav col-lg-8 mt-5 mt-lg-0">
            <div class="container">
                <div class="row mb-3 justify-content-end">
                    <a class="nav-link btn-prim w-25" href="/uploadbook">
                        + Sell books
                    </a>
                </div>
                <div class="row">
                    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Purchase</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Selling</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-bg">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Purchase date</th>
                                            <th scope="col">Picture</th>
                                            <th scope="col">Book title</th>
                                            <th scope="col">Seller</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Receipt number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td><a href="other-user.html">Mark</a></td>
                                            <td>Otto</td>
                                            <td>@mdo</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                            <td><a href="#">Mark</a></td>
                                            <td>Otto</td>
                                            <td>@mdo</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry the Bird</td>
                                            <td>@twitter</td>
                                            <td>Mark</td>
                                            <td><a href="#">Mark</a></td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-bg">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Posting date</th>
                                            <th scope="col">Picture</th>
                                            <th scope="col">Book title</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Sold date</th>
                                            <th scope="col">Buyer</th>
                                            <th scope="col">Receipt number</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td class="d-flex flex-column justify-content-between">
                                                <a class="btn btn-secondary" href="#" role="button">Edit</a>
                                                <a class="btn btn-outline-secondary my-2" href="enter-receipt.html"
                                                    role="button">Add
                                                    receipt</a>
                                                <a class="btn btn-danger" href="#">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td class="d-flex flex-column justify-content-between">
                                                <a class="btn btn-secondary" href="#" role="button">Edit</a>
                                                <a class="btn btn-outline-secondary my-2" href="#" role="button">Add
                                                    receipt</a>
                                                <a class="btn btn-danger" href="#">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry the Bird</td>
                                            <td>@twitter</td>
                                            <td>Mark</td>
                                            <td>Mark</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td class="d-flex flex-column justify-content-between">
                                                <a class="btn btn-secondary" href="#" role="button">Edit</a>
                                                <a class="btn btn-outline-secondary my-2" href="#" role="button">Add
                                                    receipt</a>
                                                <a class="btn btn-danger" href="#">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection