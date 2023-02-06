@extends('layouts.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Print Laporan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/kinerja">Kinerja</a></li>
                        <li class="breadcrumb-item active">Print Laporan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <form action="/halaman/print/kinerja" method="POST">
                            @csrf
                            <label>Pilih Tahun</label>
                            <select class="form-control select2" name="yearOption" style="width: 100%;">
                                <option value="">Pilih Tahun</option>
                                <option value="2023">2023</option>
                            </select>
                            <label>Pilih Bulan</label>
                            <select class="form-control select2" name="monthOption" style="width: 100%;">
                                <option value="">Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label></label>
                        <div class="input-group">
                            <button type="submit" class="btn btn-default">Print</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
    {{-- <script>
        $('#monthForm').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var month = form.find('[name="monthOption"]').val();

            $.ajax({
                type: "POST",
                url: "{{ route('print.laporan') }}",
                data: {
                    month: month,
                    _token: form.find('[name="_token"]').val()
                },
                success: function(response) {
                    window.location.href = '{{ url('/halaman/print/kinerja') }}';
                }
            });
        });
    </script> --}}
@endsection
