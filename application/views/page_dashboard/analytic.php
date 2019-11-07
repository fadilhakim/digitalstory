<section class="paper-card">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header white">Active Users right now</div>
                <div class="card-body p-0">
                    <div class="bg-primary text-white lighten-2"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <div class="pt-5 pb-2 pl-5 pr-5">
                            <h5 class="font-weight-normal s-14">Users</h5>
                            <span class="s-48 font-weight-lighter text-primary" id="userNow"></span>
                            <div class="float-right">
                                <span class="icon icon-chart s-48"></span>
                            </div>
                        </div>
                        <canvas width="626" height="154" data-chart="spark" data-chart-type="bar" data-dataset="[[28,68,41,43,96,45,100,28,68,41,43,96,45,100]]" data-labels="['a','b','c','d','e','f','g','h','i','j','k','l','m','n']" class="chartjs-render-monitor js-chart-drawn" style="display: block; height: 77px; width: 313px;">
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">What pages do your users visit?</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="pagePathAnalytic" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Page</th>
                                <th>Page Views</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var access_token = '<?= $gauthStore->access_token?>';
    var view_id = '<?= $gauthStore->view_id?>'

    $.ajax({
        url: 'https://www.googleapis.com/analytics/v3/data/ga?ids=ga%3A' + view_id + '&start-date=yesterday&end-date=today&metrics=ga%3Apageviews&dimensions=ga%3ApagePath&sort=-ga%3Apageviews',
        type: 'GET',
        beforeSend: function(xhr){xhr.setRequestHeader('Authorization', 'Bearer ' + access_token);},
        success: function (data) {
            var rows = data.rows;
            var result = '';
            $.each(rows, function (index, value){
                result = result + '<tr>';
                $.each(value, function (index2, value2) {
                    result = result + '<td>' + value2 + '</td>';
                })
                result = result + '</tr>';
            })
            $(result).insertAfter('#pagePathAnalytic thead')
        }
    });
    $.ajax({
        url: 'https://www.googleapis.com/analytics/v3/data/realtime?ids=ga%3A' + view_id + '&metrics=rt:activeUsers',
        type: 'GET',
        beforeSend: function(xhr){xhr.setRequestHeader('Authorization', 'Bearer ' + access_token);},
        success: function (data) {
            $('#userNow').text(data.totalResults);
        }
    });
</script>