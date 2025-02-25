// ================================ Column Charts Chart Start ================================
var options = {
    series: [
        {
            name: "Net Profit",
            data: [
                20000, 16000, 14000, 25000, 45000, 18000, 28000, 11000, 26000,
                48000, 18000, 22000,
            ],
        },
        {
            name: "Revenue",
            data: [
                15000, 18000, 19000, 20000, 35000, 20000, 18000, 13000, 18000,
                38000, 14000, 16000,
            ],
        },
    ],
    colors: ["#487FFF", "#FF9F29"],
    labels: ["Active", "New", "Total"],
    legend: {
        show: false,
    },
    chart: {
        type: "bar",
        height: 264,
        toolbar: {
            show: false,
        },
    },
    grid: {
        show: true,
        borderColor: "#D1D5DB",
        strokeDashArray: 4, // Use a number for dashed style
        position: "back",
    },
    plotOptions: {
        bar: {
            borderRadius: 4,
            columnWidth: 10,
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        show: true,
        width: 2,
        colors: ["transparent"],
    },
    xaxis: {
        categories: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ],
    },
    yaxis: {
        categories: [
            "0",
            "5000",
            "10,000",
            "20,000",
            "30,000",
            "50,000",
            "60,000",
            "60,000",
            "70,000",
            "80,000",
            "90,000",
            "100,000",
        ],
    },
    yaxis: {
        labels: {
            formatter: function (value) {
                return (value / 1000).toFixed(0) + "k";
            },
        },
    },
    tooltip: {
        y: {
            formatter: function (value) {
                return value / 1000 + "k";
            },
        },
    },
    fill: {
        opacity: 1,
        width: 18,
    },
};

var chart = new ApexCharts(document.querySelector("#columnChart"), options);
chart.render();
// ================================ Column Charts Chart End ================================

// ================================ Column with Group Label chart Start ================================
var options = {
    series: [
        {
            name: "Sales",
            data: [
                {
                    x: "Jan",
                    y: 85000,
                },
                {
                    x: "Feb",
                    y: 70000,
                },
                {
                    x: "Mar",
                    y: 40000,
                },
                {
                    x: "Apr",
                    y: 50000,
                },
                {
                    x: "May",
                    y: 60000,
                },
                {
                    x: "Jun",
                    y: 50000,
                },
                {
                    x: "Jul",
                    y: 40000,
                },
                {
                    x: "Aug",
                    y: 50000,
                },
                {
                    x: "Sep",
                    y: 40000,
                },
                {
                    x: "Oct",
                    y: 60000,
                },
                {
                    x: "Nov",
                    y: 30000,
                },
                {
                    x: "Dec",
                    y: 50000,
                },
            ],
        },
    ],
    chart: {
        type: "bar",
        height: 264,
        toolbar: {
            show: false,
        },
    },
    plotOptions: {
        bar: {
            horizontal: false,
            borderRadius: 8,
            columnWidth: 10,
            borderRadiusApplication: "end", // 'around', 'end'
            borderRadiusWhenStacked: "last", // 'all', 'last'
            columnWidth: "23%",
            endingShape: "rounded",
        },
    },
    dataLabels: {
        enabled: false,
    },
    fill: {
        type: "gradient",
        colors: ["#487FFF"], // Set the starting color (top color) here
        gradient: {
            shade: "light", // Gradient shading type
            type: "vertical", // Gradient direction (vertical)
            shadeIntensity: 0.5, // Intensity of the gradient shading
            gradientToColors: ["#487FFF"], // Bottom gradient color (with transparency)
            inverseColors: false, // Do not invert colors
            opacityFrom: 1, // Starting opacity
            opacityTo: 1, // Ending opacity
            stops: [0, 100],
        },
    },
    grid: {
        show: true,
        borderColor: "#D1D5DB",
        strokeDashArray: 4, // Use a number for dashed style
        position: "back",
    },
    xaxis: {
        type: "category",
        categories: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ],
    },
    yaxis: {
        labels: {
            formatter: function (value) {
                return (value / 1000).toFixed(0) + "k";
            },
        },
    },
    tooltip: {
        y: {
            formatter: function (value) {
                return value / 1000 + "k";
            },
        },
    },
};

var chart = new ApexCharts(
    document.querySelector("#columnGroupBarChart"),
    options
);
chart.render();
// ================================ Column with Group Label chart End ================================

// ================================ Group Column Bar chart Start ================================
document.addEventListener("DOMContentLoaded", function () {
    fetch("/stacked-bar-chart-data")
        .then((response) => response.json())
        .then((data) => {
            var options = {
                series: data.series, // Data untuk series
                chart: {
                    type: "bar",
                    height: 264,
                    stacked: true,
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: true,
                    },
                },
                responsive: [
                    {
                        breakpoint: 480,
                        options: {
                            legend: {
                                // show: false,
                                position: "bottom",
                                // offsetX: -10,
                                offsetY: 10,
                            },
                        },
                    },
                ],
                colors: ["#487FFF", "#FF9F29"], 
                plotOptions: {
                    bar: {
                        horizontal: false,
                        borderRadius: 4,
                        columnWidth: 10,
                        dataLabels: {
                            total: {
                                enabled: false,
                                style: {
                                    fontSize: "13px",
                                    fontWeight: 900,
                                },
                            },
                        },
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                xaxis: {
                    type: "category",
                    categories: data.categories,
                },
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            return value;
                        },
                    },
                },
                tooltip: {
                    y: {
                        formatter: function (value) {
                            return value;
                        },
                    },
                },
                legend: {
                    position: "bottom",
                    offsetY: 10,
                    show: true,
                },
                fill: {
                    opacity: 1,
                },
            };

            var chart = new ApexCharts(
                document.querySelector("#groupColumnBarChart"),
                options
            );
            chart.render();
        })
        .catch((error) => console.error("Error fetching chart data:", error));
});

// ================================ Group Column Bar chart End ================================

// ================================ Simple Column (Bars Up Down) chart End ================================
var options = {
    series: [
        {
            name: "Males",
            data: [
                0.4, 0.65, 0.76, 0.88, 1.5, 2.1, 2.9, 3.8, 3.9, 4.2, 4, 4.3,
                4.1, 4.2, 4.5, 3.9, 3.5, 3,
            ],
        },
        {
            name: "Females",
            data: [
                -0.8, -1.05, -1.06, -1.18, -1.4, -2.2, -2.85, -3.7, -3.96,
                -4.22, -4.3, -4.4, -4.1, -4, -4.1, -3.4, -3.1, -2.8,
            ],
        },
    ],
    chart: {
        type: "bar",
        height: 264,
        stacked: true,
        toolbar: {
            show: false,
        },
    },
    colors: ["#008FFB", "#FF4560"],
    plotOptions: {
        bar: {
            borderRadius: 2,
            borderRadiusApplication: "end", // 'around', 'end'
            borderRadiusWhenStacked: "all", // 'all', 'last'
            horizontal: true,
            barHeight: "80%",
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        width: 1,
        colors: ["#fff"],
    },

    grid: {
        xaxis: {
            lines: {
                show: false,
            },
        },
    },
    yaxis: {
        stepSize: 1,
    },
    tooltip: {
        shared: false,
        x: {
            formatter: function (val) {
                return val;
            },
        },
        y: {
            formatter: function (val) {
                return Math.abs(val) + "%";
            },
        },
    },
    xaxis: {
        categories: [
            "85+",
            "80-84",
            "75-79",
            "70-74",
            "65-69",
            "60-64",
            "55-59",
            "50-54",
            "45-49",
            "40-44",
            "35-39",
            "30-34",
            "25-29",
            "20-24",
            "15-19",
            "10-14",
            "5-9",
            "0-4",
        ],
        title: {
            text: "Percent",
        },
        labels: {
            formatter: function (val) {
                return Math.abs(Math.round(val)) + "%";
            },
        },
    },
};

var chart = new ApexCharts(document.querySelector("#upDownBarchart"), options);
chart.render();
// ================================ Simple Column (Bars Up Down) chart End ================================
