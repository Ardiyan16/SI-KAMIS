<?php $this->load->view('partials/header') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Tambah Pendaftaran</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Data Pendaftaran</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Tambah Pendaftaran</li>
                            </ol>
                        </nav>
                    </div>
                    <br>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <a href="<?= base_url('Loket/pendaftaran') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Form Tambah Pendaftaran</h4>
                        <p class="mb-30">tanda <span style="color: red;">*</span> wajib di isi</p>
                    </div>
                </div>
                <form method="POST" action="<?= base_url('Loket/update_pendaftaran') ?>">
                    <div class="form-group">
                        <label>Pasien <span style="color: red;">*</span></label>
                        <input class="form-control" value="<?= $edit->kd_kunjungan ?>" readonly type="hidden" name="kd_kunjungan" placeholder="">
                        <select name="no_rekmed" id="pasien" class="form-control">
                            <option></option>
                            <?php foreach ($pasien as $get) { ?>
                                <option <?php if ($edit->no_rekmed == $get->no_rm) {
                                            echo "selected=\"selected\"";
                                        } ?> value="<?= $get->no_rm ?>"><?= $get->nama_lengkap ?> (<?= $get->no_rm ?>)</option>
                            <?php } ?>
                        </select>
                        <?= form_error('no_rekmed', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Dokter <span style="color: red;">*</span></label>
                        <select name="dokter" id="dokter" class="form-control">
                            <option></option>
                            <?php foreach ($dokter as $get) { ?>
                                <option <?php if ($edit->dokter == $get->id) {
                                            echo "selected=\"selected\"";
                                        } ?> value="<?= $get->id ?>"><?= $get->nama_lengkap ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('dokter', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tinggi Badan / CM <span style="color: red;">*</span></label>
                                <input class="form-control" value="<?= $edit->tinggi_badan ?>" type="text" name="tinggi_badan" value="" placeholder="Tinggi Badan">
                                <?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Berat Badan / KG <span style="color: red;">*</span></label>
                                <input class="form-control" type="text" value="<?= $edit->berat_badan ?>" name="berat_badan" value="" placeholder="Berat Badan">
                                <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Suhu / Celcius <span style="color: red;">*</span></label>
                                <input class="form-control" type="text" value="<?= $edit->suhu ?>" name="suhu" value="" placeholder="Suhu">
                                <?= form_error('suhu', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tekanan Darah Sistole / mmHg <span style="color: red;">*</span></label>
                                <input class="form-control" type="text" value="<?= $edit->tekanan_darah_sistole ?>" name="tekanan_darah_sistole" value="" placeholder="Tekanan Darah Sistole">
                                <?= form_error('tekanan_darah_sistole', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tekanan Darah Diastole / mmHg <span style="color: red;">*</span></label>
                                <input class="form-control" type="text" value="<?= $edit->tekanan_darah_diastole ?>" name="tekanan_darah_diastole" value="" placeholder="Tekanan Darah Diastole">
                                <?= form_error('tekanan_darah_diastole', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Nadi / minute <span style="color: red;">*</span></label>
                                <input class="form-control" type="text" name="nadi" value="<?= $edit->nadi ?>" placeholder="Nadi">
                                <?= form_error('nadi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keluhan <span style="color: red;">*</span></label>
                        <textarea class="form-control" name="gejala" rows="5" cols="50"><?= $edit->gejala ?></textarea>
                        <?= form_error('gejala', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Alergi </label>
                        <textarea class="form-control" name="alergi" rows="5" cols="50"><?= $edit->alergi ?></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                        <button class="btn btn-warning" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                    </div>
                </form>
                </code></pre>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer') ?>
<script>
    $(document).ready(function() {
        //untuk memanggil plugin select2
        $('#pasien').select2({
            placeholder: 'Pilih Pasien',
        });

        $('#dokter').select2({
            placeholder: 'Pilih Dokter',
        });

        $('#bln').select2({
            placeholder: 'Pilih Bulan',
        });

        $('#kota').select2({
            placeholder: 'Pilih Kota/Kabupaten',
            language: "id"
        });

        $('#kecamatan').select2({
            placeholder: 'Pilih Kecamatan',
            language: "id"
        });

        $('#desa').select2({
            placeholder: 'Pilih Desa / Kelurahan',
            language: "id"
        });
    });

    $(document).ready(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 0);
        $.ajax({
            url: "<?php echo base_url('Loket/max_no_antri') ?>",
            dataType: 'json',
            method: 'POST',
            success: function(json) {
                var d = "<?php echo date('d') ?>";
                var m = "<?php echo date('m') ?>";
                var y = "<?php echo date('Y') ?>";

                console.log('maxxx', json.maxs);
                if (json.maxs == null) {
                    max = '0';
                } else {
                    max = json.maxs;
                }

                var ambil_tanggal = max.substring(8, 10);
                max++;
                console.log('max', max);
                var antrian = sprintf("%s", max);

                console.log('no_antrian', antrian);
                $('#antrian').val(antrian);
            }
        });
    });
</script>