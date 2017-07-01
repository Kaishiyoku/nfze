@if (!empty($data))
    <script type="text/javascript">
        $(document).ready(function () {
            $('{{ $selector }}').highcharts({
                series: [{
                    data: {!! json_encode($data) !!},
                    pointStart: 1
                }],
                chart: {
                    type: 'area',
                    margin: [2, 0, 2, 0],
                    width: $('{{ $selector }}').width(),
                    height: 40,
                    style: {
                        overflow: 'visible',
                        display: 'inline-block',
                    },
                    skipClone: true
                },
                title: {
                    text: ''
                },
                credits: {
                    enabled: false
                },
                xAxis: {
                    labels: {
                        enabled: false
                    },
                    title: {
                        text: null
                    },
                    startOnTick: false,
                    endOnTick: false,
                    tickPositions: []
                },
                yAxis: {
                    endOnTick: false,
                    startOnTick: false,
                    labels: {
                        enabled: false
                    },
                    title: {
                        text: null
                    },
                    tickPositions: [0],
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    backgroundColor: '#fff',
                    borderWidth: 1,
                    shadow: true,
                    useHTML: true,
                    hideDelay: 0,
                    shared: true,
                    padding: 5,
                    formatter: function () {
                        if (this.y === -1) {
                            return '<span class="text-danger">offline</span>';
                        }

                        return this.points[0].key + '<br/>' + this.y + 'ms';
                    },
                    positioner: function (w, h, point) {
                        return { x: point.plotX - w / 2, y: (point.plotY - h) - 10 };
                    }
                },
                plotOptions: {
                    series: {
                        animation: false,
                        lineWidth: 1,
                        shadow: false,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        marker: {
                            radius: 1,
                            states: {
                                hover: {
                                    radius: 2
                                }
                            }
                        },
                        fillOpacity: 0.25
                    }
                }
            });
        });
    </script>
@endif