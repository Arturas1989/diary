
<script>
    const getStudent = "{{route('students.data',$student)}}";
</script>
@extends('layouts.app')

@section('content')

{{-- <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales'],
        ['2004',  10],
        ['2005',  8],
        ['2006',  9],
        ['2007',  6]
      ]);

      var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
</script> --}}

    <div id="reload" class="btn btn-primary">dalinis page reloadas</div>
    <div id="atvaizdavimas"></div>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>

@endsection