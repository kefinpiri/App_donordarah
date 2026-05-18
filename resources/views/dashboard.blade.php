@extends('layouts.admin')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <h3>Dashboard Admin</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>100</h3>
                            <p>Total Donor</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>50</h3>
                            <p>Permintaan Darah</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
