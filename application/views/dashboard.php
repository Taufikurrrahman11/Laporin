<section class="content-header">
    <h1>
        Dashboard
        <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- CPU Traffic Box -->
        <style>
            .bg-custom1 {
                background-color: #FF00F4 !important;
            }
        </style>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-custom1"><i class=""></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jogja</span>
                    <span class="info-box-number"><?= $count_jogja; ?><small></small></span>
                    <span class="info-box-number"><?= $total_jogja; ?><small>,00</small></span>
                    <!-- Anda dapat menampilkan data lain di sini -->
                </div>
            </div>
        </div>
        <style>
            .bg-custom2 {
                background-color: #0000FF !important;
            }
        </style>
        <!-- Likes Box -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-custom2"><i class=""></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Semarang</span>
                    <span class="info-box-number"><?= $count_semarang; ?></span>
                    <span class="info-box-number"><?= $total_semarang; ?><small>,00</small></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart and other content... -->
    <div class="box">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="box box-primary">
                    <div class="box-header with-border">
                                    <h3 class="box-title">SUM of Sales Performance</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <canvas id="pieChart" height="250"></canvas>
                                </div>
                                <div class="box-footer">
                                <ul class="chart-legend clearfix">
                                    <!-- Legend items -->
                                    <?php foreach ($city_sales as $stat) : ?>
                                        <li><i class="fa fa-circle" style="color: <?= ($stat->city_sales === 'Malang') ? '#FF00F4' : '#0000FF'; ?>"></i> <?= $stat->city_sales ?> <span class="pull-right"><?= $stat->count ?></span></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="box">
                <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title">Daily Sales Progress (Amount of Account)</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body" style="padding-bottom: 20px;"> <!-- Added padding-bottom for spacing -->
                <canvas id="barChartCountSubscribe" style="height: 200px; width: 100%;"></canvas>
            </div>
            <div class="col-md-12" style="margin-bottom: 20px;"> <!-- Add margin-bottom for spacing -->
                <ul class="chart-legend clearfix" style="display: flex; flex-wrap: nowrap; overflow-x: auto; padding: 0;">
                    <?php foreach ($sales_data_count_subscribe as $count_city_subscribe) : ?>
                        <li style="margin-right: 10px; list-style: none; white-space: nowrap; padding: 5px 10px; border: 1px solid #ddd; border-radius: 5px;">
                            <span style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                                <strong><?= htmlspecialchars($count_city_subscribe['city_sales']); ?></strong>
                                <small style="margin-left: 10px;"><?= htmlspecialchars($count_city_subscribe['date']); ?></small>
                                <span class="pull-right" style="margin-left: 10px; padding: 2px 5px; border: 1px solid #ddd; border-radius: 5px;">
                                    <?= htmlspecialchars($count_city_subscribe['count_city_subscribe']); ?>
                                </span>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Added clearfix with margin-bottom -->
        <div class="clearfix" style="margin-bottom: 30px;"></div>

        <!-- Bar chart -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title">Daily Sales Progress (Sales Volume)</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body" style="padding-top: 20px;"> <!-- Added padding-top for spacing -->
                <canvas id="barChartSubscribe" style="height: 200px;"></canvas>
            </div>
            <div class="col-md-12">
                <ul class="chart-legend clearfix" style="display: flex; flex-wrap: nowrap; overflow-x: auto; padding: 0;">
                    <?php foreach ($sales_data_total_subscribe as $subscribe) : ?>
                        <li style="margin-right: 10px; list-style: none; white-space: nowrap; padding: 5px 10px; border: 1px solid #ddd; border-radius: 5px;">
                            <span style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                                <strong><?= htmlspecialchars($subscribe['city_sales']); ?></strong>
                                <small style="margin-left: 10px;"><?= htmlspecialchars($subscribe['date']); ?></small>
                                <span class="pull-right" style="margin-left: 10px; padding: 2px 5px; border: 1px solid #ddd; border-radius: 5px;">
                                    <?= htmlspecialchars($subscribe['total_subscribe']); ?>
                                </span>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="clearfix" style="margin-bottom: 30px;"></div>

        </div>
        <div class="box-footer no-padding">
            <div class="col-md-6">
                <!-- Bar chart -->
                <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>
                    <h3 class="box-title">Sales Agent Performance(Amount of Subscribe)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="barChartCount" height="300"></canvas>
                </div>
                <div class="box-footer">
                    <ul class="chart-legend clearfix">
                        <?php foreach ($count_subscribe as $data) : ?>
                            <li>
                                <strong><?= htmlspecialchars($data->sales_name); ?></strong>
                                <span class="pull-right"><?= htmlspecialchars($data->count_subscribe); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            </div>      
            <div class="col-md-6">
                <!-- Bar chart -->
                <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>
                    <h3 class="box-title">Sales Agent Performance(Sales Volume)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="barChartSum" height="300"></canvas>
                </div>
                <div class="box-footer">
                    <ul class="chart-legend clearfix">
                        <?php foreach ($total_subscribe_sales as $data) : ?>
                            <li>
                                <strong><?= htmlspecialchars($data->sales_name); ?></strong>
                                <span class="pull-right"><?= htmlspecialchars($data->total_subscribe); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            </div>
            <div class="col-md-6">
                <!-- Bar chart -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-bar-chart-o"></i>
                        <h3 class="box-title">Product Statistic</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <canvas id="barChartProducts" height="300"></canvas>
                    </div>
                    <div class="box-footer">
                    <ul class="chart-legend clearfix">
                        <?php foreach ($product_types as $product) : ?>
                            <li>
                                <strong><?= htmlspecialchars($product['product_type']); ?></strong>
                                <span class="pull-right"><?= htmlspecialchars($product['sold_out']); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>

<script>
    // Define unique colors for each customer type
    var colorScheme = {
        'Malang': '#FF00F4',   // Red
        'Purwokerto': '#0000FF', // Blue
    };

    // Prepare data for the charts
    var labels = [];
    var data = [];
    var backgroundColors = [];

    <?php foreach ($city_sales as $stat) : ?>
        labels.push("<?= $stat->city_sales ?>");
        data.push(<?= $stat->count ?>);
        var color = colorScheme['<?= $stat->city_sales ?>'] || '#000000';
        backgroundColors.push(color);
    <?php endforeach; ?>

    // Pie Chart
    var ctxPie = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: backgroundColors
            }]
        },
        options: {
            plugins: {
                datalabels: {
                    color: '#ffffff',
                    anchor: 'center',
                    align: 'center',
                    font: {
                        weight: 'bold'
                    },
                    formatter: function(value) {
                        return value;
                    }
                }
            }
        }
    });

    // Bar Chart - Total Sales per City
    // Bar Chart - Total Sales per City
    var labelsBarSum = [];
    var dataBarSum = [];
    var backgroundColorsBarSum = [];

    <?php foreach ($total_subscribe_sales as $index => $data) : ?>
        labelsBarSum.push("<?= $data->sales_name ?>");
        dataBarSum.push(<?= $data->total_subscribe ?>);
        // Set warna latar belakang untuk barChartSum secara langsung
        backgroundColorsBarSum.push('#FF0000'); // Merah untuk barChartSum
    <?php endforeach; ?>

    var ctxBarSum = document.getElementById('barChartSum').getContext('2d');
    var barChartSum = new Chart(ctxBarSum, {
        type: 'bar', // Tetap 'bar'
        data: {
            labels: labelsBarSum,
            datasets: [{
                label: 'Total Sales per City',
                data: dataBarSum,
                backgroundColor: backgroundColorsBarSum
            }]
        },
        options: {
            indexAxis: 'y', // Menjadikan bar horizontal
            plugins: {
                datalabels: {
                    color: '#ffffff',
                    anchor: 'end',
                    align: 'top',
                    font: {
                        weight: 'bold'
                    },
                    formatter: function(value) {
                        return value;
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        suggestedMin: 0 // Memastikan skala mulai dari 0
                    }
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Bar Chart - Count of Subscribe
    var labelsBarCount = [];
    var dataBarCount = [];
    var backgroundColorsBarCount = [];

    <?php foreach ($count_subscribe as $index => $data) : ?>
        labelsBarCount.push("<?= $data->sales_name ?>");
        dataBarCount.push(<?= $data->count_subscribe ?>);
        // Set warna latar belakang untuk barChartCount secara langsung
        backgroundColorsBarCount.push('#0000FF'); // Biru untuk barChartCount
    <?php endforeach; ?>

    var ctxBarCount = document.getElementById('barChartCount').getContext('2d');
    var barChartCount = new Chart(ctxBarCount, {
        type: 'bar', // Tipe grafik
        data: {
            labels: labelsBarCount,
            datasets: [{
                label: 'Count of Subscribe',
                data: dataBarCount,
                backgroundColor: backgroundColorsBarCount
            }]
        },
        options: {
            indexAxis: 'y', // Menjadikan bar horizontal
            plugins: {
                datalabels: {
                    color: '#ffffff',
                    anchor: 'end',
                    align: 'top',
                    font: {
                        weight: 'bold'
                    },
                    formatter: function(value) {
                        return value;
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        suggestedMin: 0 // Memastikan skala mulai dari 0
                    }
                },
                y: {
                    beginAtZero: true,
                    reverse: true // Membalikkan urutan sumbu Y
                }
            }
        }
    });



    // Bar Chart - Products
    var ctxBarProducts = document.getElementById('barChartProducts').getContext('2d');
    var labelsBarProducts = [];
    var dataBarProducts = [];

    <?php foreach ($product_types as $product) : ?>
        labelsBarProducts.push("<?= $product['product_type'] ?>");
        dataBarProducts.push(<?= $product['sold_out'] ?>);
    <?php endforeach; ?>

    var barChartProducts = new Chart(ctxBarProducts, {
        type: 'bar',
        data: {
            labels: labelsBarProducts,
            datasets: [{
                label: 'Jumlah',
                data: dataBarProducts,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                datalabels: {
                    color: '#ffffff',
                    anchor: 'end',
                    align: 'top',
                    font: {
                        weight: 'bold'
                    },
                    formatter: function(value) {
                        return value;
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        suggestedMin: 0 // Ensures the scale starts from 0
                    }
                },
                x: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctxSubscribe = document.getElementById('barChartSubscribe').getContext('2d');
    var labelsBarSubscribe = [];
    var dataJogja = [];
    var dataSemarang = [];

    // Create an object to group data by date
    var groupedData = {};

    <?php foreach ($sales_data_total_subscribe as $subscribe) : ?>
        var date = "<?= $subscribe['date'] ?>";
        var city = "<?= $subscribe['city_sales'] ?>";
        var total = <?= $subscribe['total_subscribe'] ?>;
        
        // Initialize data arrays for each date
        if (!groupedData[date]) {
            groupedData[date] = { Jogja: 0, Semarang: 0 };
            labelsBarSubscribe.push(date); // Only add date once
        }

        // Assign the value to the appropriate city
        if (city === "Malang") {
            groupedData[date].Jogja = total;
        } else if (city === "Purwokerto") {
            groupedData[date].Semarang = total;
        }
    <?php endforeach; ?>

    // Push the data into the arrays
    for (var date of labelsBarSubscribe) {
        dataJogja.push(groupedData[date].Jogja);
        dataSemarang.push(groupedData[date].Semarang);
    }

    const myBarChartSubscribe = new Chart(ctxSubscribe, {
        type: 'bar',
        data: {
            labels: labelsBarSubscribe, // Label untuk sumbu X (tanggal)
            datasets: [
                {
                    label: 'Malang',
                    data: dataJogja, // Data untuk Jogja
                    backgroundColor: '#FF00F4',
                    borderColor: '#FF00F4',
                    borderWidth: 1
                },
                {
                    label: 'Purwokerto',
                    data: dataSemarang, // Data untuk Semarang
                    backgroundColor: '#0000FF',
                    borderColor: '#0000FF',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                x: {
                    stacked: false, // Memastikan bar tidak ditumpuk
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString('id-ID'); // Format y-axis values
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        usePointStyle: true
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ': ' + tooltipItem.raw.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
 
    const ctxCountSubscribe = document.getElementById('barChartCountSubscribe').getContext('2d');
    var labelsBarCountSubscribe = [];
    var dataCountMalang = [];
    var dataCountPurwokerto = [];

    // Create an object to group data by date
    var groupedCountData = {};

    <?php foreach ($sales_data_count_subscribe as $count_city_subscribe) : ?>
        var date = "<?= $count_city_subscribe['date'] ?>";
        var city = "<?= $count_city_subscribe['city_sales'] ?>";
        var count = <?= $count_city_subscribe['count_city_subscribe'] ?>;
        
        // Initialize data arrays for each date
        if (!groupedCountData[date]) {
            groupedCountData[date] = { Malang: 0, Purwokerto: 0 };
            labelsBarCountSubscribe.push(date); // Only add date once
        }

        // Assign the value to the appropriate city
        if (city === "Malang") {
            groupedCountData[date].Malang = count;
        } else if (city === "Purwokerto") {
            groupedCountData[date].Purwokerto = count;
        }
    <?php endforeach; ?>

    // Push the data into the arrays
    for (var date of labelsBarCountSubscribe) {
        dataCountMalang.push(groupedCountData[date].Malang);
        dataCountPurwokerto.push(groupedCountData[date].Purwokerto);
    }

    const myBarChartCountSubscribe = new Chart(ctxCountSubscribe, {
        type: 'bar',
        data: {
            labels: labelsBarCountSubscribe, // Labels for x-axis (dates)
            datasets: [
                {
                    label: 'Malang',
                    data: dataCountMalang, // Data for Malang
                    backgroundColor: '#FF00F4',
                    borderColor: '#FF00F4',
                    borderWidth: 1
                },
                {
                    label: 'Purwokerto',
                    data: dataCountPurwokerto, // Data for Purwokerto
                    backgroundColor: '#0000FF',
                    borderColor: '#0000FF',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                x: {
                    stacked: false, // Ensure bars are not stacked
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString('id-ID'); // Format y-axis values
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true, // Show the legend
                    labels: {
                        usePointStyle: true
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ': ' + tooltipItem.raw.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });


</script>



