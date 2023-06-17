@extends('admin.layout')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3>{{ $page_title }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" bis_skin_checked="1">
                                    <table class="table table-bordered mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row" width="250">Contact Name</th>
                                                <td>{{ $row->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td>{{ $row->email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Mobile</th>
                                                <td>{{ $row->mobile }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Company</th>
                                                <td>{{ $row->company }}</td>
                                            </tr>
                                            @if ($row->website)
                                                <tr>
                                                    <th scope="row">Website</th>
                                                    <td>{{ @$row->website }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th scope="row">Package</th>
                                                <td>{{ $row->package }}</td>
                                            </tr>
                                            @if ($row->addons)
                                                <tr>
                                                    <th scope="row">Addons</th>
                                                    <td>{{ @$row->addons }}</td>
                                                </tr>
                                            @endif
                                            @if ($row->business_consultation)
                                                <tr>
                                                    <th scope="row">Business Consultation</th>
                                                    <td>{{ @$row->business_consultation }}</td>
                                                </tr>
                                            @endif
                                            @if ($row->business_solutions)
                                                <tr>
                                                    <th scope="row">Business Solutions</th>
                                                    <td>{{ @$row->business_solutions }}</td>
                                                </tr>
                                            @endif
                                            @if ($row->development)
                                                <tr>
                                                    <th scope="row">Development</th>
                                                    <td>{{ @$row->development }}</td>
                                                </tr>
                                            @endif
                                            @if ($row->marketing)
                                                <tr>
                                                    <th scope="row">Marketing</th>
                                                    <td>{{ @$row->marketing }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th scope="row">Submitted At</th>
                                                <td>{{ @$row->created_at }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.includes.footer')
        </div>
    @endsection
