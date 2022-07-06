<?= $this->extend("admin/layout/app"); ?>

<?= $this->section("content"); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-1">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
            <div class="card">
                <h4 class="card-header">Semua Aksi</h4>
                <div class="card-body">
                    <div class="row">
                        <?php if (session()->getFlashdata("message")) : ?>
                            <div class="col-lg-12" id="message">
                                <div class="alert alert-<?= session()->getFlashdata('message')['type'] ?>">
                                    <?= session()->getFlashdata('message')['text'] ?>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="col-lg-12">
                            <button class="btn btn-primary mx-1"><i class='bx bx-refresh'></i> Refresh Data</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#trashModal"><i class="fa fa-trash"></i> Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
            <div class="card">
                <h4 class="card-header">Statistik Suara</h4>
                <div class="card-body">
                    <div id="lineChart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
            <div class="card">
                <h4 class="card-header">Data Suara</h4>
                <div class="card-body">
                    <table class="table table-responsive text-nowrap">
                        <thead>
                            <tr>
                                <th>Siswa</th>
                                <th>Kandidat</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="trashModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('admin/suara/trash') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="trashModalLabel">Reset Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-warning">
                                <span class="text-uppercase fw-bold">PERHATIAN: </span> Dengan ini anda setuju untuk menghapus data secara permanen. Apakah anda yakin?
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">RAGU</button>
                    <button type="submit" class="btn btn-primary">YA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    window['tables'] = null

    function renderChart() {
        var options = {
            series: [{
                name: 'Suara',
                data: []
            }],
            chart: {
                height: 300,
                stacked: true,
                type: 'line',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '33%',
                    borderRadius: 12,
                    startingShape: 'rounded',
                    endingShape: 'rounded'
                }
            },
            colors: [config.colors.primary, config.colors.info],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 6,
                lineCap: 'round',
                colors: [config.colors.white]
            },
            legend: {
                show: true,
                horizontalAlign: 'left',
                position: 'top',
                markers: {
                    height: 8,
                    width: 8,
                    radius: 12,
                    offsetX: -3
                },
                labels: {
                    colors: config.colors.axisColor
                },
                itemMargin: {
                    horizontal: 10
                }
            },
            grid: {
                borderColor: config.colors.borderColor,
                padding: {
                    top: 0,
                    bottom: -8,
                    left: 20,
                    right: 20
                }
            },
            xaxis: {
                categories: [],
                labels: {
                    style: {
                        fontSize: '13px',
                        colors: config.colors.axisColor
                    }
                },
                axisTicks: {
                    show: false
                },
                axisBorder: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    style: {
                        fontSize: '13px',
                        colors: config.colors.axisColor
                    }
                }
            },
            responsive: [{
                    breakpoint: 1700,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '32%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1580,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '35%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1440,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '42%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1300,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '48%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1200,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '40%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 1040,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 11,
                                columnWidth: '48%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 991,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '30%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 840,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '35%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 768,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '28%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 640,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '32%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 576,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '37%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 480,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '45%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 420,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '52%'
                            }
                        }
                    }
                },
                {
                    breakpoint: 380,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '60%'
                            }
                        }
                    }
                }
            ],
            states: {
                hover: {
                    filter: {
                        type: 'none'
                    }
                },
                active: {
                    filter: {
                        type: 'none'
                    }
                }
            }
        }

        $.ajax({
            url: window['BASE_URL'] + '/api/suara/charts',
            method: 'POST',
            success: function(response) {
                // charts.data.labels = response['data']['label']
                // charts.data.datasets.data = response['data']['data']
                // charts.update()
                options.series[0].data = response.data.data
                options.xaxis.categories = response.data.label
                var ctx = document.querySelector("#lineChart")
                var charts = new ApexCharts(ctx, options)
                charts.render()
            }
        })
    }

    $(document).ready(function() {
        // var error = $("#message").find(".alert.alert-danger")
        // if (error.length >= 1) {
        //     setTimeout(function() {
        //         error.slideUp(500, function() {
        //             error.remove()
        //         })
        //     }, 3000)
        // }

        window['tables'] = $(".table").DataTable({
            ajax: {
                url: window['BASE_URL'] + "/api/suara/getall",
                method: 'POST'
            },
            columns: [{
                    'data': 'siswa'
                },
                {
                    'data': 'kandidat'
                },
                {
                    'data': 'created_at'
                }
            ],
            "columnDefs": [{
                    'targets': 0,
                    'render': function(data, type, row, meta) {
                        // console.log()
                        return data['nama_lengkap']
                    }
                },
                {
                    'targets': 1,
                    'render': function(data, type, row, meta) {
                        var result = "";
                        if (data['ketua'] != null) {
                            result += data['ketua']['nama_lengkap']
                        }
                        if (data['wakil'] != null) {
                            result += "<span class='mx-2''>-</span>"
                            result += data['wakil']['nama_lengkap']
                        }

                        if (result == "") {
                            return "Tidak diketahui"
                        } else {
                            return result
                        }
                    }
                },
                {
                    'targets': 2,
                    'render': function(data, type, row, meta) {
                        return '<span clas="text-uppercase">' + data + '</span>'
                    }
                }
            ]
        })

        renderChart()
    })
</script>
<?= $this->endSection(); ?>