<?php

use Framework\Classes\Utility;

// require_once('App/views/_query.php');

// echo ;
?>
<!-- <html>
    <body>
    <form method="post" action="/logout"> 
        <button type="submit">Logout</button>
    </form>
    </body>
</html> -->

<div class="nk-content">
            <div class="container-fluid">
              <div class="nk-content-inner">
                <div class="nk-content-body">
                  <div class="row g-gs">
                  <div class="col-xxl-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title-group mb-4 align-items-start">
                            <div class="card-title">
                              <h4 class="title mb-0">Welcome, <?= ucfirst($userDetails['username']) ?></h4>
                              <span class="small"
                                >Your IP Address: <?= Utility::getUserInfo()['ip_address'] ?></span
                              >
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#planTypeModal"> Launch static
    backdrop modal</button>
                            <div class="card-tools">
                              <div class="dropdown">
                                <a
                                  href="#"
                                  class="btn btn-sm btn-icon btn-zoom me-n1"
                                  data-bs-toggle="dropdown"
                                  ><em class="icon ni ni-more-v"></em
                                ></a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li>
                                    <div class="dropdown-header pt-2 pb-0">
                                      <h6 class="mb-0">Actions</h6>
                                    </div>
                                  </li>
                                  <li><hr class="dropdown-divider" /></li>
                                  <li>
                                    <a href="#" class="dropdown-item"
                                      >New Ticket</a
                                    >
                                  </li>
                                  <li>
                                    <a href="#" class="dropdown-item"
                                      >New Customer</a
                                    >
                                  </li>
                                  <li>
                                    <a href="#" class="dropdown-item"
                                      >New Contact</a
                                    >
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="row g-gs">
                            <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">
                              <div class="box-dotted h-100">
                                <em
                                  class="icon icon-lg ni ni-chart-up text-primary"
                                ></em>
                                <h5 class="title mt-2 mb-3">
                                  Total Balance
                                </h5>
                                <div class="amount h3">$ <?= $accountDetails['balance'] ?? "0" ?></div>
                                <div
                                  class="d-flex align-items-center smaller flex-wrap"
                                >
                                  <div class="change up">
                                    <em class="icon ni ni-trend-up"></em> +2.5%
                                  </div>
                                  <span>than last Week</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">
                              <div class="box-dotted h-100">
                                <em
                                  class="icon icon-lg ni ni-user-add text-success"
                                ></em>
                                <h5 class="title mt-2 mb-3">
                                  Instagram Followers
                                </h5>
                                <div class="amount h3">7784k</div>
                                <div
                                  class="d-flex align-items-center smaller flex-wrap"
                                >
                                  <div class="change down">
                                    <em class="icon ni ni-trend-down"></em>
                                    -1.5%
                                  </div>
                                  <span>than last Week</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4 col-lg-12 col-xl-4">
                              <div class="box-dotted h-100">
                                <em
                                  class="icon icon-lg ni ni-coins text-warning"
                                ></em>
                                <h5 class="title mt-2 mb-3">Google Ads CPC</h5>
                                <div class="amount h3">$5.02</div>
                                <div
                                  class="d-flex align-items-center smaller flex-wrap"
                                >
                                  <div class="change up">
                                    <em class="icon ni ni-trend-up"></em> +2.6%
                                  </div>
                                  <span>than last Week</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-xxl-4">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title-group">
                            <div class="card-title">
                              <h5 class="title">Sessions Device</h5>
                            </div>
                            <div class="card-tools">
                              <em
                                class="icon-hint icon ni ni-help-fill"
                                data-bs-toggle="tooltip"
                                data-bs-placement="left"
                                title="Sessions from device"
                              ></em>
                            </div>
                          </div>
                          <div class="nk-chart-analytics-session-device mt-4">
                            <canvas
                              data-nk-chart="doughnut"
                              id="sessionsDevice"
                            ></canvas>
                          </div>
                          <div
                            class="chart-legend-group justify-content-around pt-4 flex-wrap gap g-2"
                          >
                            <div class="chart-legend">
                              <span class="dot bg-info"></span>
                              <div class="chart-legend-text">
                                <div class="title">Mobile</div>
                              </div>
                            </div>
                            <div class="chart-legend">
                              <span class="dot bg-warning"></span>
                              <div class="chart-legend-text">
                                <div class="title">Tablet</div>
                              </div>
                            </div>
                            <div class="chart-legend">
                              <span class="dot bg-success"></span>
                              <div class="chart-legend-text">
                                <div class="title">Desktop</div>
                              </div>
                            </div>
                            <div class="chart-legend">
                              <span class="dot bg-purple"></span>
                              <div class="chart-legend-text">
                                <div class="title">Others</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-xxl-4">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title-group">
                            <div class="card-title">
                              <h5 class="title">Recent Activity</h5>
                            </div>
                          </div>
                          <div class="nk-timeline nk-timeline-center mt-4">
                            <div class="nk-timeline-group">
                              <div class="nk-timeline-heading">
                                <h6 class="overline-title">today</h6>
                              </div>
                              <ul class="nk-timeline-list">
                                <li class="nk-timeline-item">
                                  <div class="nk-timeline-item-inner">
                                    <div class="nk-timeline-symbol">
                                      <div
                                        class="media media-md media-middle media-circle text-bg-info"
                                      >
                                        <em class="icon ni ni-user"></em>
                                      </div>
                                    </div>
                                    <div class="nk-timeline-content">
                                      <p class="small">
                                        <strong>Nick Mark</strong> mentioned
                                        <strong>Sara Smith</strong> in a new
                                        post
                                      </p>
                                    </div>
                                  </div>
                                </li>
                                <li class="nk-timeline-item">
                                  <div class="nk-timeline-item-inner">
                                    <div class="nk-timeline-symbol">
                                      <div
                                        class="media media-md media-middle media-circle text-bg-warning"
                                      >
                                        <em class="icon ni ni-signout"></em>
                                      </div>
                                    </div>
                                    <div class="nk-timeline-content">
                                      <p class="small">
                                        The post <strong>Post Name</strong> was
                                        removed by <strong>Nick Mark</strong>
                                      </p>
                                    </div>
                                  </div>
                                </li>
                                <li class="nk-timeline-item">
                                  <div class="nk-timeline-item-inner">
                                    <div class="nk-timeline-symbol">
                                      <div
                                        class="media media-md media-middle media-circle text-bg-success"
                                      >
                                        <em class="icon ni ni-file-text"></em>
                                      </div>
                                    </div>
                                    <div class="nk-timeline-content">
                                      <p class="small">
                                        <strong>Patrick Sullivan</strong>
                                        published a new <strong>post</strong>
                                      </p>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                            <div class="nk-timeline-group">
                              <div class="nk-timeline-heading">
                                <h6 class="overline-title">yesterday</h6>
                              </div>
                              <ul class="nk-timeline-list">
                                <li class="nk-timeline-item">
                                  <div class="nk-timeline-item-inner">
                                    <div class="nk-timeline-symbol">
                                      <div
                                        class="media media-md media-middle media-circle text-bg-info"
                                      >
                                        <em class="icon ni ni-shuffle"></em>
                                      </div>
                                    </div>
                                    <div class="nk-timeline-content">
                                      <p class="small">
                                        <strong>240+</strong> users have
                                        subscribed to Newsletter #1
                                      </p>
                                    </div>
                                  </div>
                                </li>
                                <li class="nk-timeline-item">
                                  <div class="nk-timeline-item-inner">
                                    <div class="nk-timeline-symbol">
                                      <div
                                        class="media media-md media-middle media-circle text-bg-success"
                                      >
                                        <em class="icon ni ni-signout"></em>
                                      </div>
                                    </div>
                                    <div class="nk-timeline-content">
                                      <p class="small">
                                        The post <strong>Post Name</strong> was
                                        suspended by <strong>Nick Mark</strong>
                                      </p>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
