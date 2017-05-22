<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  <style>
        table {
            border-collapse: collapse;
            font-size: .7em;
        }
        td, th {
            padding: 5px;
        }
        caption {
            font-weight: bold;
            margin-bottom: 10px;
        }
        thead, tfoot, .tunggal {
            background-color: rgba(255, 199, 96, 0.58);
        }
        .print-panel {
            margin-bottom: 20px;
            line-height: 2;
        }
        @media print {
            .print-panel {
                display: none;
            }
            table {
                border-collapse: collapse;
                font-size: .7em;
            }
            body {
              font-size: .8em;
            }
        }
    </style>

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{url('select2-4.0.3/dist/css/select2.min.css')}}">
    @yield('topscript')
</head>
<body>
@yield('content')
<script src="{{url('js/jquery.min.js')}}"></script>
<script src="{{url('select2-4.0.3/dist/js/select2.full.min.js')}}"></script>

<!-- <script src="{{url('TableExport-master/dist/js/fileSaver.min.js')}}"></script>

<script>
    $(document).ready(function() {
        var tables = $("table").tableExport();
         
    });
</script>
<script src="{{url('TableExport-master/dist/js/tableexport.min.js')}}"></script> -->
<script>
    // for export to excel
    $(document).ready(function() {
        
        $("#btnExportExcel").click(function(e) {
            e.preventDefault();
            var title = document.getElementsByTagName("title")[0].innerHTML;
            //getting data from our table
            var data_type = 'data:application/vnd.ms-excel';
            var table_div = document.getElementById('table_wrapper');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');

            var a = document.createElement('a');
            a.href = data_type + ', ' + table_html;
            a.download = title + '_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
            a.click();
          });
    });
</script>
@yield('bottscript')
</body>
</html>