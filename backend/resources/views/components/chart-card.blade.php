<div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
    <div
        class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
        {{-- <div class="w-max rounded-lg bg-gray-900 p-5 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3">
                </path>
            </svg>
        </div> --}}
        <div>
            <h6
                class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                User regiser Chart
            </h6>
            <p class="block max-w-sm font-sans text-sm font-normal leading-normal text-gray-700 antialiased">
                Visualize user regiser data using ApexCharts.
            </p>
        </div>
    </div>
    <div class="pt-6 px-2 pb-0">
        <div id="bar-chart"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    axios.get('/registrations-per-month')
        .then(response => {
            const data = response.data;
            const chartConfig = {
                series: [{
                    name: "Registrations",
                    data: data.data,
                }],
                chart: {
                    type: "bar",
                    height: 240,
                    toolbar: {
                        show: false,
                    },
                },
                title: {
                    show: false,
                },
                dataLabels: {
                    enabled: false,
                },
                colors: ["#020617"],
                plotOptions: {
                    bar: {
                        columnWidth: "40%",
                        borderRadius: 2,
                    },
                },
                xaxis: {
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    labels: {
                        style: {
                            colors: "#616161",
                            fontSize: "12px",
                            fontFamily: "inherit",
                            fontWeight: 400,
                        },
                    },
                    categories: data.labels,
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: "#616161",
                            fontSize: "12px",
                            fontFamily: "inherit",
                            fontWeight: 400,
                        },
                    },
                },
                grid: {
                    show: true,
                    borderColor: "#dddddd",
                    strokeDashArray: 5,
                    xaxis: {
                        lines: {
                            show: true,
                        },
                    },
                    padding: {
                        top: 5,
                        right: 20,
                    },
                },
                fill: {
                    opacity: 0.8,
                },
                tooltip: {
                    theme: "dark",
                },
            };
            const chart = new ApexCharts(document.querySelector("#bar-chart"), chartConfig);
            chart.render();
        })
        .catch(error => {
            console.error("There was an error fetching the registration data:", error);
        });
</script>
