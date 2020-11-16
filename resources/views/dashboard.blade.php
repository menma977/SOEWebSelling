@extends('components.app')

@section('subHeader')
  <div class="row submenu">
    <div class="container-fluid" id="submenu-container">
      <div class="row">
        <nav class="navbar col-12">
          <div class="dropdown mr-auto d-flex d-sm-none">
            <button class="btn dropdown-toggle btn-sm btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dashboard
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item {{ request()->is(['dashboard']) ? 'active' : '' }}" href="{{ route('dashboard') }}">dashboard</a>
              <a class="dropdown-item {{ request()->is(['debit']) ? 'active' : '' }}" href="{{ route('sell.debit') }}">Modal</a>
              <a class="dropdown-item {{ request()->is(['credit']) ? 'active' : '' }}" href="{{ route('sell.credit') }}">Sell</a>
            </div>
          </div>
          <ul class="nav nav-pills mr-auto d-none d-sm-flex">
            <li class="nav-item ">
              <a class="nav-link {{ request()->is(['dashboard']) ? 'active' : '' }}" href="{{ route('dashboard') }}">dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is(['debit']) ? 'active' : '' }}" href="{{ route('sell.debit') }}">Modal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is(['credit']) ? 'active' : '' }}" href="{{ route('sell.credit') }}">Sell</a>
            </li>
          </ul>
          <div class="form-inline ml-auto ml-sm-3">
            <div class="form-control form-control-sm">
              <span id="time"></span> <i class="material-icons avatar avatar-26 text-template-primary cal-icon">event</i>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card border-0 shadow-sm mb-4">
        <div class="card-header border-0 bg-none">
          <div class="row">
            <div class="col">
              <p class="fs15">Sell<br><small class="text-template-primary-light">Per Month</small></p>
            </div>
          </div>
        </div>
        <div class="card-body">
          <br>
          <div class="areaChart">
            <canvas id="mixedchartjs2"></canvas>
          </div>
          <br>
          <div class="row">
            <div class="col-auto">
              <div class="row">
                <div class="col-auto">
                  <i class="material-icons text-template-primary fs15 vm">album</i>
                </div>
                <div class="col pl-0">
                  <p>IT User <small class="d-block"><span class="text-template-primary">25600</span></small></p>
                </div>
              </div>
            </div>
            <div class="col-auto border-left-dashed">
              <div class="row">
                <div class="col-auto">
                  <i class="material-icons text-success fs15 vm">album</i>
                </div>
                <div class="col pl-0">
                  <p>Non-IT <small class="d-block"><span class="text-template-primary">6548</span></small></p>
                </div>
              </div>
            </div>
            <div class="col-auto border-left-dashed">
              <div class="row">
                <div class="col-auto">
                  <i class="material-icons text-danger fs15 vm">album</i>
                </div>
                <div class="col pl-0">
                  <p>Trainee <small class="d-block"><span class="text-template-primary">15548</span></small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-12">
      <div class="card shadow-sm border-0 mb-4">
        <div class="card-header border-0 ">
          <div class="row">
            <div class="col">
              <h6 class="card-title">Mix Chart<br><small class="text-template-primary-light">Chart js Chart</small></h6>
            </div>
            <div class="col-auto">
              <div class=" float-right text-right">
                <button class="btn btn-link btn-sm"><i class="material-icons md-24 template-primary">refresh</i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="h-320">
            <canvas id="mixchartfull"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card shadow-sm border-0 mb-4">
        <div class="card-header border-0 ">
          <div class="row">
            <div class="col">
              <h6 class="card-title">Donut<br><small class="text-template-primary-light">Chart js Chart</small></h6>
            </div>
            <div class="col-auto">
              <div class=" float-right text-right">
                <button class="btn btn-link btn-sm"><i class="material-icons md-24 template-primary">refresh</i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="row">
            <div class="col-8 mx-auto">
              <canvas id="donutchart-area"></canvas>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <div class="row">
            <div class="col-auto">
              <div class="row">
                <div class="col-auto">
                  <i class="material-icons text-template-primary fs15 vm">album</i>
                </div>
                <div class="col pl-0">
                  <p>IT User <small class="d-block"><span class="text-template-primary">25600</span></small></p>
                </div>
              </div>
            </div>
            <div class="col-auto border-left-dashed">
              <div class="row">
                <div class="col-auto">
                  <i class="material-icons text-success fs15 vm">album</i>
                </div>
                <div class="col pl-0">
                  <p>Non-IT <small class="d-block"><span class="text-template-primary">6548</span></small></p>
                </div>
              </div>
            </div>
            <div class="col-auto border-left-dashed">
              <div class="row">
                <div class="col-auto">
                  <i class="material-icons text-danger fs15 vm">album</i>
                </div>
                <div class="col pl-0">
                  <p>Trainee <small class="d-block"><span class="text-template-primary">15548</span></small></p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card shadow-sm border-0 mb-4">
        <div class="card-header border-0 ">
          <div class="row">
            <div class="col">
              <h6 class="card-title">Pie<br><small class="text-template-primary-light">Chart js Chart</small></h6>
            </div>
            <div class="col-auto">
              <div class=" float-right text-right">
                <button class="btn btn-link btn-sm"><i class="material-icons md-24 template-primary">refresh</i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="row">
            <div class="col-8 mx-auto">
              <canvas id="pie-area"></canvas>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <div class="row">
            <div class="col-auto">
              <div class="row">
                <div class="col-auto">
                  <i class="material-icons text-template-primary fs15 vm">album</i>
                </div>
                <div class="col pl-0">
                  <p>IT User <small class="d-block"><span class="text-template-primary">25600</span></small></p>
                </div>
              </div>
            </div>
            <div class="col-auto border-left-dashed">
              <div class="row">
                <div class="col-auto">
                  <i class="material-icons text-success fs15 vm">album</i>
                </div>
                <div class="col pl-0">
                  <p>Non-IT <small class="d-block"><span class="text-template-primary">6548</span></small></p>
                </div>
              </div>
            </div>
            <div class="col-auto border-left-dashed">
              <div class="row">
                <div class="col-auto">
                  <i class="material-icons text-danger fs15 vm">album</i>
                </div>
                <div class="col pl-0">
                  <p>Trainee <small class="d-block"><span class="text-template-primary">15548</span></small></p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card shadow-sm border-0 mb-4">
        <div class="card-header border-0 ">
          <div class="row">
            <div class="col">
              <h6 class="card-title">Polar<br><small class="text-template-primary-light">Chart js Chart</small></h6>
            </div>
            <div class="col-auto">
              <div class=" float-right text-right">
                <button class="btn btn-link btn-sm"><i class="material-icons md-24 template-primary">refresh</i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="row">
            <div class="col-8 mx-auto">
              <canvas id="polar-area"></canvas>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <div class="row">
            <div class="col-auto">
              <div class="row">
                <div class="col-auto">
                  <i class="material-icons text-template-primary fs15 vm">album</i>
                </div>
                <div class="col pl-0">
                  <p>IT User <small class="d-block"><span class="text-template-primary">25600</span></small></p>
                </div>
              </div>
            </div>
            <div class="col-auto border-left-dashed">
              <div class="row">
                <div class="col-auto">
                  <i class="material-icons text-success fs15 vm">album</i>
                </div>
                <div class="col pl-0">
                  <p>Non-IT <small class="d-block"><span class="text-template-primary">6548</span></small></p>
                </div>
              </div>
            </div>
            <div class="col-auto border-left-dashed">
              <div class="row">
                <div class="col-auto">
                  <i class="material-icons text-danger fs15 vm">album</i>
                </div>
                <div class="col pl-0">
                  <p>Trainee <small class="d-block"><span class="text-template-primary">15548</span></small></p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('addJs')
  <!-- Chart Progress -->
  <script src="{{ asset('assets/vendor/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chartjs/utils.js') }}"></script>

  <script>
    $(function () {
      bar();
    });

    function line() {
      let label = ['0'];
      let dataset = [];

      console.log(dataset);

      let areaChart = document.getElementById('mixedchartjs2').getContext('2d');

      let configChart = {
        type: 'line',
        data: {
          labels: label,
          datasets: dataset
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          elements: {
            point: {
              radius: 0
            }
          },
          title: {
            display: false,
            text: 'Chart.js Line Chart - Stacked Area'
          },
          tooltips: {
            mode: 'index',
          },
          hover: {
            mode: 'index'
          },
          legend: {
            display: false,
          },
          scales: {
            xAxes: [{
              ticks: {
                display: true,
                fontColor: "#90b5ff",
              },
              scaleLabel: {
                display: false,
                labelString: 'Month'
              }
            }],
            yAxes: [{
              ticks: {
                display: true,
                fontColor: "#90b5ff",
              },
              display: true,
              stacked: true,
              scaleLabel: {
                display: false,
                labelString: 'Value'
              }
            }]
          }
        }
      };

      window.salesareachart = new Chart(areaChart, configChart);
    }

    function bar() {
      let label = [];
      let dataset = [];
      @foreach($dataChart as $item)
      label.push(@json($item->label));
      dataset.push({
        type: @json($item->type),
        label: @json($item->label),
        borderWidth: 1,
        backgroundColor: @json($item->backgroundColor),
        borderColor: @json($item->borderColor),
        data: @json($item->data)
      });
      @endforeach

      var barChartData = {

        labels: label,
        datasets: [{
          type: 'bar',
          maintainAspectRatio: false,
          backgroundColor: '#ff6e73',
          borderColor: '#ff6e73',
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
          ]
        }, {
          type: 'line',
          label: 'Dataset 2',
          borderWidth: 1,
          backgroundColor: 'rgba(91, 146, 255, 0.18)',
          borderColor: '#5B92FF',
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
          ]
        }, {
          type: 'bar',
          label: 'Dataset 3',
          backgroundColor: '#ffc322',
          borderColor: '#ffc322',
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
          ]
        }]
      };

      // Define a plugin to provide data labels

      var ctx = $("#mixchartfull");
      window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
          responsive: true,
          maintainAspectRatio: false,
          title: {
            display: false,
            text: 'Chart.js Combo Bar Line Chart',

          },
          legend: {
            display: false,
            labels: {
              fontColor: "#cccccc"
            }
          },
          scales: {
            yAxes: [{
              ticks: {
                fontColor: "#bbbbbb",
              },
              gridLines: {
                color: "rgba(0,0,0,0.05)",
                zeroLineColor: "rgba(255,255,255,0.2)"
              }
            }],
            xAxes: [{
              ticks: {
                fontColor: "#bbbbbb"
              },
              gridLines: {
                color: "rgba(0,0,0,0.05)",
                zeroLineColor: "rgba(0,0,0,0.2)"
              }
            }]
          }
        }
      });
    }
  </script>
@endsection