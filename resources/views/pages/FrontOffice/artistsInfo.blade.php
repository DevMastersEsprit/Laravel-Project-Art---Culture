@extends('layouts.front-office')
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100"
    style="margin-left: 20%; margin-right: 5%;">
    <div class="pt-7 pb-6 bg-cover"
        style="background-image: url('../assets/img/header-orange-purple.jpg'); background-position: bottom;">
    </div>
    <div class="container">
        <div class="card card-body py-2 bg-transparent shadow-none">
            <div class="row">
                {{-- <div class="col-auto">
                    <div
                        class="avatar avatar-2xl rounded-circle position-relative mt-n7 border border-gray-100 border-4">
                        <img src="../assets/img/team-2.jpg" alt="profile_image" class="w-100">
                    </div>
                </div> --}}
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h3 class="mb-0 font-weight-bold">
                            Artists that participate in our events
                        </h3>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 text-sm-end">
                    <a href="javascript:;" class="btn btn-sm btn-white">Cancel</a>
                    <a href="javascript:;" class="btn btn-sm btn-dark">Save</a>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="container my-3 py-3">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-xs border mb-4 pb-3">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0 font-weight-semibold text-lg">All artists</h6>
                        <p class="text-sm mb-1">Here you will find all our artists.</p>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            @foreach ($actors as $actor)
                                <div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
                                    <div
                                        class="card card-background border-radius-xl card-background-after-none align-items-start mb-4">
                                        <div class="full-background bg-cover"
                                            style="background-image: url('{{ asset("../actorPictures/$actor->profilePicture") }}')">
                                        </div>
                                        <span class="mask bg-dark opacity-1 border-radius-sm"></span>
                                        <div class="card-body text-start p-3 w-100">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div
                                                        class="blur shadow d-flex align-items-center w-100 border-radius-md border border-white mt-8 p-3">
                                                        <div class="w-50">
                                                            <p class="text-dark text-sm font-weight-bold mb-1">
                                                                {{ $actor->fullName }}</p>
                                                            <p class="text-xs text-secondary mb-0">
                                                                {{ $actor->birthDate }}</p>
                                                        </div>
                                                        <p class="text-dark text-sm font-weight-bold ms-auto">
                                                            <a
                                                                class="delete-object text-dark font-weight-semibold icon-move-right mt-auto w-100 mb-5">
                                                                Read more
                                                                <i class="fas fa-arrow-right-long text-sm ms-1"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Artist Information
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mt-n6 mb-6">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card blur border border-white mb-4 shadow-xs">
                                                            <div class="card-body p-4">
                                                                <div
                                                                    class="icon icon-shape bg-white shadow shadow-xs text-center border-radius-md d-flex align-items-center justify-content-center mb-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        height="19" width="19"
                                                                        viewBox="0 0 24 24" fill="currentColor">
                                                                        <path
                                                                            d="M11.584 2.376a.75.75 0 01.832 0l9 6a.75.75 0 11-.832 1.248L12 3.901 3.416 9.624a.75.75 0 01-.832-1.248l9-6z" />
                                                                        <path fill-rule="evenodd"
                                                                            d="M20.25 10.332v9.918H21a.75.75 0 010 1.5H3a.75.75 0 010-1.5h.75v-9.918a.75.75 0 01.634-.74A49.109 49.109 0 0112 9c2.59 0 5.134.202 7.616.592a.75.75 0 01.634.74zm-7.5 2.418a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75zm3-.75a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0v-6.75a.75.75 0 01.75-.75zM9 12.75a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75z"
                                                                            clip-rule="evenodd" />
                                                                        <path
                                                                            d="M12 7.875a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z" />
                                                                    </svg>
                                                                </div>
                                                                <p class="text-sm mb-1">Today's Revenue</p>
                                                                <h3 class="mb-0 font-weight-bold">$8,093.00</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card blur border border-white mb-4 shadow-xs">
                                                            <div class="card-body p-4">
                                                                <div
                                                                    class="icon icon-shape bg-white shadow shadow-xs text-center border-radius-md d-flex align-items-center justify-content-center mb-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        height="19" width="19"
                                                                        viewBox="0 0 24 24" fill="currentColor"">
                                                                        <path
                                                                            d=" M19.5 22.5a3 3 0 003-3v-8.174l-6.879 4.022 3.485 1.876a.75.75 0 01-.712 1.321l-5.683-3.06a1.5 1.5 0 00-1.422 0l-5.683 3.06a.75.75 0 01-.712-1.32l3.485-1.877L1.5 11.326V19.5a3 3 0 003 3h15z" />
                                                                        <path
                                                                            d="M1.5 9.589v-.745a3 3 0 011.578-2.641l7.5-4.039a3 3 0 012.844 0l7.5 4.039A3 3 0 0122.5 8.844v.745l-8.426 4.926-.652-.35a3 3 0 00-2.844 0l-.652.35L1.5 9.59z" />
                                                                    </svg>
                                                                </div>
                                                                <p class="text-sm mb-1">Marketing</p>
                                                                <h3 class="mb-0 font-weight-bold">$37,193.00</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card blur border border-white mb-4 shadow-xs">
                                                            <div class="card-body p-4">
                                                                <div
                                                                    class="icon icon-shape bg-white shadow shadow-xs text-center border-radius-md d-flex align-items-center justify-content-center mb-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        height="19" width="19"
                                                                        viewBox="0 0 24 24" fill="currentColor">
                                                                        <path
                                                                            d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                                                                    </svg>
                                                                </div>
                                                                <p class="text-sm mb-1">Human Resources</p>
                                                                <h3 class="mb-0 font-weight-bold">$25,426.70</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card blur border border-white mb-4 shadow-xs">
                                                            <div class="card-body p-4">
                                                                <div
                                                                    class="icon icon-shape bg-white shadow shadow-xs text-center border-radius-md d-flex align-items-center justify-content-center mb-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        height="19" width="19"
                                                                        viewBox="0 0 24 24" fill="currentColor">
                                                                        <path
                                                                            d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
                                                                        <path fill-rule="evenodd"
                                                                            d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </div>
                                                                <p class="text-sm mb-1">Wallet</p>
                                                                <h3 class="mb-0 font-weight-bold">$2,400.10</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-xs text-muted text-lg-start">
                            Copyright
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            Corporate UI by
                            <a href="https://www.creative-tim.com" class="text-secondary" target="_blank">Creative
                                Tim</a>.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-xs text-muted"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation"
                                    class="nav-link text-xs text-muted" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-xs text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license"
                                    class="nav-link text-xs pe-0 text-muted" target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"></i>
    </a>
    <div class="card shadow-lg ">
        <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Corporate UI Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger"
                        onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-slate-900"
                    onclick="sidebarType(this)">Dark</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                    onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3">
                <h6 class="mb-0">Navbar Fixed</h6>
            </div>
            <div class="form-check form-switch ps-0">
                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                    onclick="navbarFixed(this)">
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn bg-gradient-dark w-100" target="_blank"
                href="https://www.creative-tim.com/product/corporate-ui-dashboard-laravel">Free Download</a>
            <a class="btn btn-outline-dark w-100" target="_blank"
                href="https://www.creative-tim.com/learning-lab/bootstrap/installation-guide/corporate-ui-dashboard">View
                documentation</a>
            <div class="w-100 text-center">
                <a class="github-button" href="https://github.com/creativetimofficial/corporate-ui-dashboard"
                    target="_blank" data-icon="octicon-star" data-size="large" data-show-count="true"
                    aria-label="Star creativetimofficial/corporate-ui-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Corporate%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fcorporate-ui-dashboard"
                    class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/corporate-ui-dashboard-laravel"
                    class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.delete-object').on('click', function(e) {
            e.preventDefault();

            $('#deleteConfirmationModal').modal('show');

            $('#deleteConfirmationModal').on('click', '.btn-secondary', function() {
                $('#deleteConfirmationModal').modal('hide');
            });
        });
    });
</script>
