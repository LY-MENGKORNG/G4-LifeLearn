<div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
    <div
        class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
        <div>
            <h6
                class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                User Chart
            </h6>
            <p class="block max-w-sm font-sans text-sm font-normal leading-normal text-gray-700 antialiased">
                Visualize user regiser data.
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
            console.log(response.data.registrationLabels);
            const registrationData = response.data.registrationData;
            const loginData = response.data.loginData;
            const registrationLabels = response.data.registrationLabels;
            const chartConfig = {
                series: [
                    {
                        name: "Registrations",
                        data: registrationData,
                    },
                    {
                        name: "Visitors",
                        data: loginData,
                    }
                ],
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
                colors: ["#34d399", "#f9a8d4"],
                plotOptions: {
                    bar: {
                        columnWidth: "60%",
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
                    categories:  registrationLabels,
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
