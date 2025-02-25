// =========================== Jumlah Buku per Bulan Line Start ===============================

document.addEventListener("DOMContentLoaded", function () {
    const yearSelector = document.getElementById("yearSelector");
    let LineChart;
    let pieChart;
    let stackedBarChart;
    let BarChart;
    let DoneteKeterlambatan;

    // Fungsi Line Chart jumlah Buku Start
    function loadDataLineChart(year) {
        fetch(`/dashboard/books-data?year=${year}`)
            .then((response) => response.json())
            .then((data) => {
                // console.log("Data received:", data);

                const options = {
                    series: [
                        {
                            name: "Jumlah Buku",
                            data: data.data,
                        },
                    ],
                    chart: {
                        height: 264,
                        type: "line",
                        toolbar: { show: false },
                        zoom: { enabled: false },
                        dropShadow: {
                            enabled: true,
                            top: 6,
                            left: 0,
                            blur: 4,
                            color: "#000",
                            opacity: 0.1,
                        },
                    },
                    dataLabels: { enabled: false },
                    stroke: {
                        curve: "smooth",
                        colors: ["#487FFF"],
                        width: 3,
                    },
                    markers: {
                        size: 0,
                        strokeWidth: 3,
                        hover: { size: 8 },
                    },
                    grid: {
                        row: {
                            colors: ["transparent", "transparent"],
                            opacity: 0.5,
                        },
                        borderColor: "#D1D5DB",
                        strokeDashArray: 3,
                    },
                    yaxis: {
                        labels: {
                            formatter: (value) => `${value} Buku`,
                            style: { fontSize: "14px" },
                        },
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
                        tooltip: { enabled: false },
                        labels: {
                            style: { fontSize: "14px" },
                        },
                    },
                };

                if (LineChart) {
                    LineChart.updateOptions(options);
                } else {
                    LineChart = new ApexCharts(
                        document.querySelector("#LineBukuchart"),
                        options
                    );
                    LineChart.render();
                }

                // Update indikator
                document.querySelector(
                    "#booksCurrentYear"
                ).textContent = `${data.booksCurrentYear} Buku`;
                document.querySelector(
                    "#percentageChange"
                ).textContent = `${data.percentageChange}%`;

                const indicator = document.querySelector("#trendIndicator");
                indicator.className = `text-sm fw-semibold rounded ${data.trendColor} border br-success px-10 py-4 line-height-1 d-inline-flex align-items-center gap-1`;
                indicator.querySelector("span").textContent =
                    data.trend === "up" ? "+" : "";
                indicator
                    .querySelector("iconify-icon")
                    .setAttribute(
                        "icon",
                        data.trend === "up" ? "bxs:up-arrow" : "bxs:down-arrow"
                    );
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
    }
    // Fungsi Line Chart jumlah Buku End

    // Pie Chart Status Peminjaman Start
    function loadPieChartData(year) {
        fetch(`/dashboard/chart-data?year=${year}`)
            .then((response) => response.json())
            .then((data) => {
                const options = {
                    series: data.series,
                    chart: { height: 264, type: "pie" },
                    stroke: { show: false },
                    labels: data.labels,
                    colors: ["#487FFF", "#FF9F29", "#45B369", "#EF4A00"],
                    plotOptions: {
                        pie: { dataLabels: { dropShadow: { enabled: true } } },
                    },
                    legend: {
                        position: "bottom",
                        horizontalAlign: "center",
                    },
                    responsive: [
                        {
                            breakpoint: 480,
                            options: {
                                chart: { width: 200 },
                                legend: {
                                    show: false,
                                    position: "bottom",
                                    horizontalAlign: "center",
                                    offsetX: -10,
                                    offsetY: 0,
                                },
                            },
                        },
                    ],
                };

                if (pieChart) {
                    pieChart.updateOptions(options);
                } else {
                    pieChart = new ApexCharts(
                        document.querySelector("#pieChartStatusPeminjamanBaru"),
                        options
                    );
                    pieChart.render();
                }
            })
            .catch((error) =>
                console.error("Error fetching chart data:", error)
            );
    }
    // Pie Chart Status Peminjaman End

    // Funsi stackedBarChart  Jumlah Buku Tersedia vs. Dipinjam Start
    function loadStackedBarChartData(year) {
        fetch(`/dashboard/stacked-bar-chart-data?year=${year}`)
            .then((response) => response.json())
            .then((data) => {
                var options = {
                    series: data.series,
                    chart: {
                        type: "bar",
                        height: 264,
                        stacked: true,
                        toolbar: { show: false },
                        zoom: { enabled: true },
                    },
                    responsive: [
                        {
                            breakpoint: 480,
                            options: {
                                legend: {
                                    position: "bottom",
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

                if (stackedBarChart) {
                    stackedBarChart.updateOptions(options);
                } else {
                    stackedBarChart = new ApexCharts(
                        document.querySelector("#groupColumnBarChartBaru"),
                        options
                    );
                    stackedBarChart.render();
                }
            })
            .catch((error) =>
                console.error("Error fetching chart data:", error)
            );
    }
    // Funsi stackedBarChart  Jumlah Buku Tersedia vs. Dipinjam End

    // Fungsi Start
    function loadDataBarChart(year) {
        fetch(`/dashboard/visitor-data?year=${year}`)
            .then((response) => response.json())
            .then((data) => {
                // console.log("ini data:", data.total_pengunjung);

                var options = {
                    series: [
                        {
                            name: "Total Pengunjung",
                            data: data.total_pengunjung,
                        },
                        {
                            name: "Total Keluar",
                            data: data.total_pengunjung_keluar,
                        },
                    ],
                    colors: ["#487FFF", "#FF9F29"],
                    labels: ["Active", "New", "Total"],
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
                    fill: {
                        opacity: 1,
                        width: 18,
                    },
                };

                if (BarChart) {
                    BarChart.updateOptions(options);
                } else {
                    BarChart = new ApexCharts(
                        document.querySelector("#visitorAndExit"),
                        options
                    );
                    BarChart.render();
                }
            });
    }
    // Fungsi End

    // Funsi Keterlabtan Pie Donete Start
    function loadDataKeterlambatanDonate(year) {
        fetch(`/dashboard/keterlabatan?year=${year}`)
            .then((response) => response.json())
            .then((data) => {
                // console.log(data.terlambat);
                // console.log(data.tepat_waktu);
                const terlambat = data.terlambat || 0;
                const tepatWaktu = data.tepat_waktu || 0;
                const total = terlambat + tepatWaktu;

                document.querySelector(".terlambat").textContent = terlambat;
                document.querySelector(".tepatWaktu").textContent = tepatWaktu;

                let persentaseTerlambat = 0;
                let persentaseTepatWaktu = 0;

                if (total > 0) {
                    persentaseTerlambat = (terlambat / total) * 100;
                    persentaseTepatWaktu = (tepatWaktu / total) * 100;
                }

                persentaseTerlambat = persentaseTerlambat.toFixed(2);
                persentaseTepatWaktu = persentaseTepatWaktu.toFixed(2);

                document.querySelector(
                    ".persentase-terlambat"
                ).textContent = `+${persentaseTerlambat}%`;
                document.querySelector(
                    ".persentase-tepat-waktu"
                ).textContent = `+${persentaseTepatWaktu}%`;

                var options = {
                    series: [terlambat, tepatWaktu],
                    colors: ["#FF9F29", "#487FFF"],
                    labels: ["Terlambat", "Tepat Waktu"],
                    legend: {
                        show: false,
                    },
                    chart: {
                        type: "donut",
                        height: 260,
                        sparkline: {
                            enabled: true,
                        },
                        margin: {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0,
                        },
                        padding: {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0,
                        },
                    },
                    stroke: {
                        width: 0,
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    responsive: [
                        {
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200,
                                },
                                legend: {
                                    position: "bottom",
                                },
                            },
                        },
                    ],
                };

                if (DoneteKeterlambatan) {
                    // Jika grafik sudah ada, perbarui opsi dan data
                    DoneteKeterlambatan.updateOptions(options);
                } else {
                    // Jika grafik belum ada, buat grafik baru
                    DoneteKeterlambatan = new ApexCharts(
                        document.querySelector("#keterlambatanDonutChart"),
                        options
                    );
                    DoneteKeterlambatan.render();
                }
            });
    }
    // Funsi Keterlabtan Pie Donete End

    // Event listener untuk dropdown
    if (yearSelector) {
        yearSelector.addEventListener("change", function () {
            // console.log("Year changed to:", this.value);
            const selectedYear = this.value;
            loadDataLineChart(selectedYear);
            loadPieChartData(selectedYear);
            loadStackedBarChartData(selectedYear);
            loadDataBarChart(selectedYear);
            loadDataKeterlambatanDonate(selectedYear);
        });

        // Load data pertama kali
        const initialYear = yearSelector.value;
        loadDataLineChart(initialYear);
        loadPieChartData(initialYear);
        loadStackedBarChartData(initialYear);
        loadDataBarChart(initialYear);
        loadDataKeterlambatanDonate(initialYear);
    } else {
        console.error("Element with id 'yearSelector' not found!");
    }
});

// =========================== Jumlah Buku per Bulan Line End ===============================

// ============================ Pie Chart Status Peminjaman Start ==========================
// document.addEventListener("DOMContentLoaded", function () {
//     // Ambil data dari server
//     fetch("/dashboard/chart-data")
//         .then((response) => response.json())
//         .then((data) => {
//             // Gunakan data yang diambil untuk pie chart
//             // alert("ini data pie");
//             var options = {
//                 series: data.series, // Data dari server
//                 chart: {
//                     height: 264,
//                     type: "pie",
//                 },
//                 stroke: {
//                     show: false, // Remove white border
//                 },
//                 labels: data.labels, // Labels dari server
//                 colors: ["#487FFF", "#FF9F29", "#45B369", "#EF4A00"],
//                 plotOptions: {
//                     pie: {
//                         dataLabels: {
//                             dropShadow: {
//                                 enabled: true,
//                             },
//                         },
//                     },
//                 },
//                 legend: {
//                     position: "bottom",
//                     horizontalAlign: "center", // Align the legend horizontally
//                 },
//                 responsive: [
//                     {
//                         breakpoint: 480,
//                         options: {
//                             chart: {
//                                 width: 200,
//                             },
//                             legend: {
//                                 show: false,
//                                 position: "bottom",
//                                 horizontalAlign: "center",
//                                 offsetX: -10,
//                                 offsetY: 0,
//                             },
//                         },
//                     },
//                 ],
//             };

//             var chart = new ApexCharts(
//                 document.querySelector("#pieChartStatusPeminjaman"),
//                 options
//             );
//             chart.render();
//         })
//         .catch((error) => console.error("Error fetching chart data:", error));
// });

// ============================ Pie Chart Status Peminjaman End ==========================
// ================================ Group Column Bar chart Start ================================
// document.addEventListener("DOMContentLoaded", function () {
//     fetch("/stacked-bar-chart-data")
//         .then((response) => response.json())
//         .then((data) => {
//             var options = {
//                 series: data.series, // Data untuk series
//                 chart: {
//                     type: "bar",
//                     height: 264,
//                     stacked: true,
//                     toolbar: {
//                         show: false,
//                     },
//                     zoom: {
//                         enabled: true,
//                     },
//                 },
//                 responsive: [
//                     {
//                         breakpoint: 480,
//                         options: {
//                             legend: {
//                                 // show: false,
//                                 position: "bottom",
//                                 // offsetX: -10,
//                                 offsetY: 10,
//                             },
//                         },
//                     },
//                 ],
//                 colors: ["#487FFF", "#FF9F29"],
//                 plotOptions: {
//                     bar: {
//                         horizontal: false,
//                         borderRadius: 4,
//                         columnWidth: 10,
//                         dataLabels: {
//                             total: {
//                                 enabled: false,
//                                 style: {
//                                     fontSize: "13px",
//                                     fontWeight: 900,
//                                 },
//                             },
//                         },
//                     },
//                 },
//                 dataLabels: {
//                     enabled: false,
//                 },
//                 xaxis: {
//                     type: "category",
//                     categories: data.categories,
//                 },
//                 yaxis: {
//                     labels: {
//                         formatter: function (value) {
//                             return value;
//                         },
//                     },
//                 },
//                 tooltip: {
//                     y: {
//                         formatter: function (value) {
//                             return value;
//                         },
//                     },
//                 },
//                 legend: {
//                     position: "bottom",
//                     offsetY: 10,
//                     show: true,
//                 },
//                 fill: {
//                     opacity: 1,
//                 },
//             };

//             var chart = new ApexCharts(
//                 document.querySelector("#groupColumnBarChart"),
//                 options
//             );
//             chart.render();
//         })
//         .catch((error) => console.error("Error fetching chart data:", error));
// });

// ================================ Group Column Bar chart End ================================

// ================================ Revenue Report Chart Start ================================

// ================================ Revenue Report Chart End ================================

// ================================ User Activities Donut chart End ================================

// ================================ User Activities Donut chart End ================================
