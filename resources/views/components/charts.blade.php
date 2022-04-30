<div id="chartDiv" style="max-width: 740px;height: 215px;margin: 0px auto">
</div>
<script>
    // JS 
var chart = JSC.chart('chartDiv', { 
  debug: true, 
  type: 'calendar year solid', 
  data: './resources/collisionInjuries2017.csv', 
  title_label_text: 
    'Vehicular Accident Injuries 2017', 
  defaultSeries_legendEntry_value: 'Total: %zSum', 
  palette_colorBar_axis_scale_interval: 10, 
  annotations: [ 
    { 
      padding: 8, 
      label_text: 
        'Source: http://data.sanjoseca.gov/dataviews/229378/2010-2015-san-jose-crash-data/ ', 
      position: 'bottom'
    } 
  ], 
  toolbar_visible: false
}); 
</script>