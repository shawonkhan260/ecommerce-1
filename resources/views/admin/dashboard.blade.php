@extends('admin.base')
@section('base')
{{-- top head  --}}
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                <div class="btn-group btn-group-page-header ml-auto">
                    <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-h"></i>
                    </button>
                    <div class="dropdown-menu">
                        <div class="arrow"></div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
            </div>
            {{-- then last 3 /div --}}
<div class="row">
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body ">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Visitors</p>
                            <h4 class="card-title">1,294</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-info bubble-shadow-small">
                            <i class="far fa-newspaper"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Subscribers</p>
                            <h4 class="card-title">1303</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
                            <i class="far fa-chart-bar"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Sales</p>
                            <h4 class="card-title">$ 1,345</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                            <i class="far fa-check-circle"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Order</p>
                            <h4 class="card-title">576</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Feed Activity</div>
            </div>
            <div class="card-body">
                <ol class="activity-feed">
                    <li class="feed-item feed-item-secondary">
                        <time class="date" datetime="9-25">Sep 25</time>
                        <span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
                    </li>
                    <li class="feed-item feed-item-success">
                        <time class="date" datetime="9-24">Sep 24</time>
                        <span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
                    </li>
                    <li class="feed-item feed-item-info">
                        <time class="date" datetime="9-23">Sep 23</time>
                        <span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
                    </li>
                    <li class="feed-item feed-item-warning">
                        <time class="date" datetime="9-21">Sep 21</time>
                        <span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
                    </li>
                    <li class="feed-item feed-item-danger">
                        <time class="date" datetime="9-18">Sep 18</time>
                        <span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
                    </li>
                    <li class="feed-item">
                        <time class="date" datetime="9-17">Sep 17</time>
                        <span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Support Tickets</div>
                    <div class="card-tools">
                        <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <div class="avatar avatar-online">
                        <span class="avatar-title rounded-circle border border-white bg-info">J</span>
                    </div>
                    <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">Joko Subianto <span class="text-warning pl-3">pending</span></h5>
                        <span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
                    </div>
                    <div class="float-right pt-1">
                        <small class="text-muted">8:40 PM</small>
                    </div>
                </div>
                <div class="separator-dashed"></div>
                <div class="d-flex">
                    <div class="avatar avatar-offline">
                        <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
                    </div>
                    <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">Prabowo Widodo <span class="text-success pl-3">open</span></h5>
                        <span class="text-muted">I have some query regarding the license issue.</span>
                    </div>
                    <div class="float-right pt-1">
                        <small class="text-muted">1 Day Ago</small>
                    </div>
                </div>
                <div class="separator-dashed"></div>
                <div class="d-flex">
                    <div class="avatar avatar-away">
                        <span class="avatar-title rounded-circle border border-white bg-danger">L</span>
                    </div>
                    <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">Lee Chong Wei <span class="text-muted pl-3">closed</span></h5>
                        <span class="text-muted">Is there any update plan for RTL version near future?</span>
                    </div>
                    <div class="float-right pt-1">
                        <small class="text-muted">2 Days Ago</small>
                    </div>
                </div>
                <div class="separator-dashed"></div>
                <div class="d-flex">
                    <div class="avatar avatar-offline">
                        <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
                    </div>
                    <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">Peter Parker <span class="text-success pl-3">open</span></h5>
                        <span class="text-muted">I have some query regarding the license issue.</span>
                    </div>
                    <div class="float-right pt-1">
                        <small class="text-muted">2 Day Ago</small>
                    </div>
                </div>
                <div class="separator-dashed"></div>
                <div class="d-flex">
                    <div class="avatar avatar-away">
                        <span class="avatar-title rounded-circle border border-white bg-danger">L</span>
                    </div>
                    <div class="flex-1 ml-3 pt-1">
                        <h5 class="text-uppercase fw-bold mb-1">Logan Paul <span class="text-muted pl-3">closed</span></h5>
                        <span class="text-muted">Is there any update plan for RTL version near future?</span>
                    </div>
                    <div class="float-right pt-1">
                        <small class="text-muted">2 Days Ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>

</div>
@endsection
