@extends('layouts.staff')
@section('content')

<!-- start page title -->
<h1 class="app-page-title">Alarms</h1>
<!-- end page title -->

<div class="app-card app-card-orders-table h-100 shadow-sm">
  <div class="app-card-header p-3">
    <div class="row justify-content-between align-items-center">
      <div class="col-auto d-flex justify-content-between align-items-center">
        <h4 class="app-card-title">Alarms List</h4>
        <a href="{{route('create_alarm')}}" class="btn app-btn-primary ms-3">Create Alarm</a>
      </div>
      <div class="col-auto">
        <?php
        if (isset($_GET['filter']) && isset($_GET['month'])) {
          $year = $_GET['month'];
          // echo $year;
          // $year = 'filter';
        }

        ?>
        <form class="d-flex align-items-center justify-content-end" method="get" action="">
          <select class="form-control year me-2" name="year" id="year" required>
            <option value="">Select Year</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
          </select>
          <select class="form-control month me-2" name="month" id="month" required>
            <option value="">Select month</option>
            <option value="01">January</option>
            <option value="02">Febrary</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>
          <input class="btn app-btn-primary filter-btn" type="submit" name="filter" value="Apply Filter">
        </form>
      </div>
      <!--//col-->
    </div>
    <!--//row-->
  </div>
  <!--//app-card-header-->
  <div class="app-card-body p-4">
    @if(count($alarms) > 0)
    <div class="table-responsive">
      <table id="datatable_users" class="table app-table-hover mb-0 text-left dt-table">
        <thead>
          <tr>
            <th class="cell text-center ps-3">JOB # </th>
            <th class="cell">Date </th>
            <th class="cell"> Monitor Company </th>
            <th class="cell">Client</th>
            <th class="cell pe-3">Action</th>
          </tr>
        </thead>
        <tbody id="movie-data">
          @foreach($alarms as $alarm)
          <?php if (isset($_GET['year'])) {
            $month = $_GET['year'];
            $date = $month . '-' . $year;
            //die();
            if (strpos($alarm->date, $date) === false) {
              continue;
            }
          } ?>
          <tr>
            <td class="cell text-center truncate vt" rowspan="1">
              <b class="badge bg-primary">
                #{{$alarm->job_no}}
              </b><!-- / END -->
            </td>
            <td class="cell truncate vt">
              <date class="mt-2">
                <span>
                  <?php
                  echo date("dS M, Y", strtotime($alarm->date));
                  ?>
                </span>
                <span class="note">
                  <?php
                  echo date("h:m A", strtotime($alarm->date));
                  ?>
                </span>
              </date><!-- /.mt-2 END -->
            </td>
            <td class="cell truncate vt">
              {{$alarm->alarm_monitor_company}}
            </td>
            <td class="cell mw-200px text-wrap vt">
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
              </svg>
              {{$alarm->client_name}} <br>
              <date>
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                  <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>
                {{$alarm->client_address}}
              </date>
            </td>
            <td class="cell truncate vt">
              <button type="button" class="btn-sm app-btn-secondary mt-2 d-inline-block" data-bs-toggle="modal" data-bs-target="#alarmDetailModal" data-bs-job_no="{{$alarm->job_no}}" data-bs-date="{{$alarm->date}}" data-bs-alarm_monitor_company="{{$alarm->alarm_monitor_company}}" data-bs-security_officer_name="{{$alarm->security_officer_name}}" data-bs-client_name="{{$alarm->client_name}}" data-bs-client_address="{{$alarm->client_address}}" data-bs-sector_activation="{{$alarm->sector_activation}}" data-bs-time_on_site="{{$alarm->time_on_site}}" data-bs-time_off_site="{{$alarm->time_off_site}}" data-bs-document_no="{{$alarm->document_no}}" data-bs-invoice_to="{{$alarm->invoice_to}}" data-bs-comment="{{$alarm->comment}}" type="button">
                View Details
              </button>
              <a class="btn-sm app-btn-secondary border-danger text-danger mt-2 d-inline-block" href="{{route('delete_alarm',$alarm->id)}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
                <span class="d-none d-lg-inline-block">
                  Delete
                </span>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
    <div class="p-4">
      <div class="alert alert-info text-center mb-0" role="alert">
        No alarms found!
      </div>
    </div><!-- /.p-4 END -->
    @endif
  </div>
  <!--//app-card-body-->
</div>
<!--//app-card-->

<div class="modal fade" id="alarmDetailModal" tabindex="-1" aria-labelledby="alarmDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="alarmDetailModalLabel">Alram Details <span id="model_job_no"></span> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <h6 class="">Date</h6>
                <small class="d-block" id="model_date"></small>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <h6 class="">Document No</h6>
                <small class="d-block" id="model_document_no"></small>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <h6 class="">Monitor Company</h6>
                <small class="d-block" id="model_monitor_company"></small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <h6 class="">Security Officer Name</h6>
                <small class="d-block" id="model_security_officer_name"></small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <h6 class="">Invoice To:</h6>
                <small class="d-block" id="model_invoice_to"></small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <h6 class="">Sector Activation</h6>
                <small class="d-block" id="model_sector_activation"></small>
              </div>
            </div>
            <div class="col-md-6 ms-auto">
              <div class="mb-0">
                <h6 class="">Time On Site</h6>
                <small class="d-block" id="model_time_on_site"></small>
              </div>
            </div>
            <div class="col-md-6 ms-auto">
              <div class="mb-0">
                <h6 class="">Time Off Site</h6>
                <small class="d-block" id="model_time_off_site"></small>
              </div>
            </div>
            <div class="col-md-12">
              <hr class="my-2">
            </div><!-- /.col-md-12 END -->
            <div class="col-sm-6">
              <div class="mb-3">
                <h6 class="">Client Name</h6>
                <small class="d-block" id="model_client_name"></small>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <h6 class="">Client Address</h6>
                <small class="d-block" id="model_client_address"></small>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <h6 class="">Comment</h6>
                <small class="d-block" id="model_comment"></small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  var alarmDetailModal = document.getElementById('alarmDetailModal')
  alarmDetailModal.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget;
    var comment = button.getAttribute('data-bs-comment');
    var job_no = button.getAttribute('data-bs-job_no');
    var invoice_to = button.getAttribute('data-bs-invoice_to');
    var date = button.getAttribute('data-bs-date');
    var alarm_monitor_company = button.getAttribute('data-bs-alarm_monitor_company');
    var document_no = button.getAttribute('data-bs-document_no');
    var time_on_site = button.getAttribute('data-bs-time_on_site');
    var time_off_site = button.getAttribute('data-bs-time_off_site');
    var security_officer_name = button.getAttribute('data-bs-security_officer_name');
    var sector_activation = button.getAttribute('data-bs-sector_activation');
    var sector_activation = button.getAttribute('data-bs-sector_activation');
    var client_name = button.getAttribute('data-bs-client_name');
    var client_address = button.getAttribute('data-bs-client_address');

    var modalTitle = alarmDetailModal.querySelector('.modal-title');
    var md_comment = alarmDetailModal.querySelector('#model_comment');
    var md_date = alarmDetailModal.querySelector('#model_date');
    var md_invoice_to = alarmDetailModal.querySelector('#model_invoice_to');
    var md_monitor_company = alarmDetailModal.querySelector('#model_monitor_company');
    var md_document_no = alarmDetailModal.querySelector('#model_document_no');
    var md_time_on_site = alarmDetailModal.querySelector('#model_time_on_site');
    var md_time_off_site = alarmDetailModal.querySelector('#model_time_off_site');
    var md_security_officer_name = alarmDetailModal.querySelector('#model_security_officer_name');
    var md_sector_activation = alarmDetailModal.querySelector('#model_sector_activation');
    var md_client_name = alarmDetailModal.querySelector('#model_client_name');
    var md_client_address = alarmDetailModal.querySelector('#model_client_address');

    modalTitle.innerHTML = 'Alram Details :: Job #' + job_no;
    md_comment.innerHTML = comment;
    md_invoice_to.innerHTML = invoice_to;
    md_date.innerHTML = date;
    md_monitor_company.innerHTML = alarm_monitor_company;
    md_document_no.innerHTML = document_no;
    md_time_on_site.innerHTML = time_on_site;
    md_time_off_site.innerHTML = time_off_site;
    md_security_officer_name.innerHTML = security_officer_name;
    md_sector_activation.innerHTML = sector_activation;
    md_client_name.innerHTML = client_name;
    md_client_address.innerHTML = client_address;
  })
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('#year').on('change', function() {
      //alert(year);
    });
    $(".filter-btn").click(function() {
      var year = $('#year').val();
      if (year == '') {
        alert('Select year!');
      }
      //alert(year);
      var month = (this.id); // or alert($(this).attr('id'));

      $.ajax({
        url: "<?php echo 'alarm/store_search'; ?>", //the page containing php script
        type: "get", //request type,
        dataType: 'html',
        data: {
          year: year,
          month: month
        },
        success: function(result) {
          alert('hr');
          //console.log(result.abc);
          $("#movie-data").append(result);
        }
      });
    });
  });
</script>

@endsection