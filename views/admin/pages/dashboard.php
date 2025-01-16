<?php
include 'connection.php';
$pageTitle = 'Dashboard';
include __DIR__ . '/../layouts/header.php';
?>

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Dashboard</h3>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="col-12 col-md-4">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'> <span data-feather="image"></span> Total Gambar</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p><?php $sql = "SELECT COUNT(*) FROM gallery";
                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();
                                        echo $stmt->fetchColumn(); ?> </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas1" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'> <span data-feather="plus-circle"></span> Total Fasilitas</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p><?php $sql = "SELECT COUNT(*) FROM facilities";
                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();
                                        echo $stmt->fetchColumn(); ?> </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas1" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'> <span data-feather="star"></span> Total Ulasan</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p><?php $sql = "SELECT COUNT(*) FROM reviews";
                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();
                                        echo $stmt->fetchColumn(); ?> </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas1" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<?php
include __DIR__ . '/../layouts/footer.php';
?>