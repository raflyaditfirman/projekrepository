<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simulasi Tarif</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminLTE/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <aside class="main-sidebar sidebar-light-primary elevation-4">
        <img src="{{asset('adminLTE/dist/img/alter.jpg')}}" style="height: 5cm; width: 8cm" alt="AdminLTE Logo"><br>
        <a href="#" class="nav-link"><p>Perusahaan</p></a>
        <a href="{{ url('/') }}" class="nav-link"><p>Barang</p></a>
        </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card" style="margin-left: 5%; margin-right:5%">
                    <div class="card-body">
                        <form action="{{url('simpan')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>NPWP :</label>
                                <input type="text" id="npwp" class="form-control" name="npwp" required>
                            </div>

                            <div class="form-group">
                                <label>NAMA :</label>
                                <input type="text" id="nama" class="form-control" name="nama" required>
                            </div>

                            <div class="form-group">
                                <label>TRANSAKSI :</label>
                                <select class="form-control select2" name="transaksi" id="transaksi" required>
                                    <option selected="selected" value="EKSPOR">EKSPOR</option>
                                    <option value="IMPOR">IMPOR</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>NEGARA ASAL/TUJUAN :</label>
                                <select class="form-control select2" name="negara" required>
                                    @foreach ($users as $collection)
                                    @foreach ($collection as $item)
                                    <option selected="selected" value="{{$item['ur_negara']}}">{{$item['ur_negara']}}</option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>PELABUHAN TUJUAN :</label>
                                <select class="form-control select2" name="pelabuhan" required>
                                    @foreach ($pelabuhan as $collection)
                                    @foreach ($collection as $list)
                                    <option selected="selected" value="{{$list['ur_pelabuhan']}}">{{$list['ur_pelabuhan']}}</option>    
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>HS CODE :</label>
                                <select class="form-control select2" name="hscode" required>
                                @foreach ($barang as $collection)
                                @foreach ($collection as $hs)
                                <option selected="selected" value="{{$hs['hs_code_format']}}">{{$hs['hs_code_format']}}</option>
                                </select>   
                                @endforeach
                                @endforeach
                            </div>

                            <div class="form-group">
                                @foreach ($barang as $collection)
                                @foreach ($collection as $hs)   
                                <input type="text" id="uraianhs_code" class="form-control" name="uraianhs_code" value="{{$hs['uraian_id']}}" readonly>
                                @endforeach
                                @endforeach
                            </div>

                            <div class="form-group">
                                @foreach ($barang as $collection)
                                @foreach ($collection as $hs)   
                                <input type="text" id="subheaderhs_code" class="form-control" name="subheaderhs_code" value="{{$hs['sub_header']}}" readonly>
                                @endforeach
                                @endforeach
                            </div>


                            <div class="form-group">
                                <label>JUMLAH BARANG :</label>
                                <input type="text" id="jumlah" class="form-control" name="jumlah" required>
                            </div>

                            <div class="form-group">
                                <label>HARGA BARANG :</label>
                                <input type="text" id="harga" class="form-control" name="harga" required>
                            </div>

                            <div class="form-group">
                                <label>TARIF :</label>
                                @foreach ($tarif as $collection)
                                @foreach ($collection as $tr)
                                <input type="text" id="tarif" class="form-control" name="tarif" value="{{$tr['bk']+$tr['ppnbk']}}" required>
                                @endforeach
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label>TARIF PPN :</label>
                                <input type="text" id="ppn" class="form-control" name="ppn" required>
                            </div>

                            <div class="form-group">
                                <label>TOTAL HARGA :</label>
                                <input type="text" id="total" class="form-control" name="total" required>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">ADD</button>
                            </div>
                        </form>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.container-fluid -->
        </div>
    </div><!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    
    <!-- jQuery -->
    <script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('adminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('adminLTE/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('adminLTE/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('adminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('adminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('adminLTE/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('adminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('adminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('adminLTE/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('adminLTE/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('adminLTE/dist/js/pages/dashboard.js')}}"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#harga, #tarif").keyup(function() {
                var harga  = $("#harga").val();
                var tarif  = $("#tarif").val();
                var total = parseInt(harga) + (parseInt(tarif)*parseInt(harga));
                $("#total").val(total);
            });
        });
    </script>
    </body>
    </html>