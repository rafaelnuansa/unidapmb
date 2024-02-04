@extends('layouts.app')

@section('content')
    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="https://dev-cms.unida.ac.id/assets/img/slide.png" alt="" class="profile-wid-img">
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">

            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{ auth()->user()->name }}</h3>
                    <p class="text-white text-opacity-75">{{ auth()->user()->email }}</p>

                </div>
            </div>
            <!--end col-->

            <!--end col-->
        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex profile-wrapper">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab"
                                aria-selected="true">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i>
                                <span class="d-none d-md-inline-block">Profile</span>
                            </a>
                        </li>
                    </ul>
                    <div class="flex-shrink-0">
                        <a href="{{ route('profile.edit') }}" class="btn btn-success"><i
                                class="ri-edit-box-line align-bottom"></i> Edit
                            Profile</a>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-5">
                                            Kelengkapan Profile
                                        </h5>
                                        <div class="progress animated-progress custom-progress progress-label">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                style="width: {{ $completeness }}%" aria-valuenow="{{ $completeness }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <div class="label">{{ $completeness }}%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <!--end col-->
                            <div class="col-xxl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">About</h5>

                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt voluptas magni, impedit, et asperiores debitis corporis accusamus odit autem nobis error fugiat illo adipisci porro. Repudiandae sapiente consequuntur minus animi.</p>


                                    </div>
                                </div>


                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
                <!--end tab-content-->
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
