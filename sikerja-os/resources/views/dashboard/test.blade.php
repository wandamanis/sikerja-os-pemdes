<title id='Description'>This sample demonstrates the basic Gauge settings.</title>
<link rel="stylesheet" href="../../jqwidgets/styles/jqx.base.css" type="text/css" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1 minimum-scale=1" />
<script type="text/javascript" src="../../scripts/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../../scripts/demos.js"></script>
<script type="text/javascript" src="../../jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="../../jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="../../jqwidgets/jqxdraw.js"></script>
<script type="text/javascript" src="../../jqwidgets/jqxgauge.js"></script>
<script type="text/javascript" src="../../jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="../../jqwidgets/jqxcheckbox.js"></script>
<script type="text/javascript" src="../../jqwidgets/jqxradiobutton.js"></script>
<script type="text/javascript" src="../../jqwidgets/jqxexpander.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var labels = {
            visible: true,
            position: 'inside'
        };

        //Create jqxGauge
        $('#gauge').jqxGauge({
            ranges: [{
                    startValue: 0,
                    endValue: 25,
                    style: {
                        // fill: '#e2e2e2',
                        // stroke: '#e2e2e2'
                        fill: '#d02841',
                        stroke: '#d02841'
                    },
                    startDistance: '5%',
                    endDistance: '5%',
                    endWidth: 5,
                    startWidth: 1
                },
                {
                    startValue: 25,
                    endValue: 50,
                    style: {
                        fill: '#db5016',
                        stroke: '#db5016'

                    },
                    startDistance: '5%',
                    endDistance: '5%',
                    endWidth: 10,
                    startWidth: 5
                },
                {
                    startValue: 50,
                    endValue: 75,
                    style: {
                        fill: '#f6de54',
                        stroke: '#f6de54'
                    },
                    startDistance: '5%',
                    endDistance: '5%',
                    endWidth: 13,
                    startWidth: 10
                },
                {
                    startValue: 75,
                    endValue: 100,
                    style: {
                        fill: '#4bb648',
                        stroke: '#4bb648'
                    },
                    startDistance: '5%',
                    endDistance: '5%',
                    endWidth: 16,
                    startWidth: 13
                }
            ],
            cap: {
                radius: 0.04
            },
            // caption: {
            //     offset: [0, -25],
            //     value: 'jQWidgets',
            //     position: 'bottom'
            // },
            value: 0,
            style: {
                stroke: '#ffffff',
                'stroke-width': '1px',
                fill: '#ffffff'
            },
            animationDuration: 1500,
            colorScheme: 'scheme04',
            labels: labels,
            ticksMinor: {
                interval: 1,
                size: '5%'
            },
            ticksMajor: {
                interval: 5,
                size: '10%'
            },
            max: 100,
        });

        // set gauge's value.
        $('#gauge').jqxGauge('setValue', 100);
    });
</script>
</head>

<body class='default'>
    <div class="demo-gauge" style="width: 600px;">
        <div id="gauge" style="float: left;"></div>
        <div id="expander" style="float: right;">
            <div>
                Options
            </div>
            <div>
                {{-- <ul style="list-style: none; padding: 0px; margin: 10px;">
                    <li style="padding: 3px; font-family: Verdana; font-size: 12px;">
                        <div id="showLabelsCheckbox">Show labels</div>
                        <ul
                            style="list-style: none; padding: 0px; margin-top: 10px; margin-left: 20px; font-family: Verdana; font-size: 12px;">
                            <li>
                                <div id="insideRadio">Inside the gauge</div>
                            </li>
                            <li>
                                <div style="margin-top: 5px;" id="outsideRadio">Outside the gauge</div>
                            </li>
                        </ul>
                    </li>
                    <li style="padding: 3px; font-family: Verdana; font-size: 12px;">
                        <div id="showRangesCheckbox">Show ranges</div>
                    </li>
                    <li style="padding: 3px; font-family: Verdana; font-size: 12px;">
                        <div id="showBorderCheckbox">Show border</div>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
</body>
