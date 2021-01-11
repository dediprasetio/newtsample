<script>
    $(document).ready(function() {
        initData();
    });

    function initData() {
        $.ajax({
            url: '<?php echo base_url("api-load-data/summary") ?>',
            //url: 'http://localhost/dashboard-Template/exper/load_data.php',
            dataType: "json",
            success: function(data) {
                //$('#total_trip').text(data.summary.total_trip);
                $.each(data.summary, function(key, value) {
                    console.log(data.month);
                    // $('#area_' + key + '_report_month_01').text(data.month);
                    // $('#area_' + key + '_report_month_02').text(data.month);
                    // $('#area_' + key + ' #UN10').text(value.area.UN10);
                    // $('#area_' + key + ' #UP10').text(value.area.UP10);
                    // $('#area_' + key + ' #UN2H').text(value.area.UN2H);
                    // $('#area_' + key + ' #UP2H').text(value.area.UP2H);
                    // $('#area_' + key + ' #energy').text(value.area.energy);
                    // $('#area_' + key + ' #cost').text(value.area.cost);
                    // $('#area_' + key + ' #energy_fc').text(value.area.energy_fc);
                    // $('#area_' + key + ' #cost_fc').text(value.area.cost_fc);

                    document.getElementById('area_' + key + '_report_month_01').innerHTML = data.month;
                    document.getElementById('area_' + key + '_report_month_02').innerHTML = data.month;
                    // document.getElementById('area_' + key + ' #report_month_01').innerHTML = value.area.UN10;
                    // document.getElementById('area_' + key + ' #report_month_01').innerHTML = data.month;
                    // document.getElementById('area_' + key + ' #report_month_01').innerHTML = data.month;
                    // document.getElementById('area_' + key + ' #report_month_01').innerHTML = data.month;
                    // document.getElementById('area_' + key + ' #report_month_01').innerHTML = data.month;
                    // document.getElementById('area_' + key + ' #report_month_01').innerHTML = data.month;
                    // document.getElementById('area_' + key + ' #report_month_01').innerHTML = data.month;
                    // document.getElementById('area_' + key + ' #report_month_01').innerHTML = data.month;
                });
                setTimeout(initData, 5000);
            }
        });
    }
</script>