@extends('layouts.account')
@section('content')

<!-- start page title -->
<h1 class="app-page-title">Clients</h1>
<!-- end page title -->

<div class="app-card app-card-orders-table h-100 shadow-sm">
  <div class="app-card-header p-3">
    <div class="row justify-content-between align-items-center">
      <div class="col-auto">
        <h4 class="app-card-title">Clients List</h4>
      </div>
      <div class="col-auto">
        <a href="{{route('account_client_create')}}" class="btn app-btn-primary">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
          </svg>
          Create Client
        </a>
      </div>
      <!--//col-->
    </div>
    <!--//row-->
  </div>
  <!--//app-card-header-->
  <div class="app-card-body p-4">
    @if(count($clients) > 0)
    <div class="table-responsive">
      <table id="datatable_clients" class="table app-table-hover mb-0 text-left dt-table">
        <thead>
          <tr>
            <th class="cell ps-3">Name</th>
            <th class="cell">Email</th>
            <th class="cell">Phone</th>
            <th class="cell">Date</th>
            <th class="cell pe-3">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($clients as $client)
          <tr>
            <td class="cell truncate ps-3">{{$client->name}}</td>
            <td class="cell truncate">{{$client->email}}</td>
            <td class="cell truncate mw-150px">{{$client->phone}}</td>
            <td class="cell">
              <span>
                <?php
                echo date("dS M, Y", strtotime($client->created_at));
                ?>
              </span>
              <span class="note">
                <?php
                echo date("h:m A", strtotime($client->created_at));
                ?>
              </span>
            </td>
            <td class="cell pe-3 pe-md-3">
              <a class="btn-sm app-btn-secondary me-2" href="{{ route('account_client_show',$client->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg>
                <span class="d-none d-lg-inline-block">
                  Show
                </span>
              </a>
              <a class="btn-sm app-btn-secondary me-2" href="{{ route('account_client_edit',$client->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg>
                <span class="d-none d-lg-inline-block">
                  Edit
                </span>
              </a>
              <br class="d-none d-lg-inline-block">
              <a class="btn-sm app-btn-secondary border-danger text-danger mt-2 d-inline-block" href="{{ route('account_client_delete',$client->id) }}">
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
        No clients found
      </div>
    </div><!-- /.p-4 END -->
    @endif
  </div>
  <!--//app-card-body-->
</div>
<!--//app-card-->


@endsection