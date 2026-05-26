@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow-sm border-0 rounded-4">

            <div class="card-header bg-danger text-white rounded-top-4">

                <h4 class="mb-0">
                    Riwayat Donor
                </h4>

            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">

                        {{ session('success') }}

                    </div>
                @endif

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-danger">

                            <tr>

                                <th>No</th>

                                <th>Tanggal Donor</th>

                                <th>Lokasi</th>

                                <th>Status</th>

                                <th>Catatan</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($donorDarah as $item)
                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->tanggal_donor }}
                                    </td>

                                    <td>
                                        {{ $item->lokasi }}
                                    </td>

                                    <td>

                                        @if ($item->status == 'Menunggu')
                                            <span class="badge bg-warning">
                                                {{ $item->status }}
                                            </span>
                                        @elseif($item->status == 'Diterima')
                                            <span class="badge bg-primary">
                                                {{ $item->status }}
                                            </span>
                                        @elseif($item->status == 'Selesai')
                                            <span class="badge bg-success">
                                                {{ $item->status }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                {{ $item->status }}
                                            </span>
                                        @endif

                                    </td>

                                    <td>
                                        {{ $item->catatan }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center">

                                        Belum ada riwayat donor

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
@endsection
