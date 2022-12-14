<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Pemeriksaan</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Pemeriksaan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tabel List Pemeriksaan</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <!-- <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Loket/tambah_pendaftaran') ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Pendaftaran</a>
                    </div> -->
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">List Data Pemeriksaan</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Kode</th>
                                <th>No Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal</th>
                                <th>Dokter</th>
                                <th>No Antrian</th>
                                <th>Status</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kunjungan as $view) { ?>
                                <tr>
                                    <td class="table-plus"><?= $no++ ?></td>
                                    <td><?= $view->kd_kunjungan ?></td>
                                    <td><?= $view->no_rm ?></td>
                                    <td><?= $view->nama_lengkap ?></td>
                                    <td><?= date('d F Y', strtotime($view->tanggal)) ?></td>
                                    <td><?= $view->nama_dokter ?></td>
                                    <td><?= $view->no_antrian ?></td>
                                    <td>
                                        <?php
                                        if ($view->status == 0) {
                                            echo "<span class='badge badge-secondary' style='color: white;'>Pendaftaran</span>";
                                        } else if ($view->status == 1) {
                                            echo "<span class='badge badge-warning' style='color: white;'>Pemeriksaan Dokter</span>";
                                        } else if ($view->status == 2) {
                                            echo "<span class='badge badge-info' style='color: white;'>Pengambilan Obat</span>";
                                        } else if ($view->status == 3) {
                                            echo "<span class='badge badge-primary' style='color: white;'>Pembayaran</span>";
                                        } else if ($view->status == 4) {
                                            echo "<span class='badge badge-success' style='color: white;'>Selesai</span>";
                                        }

                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($view->status == 1) { ?>
                                            <a href="<?= base_url('Dokter/pemeriksaan/' . $view->kd_kunjungan) ?>" title="Pemeriksaan" class="badge bg-primary" style="color: white;"><i class="fa fa-stethoscope"></i></a>
                                        <?php } ?>
                                        <?php if ($view->status == 2) { ?>
                                            <a href="<?= base_url('Dokter/resume_medis/' . $view->kd_kunjungan) ?>" title="Resume Medis" class="badge bg-primary" style="color: white;"><i class="fa fa-file"></i></a>
                                        <?php } ?>
                                        <a href="<?= base_url('Dokter/detail_kunjungan/' . $view->kd_kunjungan) ?>" title="Detail Kunjungan" class="badge bg-success" style="color: white;"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    <?php if ($this->session->flashdata('success_save')) : ?>
        toastr.success("Data pemeriksaan berhasil disimpan", "Berhasil!", {
            positionClass: "toast-top-right",
            timeOut: 4000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })

    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        toastr.success("Data berhasil dihapus", "Berhasil!", {
            positionClass: "toast-top-right",
            timeOut: 3000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        toastr.success("Data berhasil diperbarui", "Berhasil!", {
            positionClass: "toast-top-right",
            timeOut: 3000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })
    <?php endif ?>



    $('.hapus-data').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data diagnosis akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#898989',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = link;
            }
        })

    })
</script>

<?php $this->load->view('partials/footer') ?>