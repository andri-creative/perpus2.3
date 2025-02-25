$(document).ready(function () {
    $("#yearPengunjungSelector").on("change", function () {
        var year = $(this).val();
        fetchVisitorData(year);
    });

    $.ajax({
        url: "/visitor-data",
        method: "GET",
        success: function (data) {
            // Update total values
            $("#totalPengunjung").text(data.total_pengunjung);
            $("#totalKeluar").text(data.total_keluar);

            // Create chart
            var options = {
                series: [
                    {
                        name: "Total Pengunjung",
                        data: data.total_pengunjung_per_bulan,
                    },
                    {
                        name: "Total Keluar",
                        data: data.total_keluar_per_bulan,
                    },
                ],
                colors: ["#487FFF", "#FF9F29"],
                labels: ["Total Pengunjung", "Total Keluar"],
                legend: {
                    show: false,
                },
                chart: {
                    type: "bar",
                    height: 250,
                    toolbar: {
                        show: false,
                    },
                },
                grid: {
                    show: true,
                    borderColor: "#D1D5DB",
                    strokeDashArray: 4,
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
                    categories: data.categories,
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
                fill: {
                    opacity: 1,
                    width: 18,
                },
            };

            var chart = new ApexCharts($("#visitorAndExit")[0], options);
            chart.render();
        },
        error: function (xhr, status, error) {
            console.error("Error fetching visitor data:", error);
        },
    });
});

// document.getElementById("filter").addEventListener("change", function () {
//     var year = this.value;
//     fetchVisitorData(year);
// });

// function fetchVisitorData(year) {
//     fetch(`/visitor-data?year=${year}`)
//         .then((response) => response.json())
//         .then((data) => {
//             // Populate filter dropdown
//             var filter = document.getElementById("filter");
//             filter.innerHTML = "";
//             data.years.forEach(function (year) {
//                 var option = document.createElement("option");
//                 option.value = year;
//                 option.text = year;
//                 filter.appendChild(option);
//             });

//             filter.value = year;

//             // Data total
//             document.getElementById("totalPengunjungTahunan").innerText =
//                 data.total_pengunjung_tahun;
//             document.getElementById("totalKeluarTahunan").innerText =
//                 data.total_keluar_tahun;

//             // Create Chart batang
//             var options = {
//                 series: [
//                     {
//                         name: "Total Pengunjung",
//                         data: data.total_pengunjung_per_bulan,
//                     },
//                     {
//                         name: "Total Keluar",
//                         data: data.total_keluar_per_bulan,
//                     },
//                 ],
//                 colors: ["#487FFF", "#FF9F29"],
//                 labels: ["Total Pengunjung", "Total Keluar"],
//                 legend: {
//                     show: false,
//                 },
//                 chart: {
//                     type: "bar",
//                     height: 250,
//                     toolbar: {
//                         show: false,
//                     },
//                 },
//                 grid: {
//                     show: true,
//                     borderColor: "#D1D5DB",
//                     strokeDashArray: 4, // Use a number for dashed style
//                     position: "back",
//                 },
//                 plotOptions: {
//                     bar: {
//                         borderRadius: 4,
//                         columnWidth: 10,
//                     },
//                 },
//                 dataLabels: {
//                     enabled: false,
//                 },
//                 stroke: {
//                     show: true,
//                     width: 2,
//                     colors: ["transparent"],
//                 },
//                 xaxis: {
//                     categories: data.categories,
//                 },
//                 yaxis: {
//                     categories: [
//                         "0",
//                         "5000",
//                         "10,000",
//                         "20,000",
//                         "30,000",
//                         "50,000",
//                         "60,000",
//                         "60,000",
//                         "70,000",
//                         "80,000",
//                         "90,000",
//                         "100,000",
//                     ],
//                 },
//                 fill: {
//                     opacity: 1,
//                     width: 18,
//                 },
//             };

//             var chart = new ApexCharts(
//                 document.querySelector("#visitorAndExit"),
//                 options
//             );
//             chart.render();
//         });
// }

// // Fetch initial data for current year
// fetchVisitorData(new Date().getFullYear());

// Misalnya di dalam file js/main.js

fetch("/visitor-data")
    .then((response) => response.json())
    .then((data) => {
        // Update total values
        document.getElementById("totalPengunjung").innerText =
            data.total_pengunjung;
        document.getElementById("totalKeluar").innerText = data.total_keluar;

        // Create chart
        var options = {
            series: [
                {
                    name: "Total Pengunjung",
                    data: data.total_pengunjung_per_bulan,
                },
                {
                    name: "Total Keluar",
                    data: data.total_keluar_per_bulan,
                },
            ],
            colors: ["#487FFF", "#FF9F29"],
            labels: ["Total Pengunjung", "Total Keluar"],
            legend: {
                show: false,
            },
            chart: {
                type: "bar",
                height: 250,
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
                categories: data.categories,
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
            fill: {
                opacity: 1,
                width: 18,
            },
        };

        var chart = new ApexCharts(
            document.querySelector("#visitorAndExit"),
            options
        );
        chart.render();
    });
