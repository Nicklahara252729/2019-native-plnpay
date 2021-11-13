<?php 
session_start();
include('../library/utama.php');
//panggil class
$call  = new database();
$call->koneksi();
if($_SESSION['status']!=TRUE){
            header("location:login.php");
        }
include('../theme/admin/start_theme.php');
?>
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card bg-dark text-white border-0">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="icon-handbag icon-lg"></i>
                    <div class="ml-4">
                      <h4 class="font-weight-light">Total invoices</h4>
                      <h3 class="font-weight-light mb-3">75, 650</h3>
                      <p class="mb-0 font-weight-light">39% more growth </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card bg-primary text-white border-0">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="icon-user icon-lg"></i>
                    <div class="ml-4">
                      <h4 class="font-weight-light">New users</h4>
                      <h3 class="font-weight-light mb-3">37, 650</h3>
                      <p class="mb-0 font-weight-light">43% more this year </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card bg-danger text-white border-0">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="icon-screen-desktop icon-lg"></i>
                    <div class="ml-4">
                      <h4 class="font-weight-light">Unique visits</h4>
                      <h3 class="font-weight-light mb-3">1349</h3>
                      <p class="mb-0 font-weight-light">69% increase</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card bg-success text-white border-0">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="icon-support icon-lg"></i>
                    <div class="ml-4">
                      <h4 class="font-weight-light">Bounce rate</h4>
                      <h3 class="font-weight-light mb-3">37, 580</h3>
                      <p class="mb-0 font-weight-light">65% higher rate </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card text-white border-0">
                <img class="card-img h-100 rounded-0" src="images/dashboard/cover.png" alt="Card image">
                <div class="card-img-overlay d-flex flex-column justify-content-between">
                  <h4 class="font-weight-light">
                      10 Oct 2018
                  </h4>
                  <div>
                    <h4 class="font-weight-light">
                        Check our unlimited elements
                    </h4>
                    <h3 class="font-weight-light mb-0">
                        Welcome to Flare Admin dashboard
                    </h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div>
                        <p class="mb-1"><span class="h4 mb-0 mr-2">Google</span>Google Inc.</p>
                        <p class="mb-0 text-muted font-weight-light">The search engine giant</p>                        
                      </div>
                      <div>
                        <h6 class="font-weight-normal">Czech Republic</h6>
                        <span class="badge badge-primary">+3.53%</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div>
                        <p class="mb-1"><span class="h4 mb-0 mr-2">Tesla</span>Tesla, Inc.</p>                        
                        <p class="mb-0 text-muted font-weight-light">Master of innovations</p>
                      </div>
                      <div>
                        <h6 class="font-weight-normal">South Africa</h6>
                        <span class="badge badge-primary">+1.26%</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Performance</h4>
                  <div class="mb-3">
                    <p class="d-flex mb-2">
                      Data
                      <span class="ml-auto font-weight-bold">70%</span>
                    </p>
                    <div class="progress progress-xs">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <p class="d-flex mb-2">
                      Email
                      <span class="ml-auto font-weight-bold">15%</span>
                    </p>
                    <div class="progress progress-xs">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <p class="d-flex mb-2">
                      Website
                      <span class="ml-auto font-weight-bold">35%</span>
                    </p>
                    <div class="progress progress-xs">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <p class="d-flex mb-2">
                      Mobile App
                      <span class="ml-auto font-weight-bold">30%</span>
                    </p>
                    <div class="progress progress-xs">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <p class="d-flex mb-2">
                      Branding
                      <span class="ml-auto font-weight-bold">50%</span>
                    </p>
                    <div class="progress progress-xs">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div>
                    <p class="d-flex mb-2">
                      UI Kits
                      <span class="ml-auto font-weight-bold">90%</span>
                    </p>
                    <div class="progress progress-xs">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="icon-in-bg bg-success text-white rounded-circle">
                          <i class="icon-tag font-weight-bold"></i>
                        </div>
                        <div class="ml-4">
                          <h4>Total income</h4>
                          <h3 class="mb-0 font-weight-medium">$8900</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="icon-in-bg bg-primary text-white rounded-circle">
                          <i class="icon-basket font-weight-bold"></i>
                        </div>
                        <div class="ml-4">
                          <h4>New expense</h4>
                          <h3 class="mb-0 font-weight-medium">$6340</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Earning report</h4>
                      <p class="text-muted font-weight-light">Past 30 Days — Last Updated Oct 14, 2017</p>
                      <canvas id="earning-report-chart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Projects of the month</h4>
                  <p class="text-muted font-weight-light">We have 12 new projects from USA this month in Web Applications</p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="pt-1 pl-0">
                            Assigned
                          </th>
                          <th class="pt-1">
                            Product
                          </th>
                          <th class="pt-1">
                            Priority
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1 pl-0">
                            <div class="d-flex align-items-center">
                              <img src="images/faces/face1.jpg" alt="profile"/>
                              <div class="ml-3">
                                <p class="mb-2">Sophia Brown</p>
                                <p class="mb-0 text-muted text-small">Product Designer</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            Web App
                          </td>
                          <td>
                            <label class="badge badge-success">Low</label>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1 pl-0">
                            <div class="d-flex align-items-center">
                              <img src="images/faces/face6.jpg" alt="profile"/>
                              <div class="ml-3">
                                <p class="mb-2">Rachel Newton</p>
                                <p class="mb-0 text-muted text-small">Mobile Developer</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            Mobile App
                          </td>
                          <td>
                            <label class="badge badge-warning">Medium</label>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1 pl-0">
                            <div class="d-flex align-items-center">
                              <img src="images/faces/face15.jpg" alt="profile"/>
                              <div class="ml-3">
                                <p class="mb-2">Marcus Stevens</p>
                                <p class="mb-0 text-muted text-small">Core Developer</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            Plugin
                          </td>
                          <td>
                            <label class="badge badge-danger">High</label>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1 pl-0">
                            <div class="d-flex align-items-center">
                              <img src="images/faces/face2.jpg" alt="profile"/>
                              <div class="ml-3">
                                <p class="mb-2">Theresa Becker</p>
                                <p class="mb-0 text-muted text-small">Product Designer</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            Web App
                          </td>
                          <td>
                            <label class="badge badge-success">Low</label>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1 pl-0">
                            <div class="d-flex align-items-center">
                              <img src="images/faces/face3.jpg" alt="profile"/>
                              <div class="ml-3">
                                <p class="mb-2">Jessie Ortiz</p>
                                <p class="mb-0 text-muted text-small">Web Developer</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            SAAS App
                          </td>
                          <td>
                            <label class="badge badge-danger">High</label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin grid-margin-md-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Todo list</h4>
                  <div class="add-items d-flex">
                    <input type="text" class="form-control todo-list-input"  placeholder="What do you need to do today?">
                    <button class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                  </div>
                  <div class="list-wrapper">
                    <ul class="d-flex flex-column-reverse todo-list">
                      <li class="completed">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox" checked>
                            Call John
                          </label>
                        </div>
                        <i class="remove icon-close"></i>
                      </li>
                      <li>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            Create invoice
                          </label>
                        </div>
                        <i class="remove icon-close"></i>
                      </li>
                      <li>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            Print Statements
                          </label>
                        </div>
                        <i class="remove icon-close"></i>
                      </li>
                      <li class="completed">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox" checked>
                            Prepare for presentation
                          </label>
                        </div>
                        <i class="remove icon-close"></i>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin grid-margin-md-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Issue rate</h4>
                  <div class="row">
                    <div class="col-md-5 d-flex align-items-center pr-4">
                      <canvas id="issues-chart" width="100" height="100"></canvas>
                    </div>
                    <div class="col-md-7">
                      <div class="border-bottom pb-4 mt-2 mt-md-0">
                        <h1 class="text-center text-md-left">12,456</h1>
                        <p class="text-center text-md-left mb-0">Issues this Month</p>
                      </div>
                      <div class="pt-4">
                        <div id="issues-chart-legend" class="issues-chart-legend"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php 
include('../theme/admin/end_theme.php');
?>