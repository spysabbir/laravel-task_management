@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="row row-cols-1 row-cols-lg-3">
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mb-2">Today All Task</h5>
                        <h4 class="font-weight-bold">{{ $today_all_tasks_count }}</h4>
                        <p class="text-secondary mb-0 font-13">Analytics for today</p>
                    </div>
                    <div class="widgets-icons bg-gradient-kyoto text-white">
                        <i class='bx bx-bar-chart'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mb-2">Today Pending Task</h5>
                        <h4 class="font-weight-bold">{{ $today_pending_tasks_count }} <small class="text-danger font-13">({{ $today_pending_tasks_count != 0 ? round(($today_pending_tasks_count / $today_all_tasks_count) * 100, 2) : 0 }}%)</small></h4>
                        <p class="text-secondary mb-0 font-13">Analytics for today</p>
                    </div>
                    <div class="widgets-icons bg-gradient-blues text-white">
                        <i class='bx bx-time'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mb-2">Today Completed Task</h5>
                        <h4 class="font-weight-bold">{{ $today_completed_tasks_count }} <small class="text-success font-13">({{ $today_completed_tasks_count != 0 ? round(($today_completed_tasks_count / $today_all_tasks_count) * 100, 2) : 0 }}%)</small></h4>
                        <p class="text-secondary mb-0 font-13">Analytics for today</p>
                    </div>
                    <div class="widgets-icons bg-gradient-moonlit text-white">
                        <i class='bx bxs-cube'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mb-2">Total All Task</h5>
                        <h4 class="font-weight-bold">{{ $all_tasks_count }}</h4>
                        <p class="text-secondary mb-0 font-13">Analytics for all</p>
                    </div>
                    <div class="widgets-icons bg-gradient-cosmic text-white">
                        <i class='bx bx-bar-chart'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mb-2">Total Pending Task</h5>
                        <h4 class="font-weight-bold">{{ $pending_tasks_count }} <small class="text-danger font-13">({{ $pending_tasks_count != 0 ? round(( $pending_tasks_count / $all_tasks_count) * 100, 2) : 0 }}%)</small></h4>
                        <p class="text-secondary mb-0 font-13">Analytics for all</p>
                    </div>
                    <div class="widgets-icons bg-gradient-burning text-white">
                        <i class='bx bx-refresh'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mb-2">Total Completed Task</h5>
                        <h4 class="font-weight-bold">{{ $completed_tasks_count }} <small class="text-success font-13">({{ $completed_tasks_count != 0 ? round(($completed_tasks_count / $all_tasks_count) * 100, 2) : 0 }}%)</small></h4>
                        <p class="text-secondary mb-0 font-13">Analytics for all</p>
                    </div>
                    <div class="widgets-icons bg-gradient-lush text-white">
                        <i class='bx bx-line-chart'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->
@endsection
