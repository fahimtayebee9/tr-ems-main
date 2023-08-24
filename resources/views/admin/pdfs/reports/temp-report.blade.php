<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        .apexcharts-legend {
            display: flex;
            overflow: auto;
            padding: 0 10px;
        }

        .apexcharts-legend.position-bottom,
        .apexcharts-legend.position-top {
            flex-wrap: wrap
        }

        .apexcharts-legend.position-right,
        .apexcharts-legend.position-left {
            flex-direction: column;
            bottom: 0;
        }

        .apexcharts-legend.position-bottom.left,
        .apexcharts-legend.position-top.left,
        .apexcharts-legend.position-right,
        .apexcharts-legend.position-left {
            justify-content: flex-start;
        }

        .apexcharts-legend.position-bottom.center,
        .apexcharts-legend.position-top.center {
            justify-content: center;
        }

        .apexcharts-legend.position-bottom.right,
        .apexcharts-legend.position-top.right {
            justify-content: flex-end;
        }

        .apexcharts-legend-series {
            cursor: pointer;
            line-height: normal;
        }

        .apexcharts-legend.position-bottom .apexcharts-legend-series,
        .apexcharts-legend.position-top .apexcharts-legend-series {
            display: flex;
            align-items: center;
        }

        .apexcharts-legend-text {
            position: relative;
            font-size: 14px;
        }

        .apexcharts-legend-text *,
        .apexcharts-legend-marker * {
            pointer-events: none;
        }

        .apexcharts-legend-marker {
            position: relative;
            display: inline-block;
            cursor: pointer;
            margin-right: 3px;
        }

        .apexcharts-legend.right .apexcharts-legend-series,
        .apexcharts-legend.left .apexcharts-legend-series {
            display: inline-block;
        }

        .apexcharts-legend-series.no-click {
            cursor: auto;
        }

        .apexcharts-legend .apexcharts-hidden-zero-series,
        .apexcharts-legend .apexcharts-hidden-null-series {
            display: none !important;
        }

        .inactive-legend {
            opacity: 0.45;
        }
    </style>
</head>

<body>
    <H1>REPORT CHART</H1>
    @php
        $svgList = `<svg width="800" height="500">
                            <defs>
                                <clipPath id="rablfilter0">
                                    <rect x="31.5" y="83.5" width="648" height="364"></rect>
                                </clipPath>
                            </defs>
                            <g>
                                <rect x="0" y="0" width="800" height="500" fill="#ffffff" fill-opacity="1" stroke="#ffffff" stroke-opacity="0" stroke-width="0"></rect><text x="0" y="15" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 16px;" fill="#757575" dx="0px">Company Performance</text><text x="0" y="36" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 14px;" fill="#BDBDBD" dx="0px">Sales, Expenses, and Profit: 2014-2017</text>
                                <rect x="720.25" y="83.5" width="12" height="12" rx="2" ry="2" fill="#4285f4"></rect>
                                <text x="740.25" y="96.5" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto;" fill="#757575" dx="0px">Sales</text>
                                <rect x="720.25" y="116.5" width="12" height="12" rx="2" ry="2" fill="#db4437"></rect>
                                <text x="740.25" y="129.5" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto;" fill="#757575" dx="0px">Expenses</text>
                                <rect x="720.25" y="149.5" width="12" height="12" rx="2" ry="2" fill="#f4b400"></rect>
                                <text x="740.25" y="162.5" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto;" fill="#757575" dx="0px">Profit</text>
                                <rect x="31.5" y="83.5" width="648" height="364" fill="#ffffff" fill-opacity="1" stroke="#ffffff" stroke-opacity="0" stroke-width="1"></rect>
                            </g>
                            <g>
                                <line x1="31.5" x2="679.5" y1="447.5" y2="447.5" stroke="#9E9E9E" stroke-width="1">
                                </line>
                                <line x1="31.5" x2="679.5" y1="386.83333333333337" y2="386.83333333333337" stroke="#E0E0E0" stroke-width="1"></line>
                                <line x1="31.5" x2="679.5" y1="326.16666666666663" y2="326.16666666666663" stroke="#E0E0E0" stroke-width="1"></line>
                                <line x1="31.5" x2="679.5" y1="265.5" y2="265.5" stroke="#E0E0E0" stroke-width="1">
                                </line>
                                <line x1="31.5" x2="679.5" y1="204.83333333333331" y2="204.83333333333331" stroke="#E0E0E0" stroke-width="1"></line>
                                <line x1="31.5" x2="679.5" y1="144.16666666666666" y2="144.16666666666666" stroke="#E0E0E0" stroke-width="1"></line>
                                <line x1="31.5" x2="679.5" y1="83.5" y2="83.5" stroke="#E0E0E0" stroke-width="1"></line>
                            </g>
                            <g>
                                <path d="M 78.04109589041096 144.66666666666663 A 2 2 0 0 1 80.04109589041096 146.66666666666663 L 80.04109589041096 447 A 0 0 0 0 1 80.04109589041096 447 L 44 447 A 0 0 0 0 1 44 447 L 44 146.66666666666663 A 2 2 0 0 1 46 144.66666666666663 Z" fill="#4285f4" clip-path="url(#rablfilter0)"></path>
                                <path d="M 115.0821917808219 326.66666666666663 A 2 2 0 0 1 117.0821917808219 328.66666666666663 L 117.0821917808219 447 A 0 0 0 0 1 117.0821917808219 447 L 81.04109589041096 447 A 0 0 0 0 1 81.04109589041096 447 L 81.04109589041096 328.66666666666663 A 2 2 0 0 1 83.04109589041096 326.66666666666663 Z" fill="#db4437" clip-path="url(#rablfilter0)"></path>
                                <path d="M 152.12328767123284 387.33333333333337 A 2 2 0 0 1 154.12328767123284 389.33333333333337 L 154.12328767123284 447 A 0 0 0 0 1 154.12328767123284 447 L 118.0821917808219 447 A 0 0 0 0 1 118.0821917808219 447 L 118.0821917808219 389.33333333333337 A 2 2 0 0 1 120.0821917808219 387.33333333333337 Z" fill="#f4b400" clip-path="url(#rablfilter0)"></path>
                                <path d="M 248.99999999999994 93.10000000000002 A 2 2 0 0 1 250.99999999999994 95.10000000000002 L 250.99999999999994 447 A 0 0 0 0 1 250.99999999999994 447 L 214.95890410958904 447 A 0 0 0 0 1 214.95890410958904 447 L 214.95890410958904 95.10000000000002 A 2 2 0 0 1 216.95890410958904 93.10000000000002 Z" fill="#4285f4" clip-path="url(#rablfilter0)"></path>
                                <path d="M 286.04109589041093 308.4666666666667 A 2 2 0 0 1 288.04109589041093 310.4666666666667 L 288.04109589041093 447 A 0 0 0 0 1 288.04109589041093 447 L 251.99999999999994 447 A 0 0 0 0 1 251.99999999999994 447 L 251.99999999999994 310.4666666666667 A 2 2 0 0 1 253.99999999999994 308.4666666666667 Z" fill="#db4437" clip-path="url(#rablfilter0)"></path>
                                <path d="M 323.08219178082186 372.16666666666663 A 2 2 0 0 1 325.08219178082186 374.16666666666663 L 325.08219178082186 447 A 0 0 0 0 1 325.08219178082186 447 L 289.04109589041093 447 A 0 0 0 0 1 289.04109589041093 447 L 289.04109589041093 374.16666666666663 A 2 2 0 0 1 291.04109589041093 372.16666666666663 Z" fill="#f4b400" clip-path="url(#rablfilter0)"></path>
                                <path d="M 419.95890410958907 247.8 A 2 2 0 0 1 421.95890410958907 249.8 L 421.95890410958907 447 A 0 0 0 0 1 421.95890410958907 447 L 385.91780821917797 447 A 0 0 0 0 1 385.91780821917797 447 L 385.91780821917797 249.8 A 2 2 0 0 1 387.91780821917797 247.8 Z" fill="#4285f4" clip-path="url(#rablfilter0)"></path>
                                <path d="M 457 108.26666666666665 A 2 2 0 0 1 459 110.26666666666665 L 459 447 A 0 0 0 0 1 459 447 L 422.95890410958907 447 A 0 0 0 0 1 422.95890410958907 447 L 422.95890410958907 110.26666666666665 A 2 2 0 0 1 424.95890410958907 108.26666666666665 Z" fill="#db4437" clip-path="url(#rablfilter0)"></path>
                                <path d="M 494.041095890411 357 A 2 2 0 0 1 496.041095890411 359 L 496.041095890411 447 A 0 0 0 0 1 496.041095890411 447 L 460 447 A 0 0 0 0 1 460 447 L 460 359 A 2 2 0 0 1 462 357 Z" fill="#f4b400" clip-path="url(#rablfilter0)"></path>
                                <path d="M 590.917808219178 135.56666666666666 A 2 2 0 0 1 592.917808219178 137.56666666666666 L 592.917808219178 447 A 0 0 0 0 1 592.917808219178 447 L 556.8767123287671 447 A 0 0 0 0 1 556.8767123287671 447 L 556.8767123287671 137.56666666666666 A 2 2 0 0 1 558.8767123287671 135.56666666666666 Z" fill="#4285f4" clip-path="url(#rablfilter0)"></path>
                                <path d="M 627.958904109589 284.20000000000005 A 2 2 0 0 1 629.958904109589 286.20000000000005 L 629.958904109589 447 A 0 0 0 0 1 629.958904109589 447 L 593.917808219178 447 A 0 0 0 0 1 593.917808219178 447 L 593.917808219178 286.20000000000005 A 2 2 0 0 1 595.917808219178 284.20000000000005 Z" fill="#db4437" clip-path="url(#rablfilter0)"></path>
                                <path d="M 665 341.83333333333337 A 2 2 0 0 1 667 343.83333333333337 L 667 447 A 0 0 0 0 1 667 447 L 630.958904109589 447 A 0 0 0 0 1 630.958904109589 447 L 630.958904109589 343.83333333333337 A 2 2 0 0 1 632.958904109589 341.83333333333337 Z" fill="#f4b400" clip-path="url(#rablfilter0)"></path>
                            </g>
                            <g></g>
                            <g><text x="99.06164383561644" y="464.5" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 12px;" fill="#757575" dx="-13.4765625px">2014</text><text x="270.0205479452054" y="464.5" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 12px;" fill="#757575" dx="-13.4765625px">2015</text><text x="440.97945205479454" y="464.5" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 12px;" fill="#757575" dx="-13.4765625px">2016</text><text x="611.9383561643835" y="464.5" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 12px;" fill="#757575" dx="-13.4765625px">2017</text><text x="355.5" y="496.5" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 12px;" fill="#424242" dx="-11.890625px">Year</text><text x="25.5" y="451.5" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 12px;" fill="#757575" dx="-6.75px">0</text><text x="25.5" y="390.83332316080737" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 12px;" fill="#757575" dx="-20.21875px">200</text><text x="25.5" y="330.16667683919263" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 12px;" fill="#757575" dx="-20.21875px">400</text><text x="25.5" y="269.5" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 12px;" fill="#757575" dx="-20.21875px">600</text><text x="25.5" y="208.83333841959632" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 12px;" fill="#757575" dx="-20.21875px">800</text><text x="25.5" y="148.16666158040363" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 12px;" fill="#757575" dx="-14.265625px">1K</text><text x="25.5" y="87.5" style="cursor: default; user-select: none; -webkit-font-smoothing: antialiased; font-family: Roboto; font-size: 12px;" fill="#757575" dx="-24.171875px">1.2K</text></g>
                            <g></g>
                            <g></g>
                            <g></g>
                        </svg>`;
    @endphp
    <div>
        @foreach ($charts_list as $item)
        <img src="data:image/svg+xml;base64,' {{ base64_encode($item) }} '" style="max-width: 100%!important;" />
        @endforeach
    </div>

</body>

</html>
