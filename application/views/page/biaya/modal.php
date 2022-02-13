<!-- Modal Bbm-->
<!-- form detil bbm -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Pengisian BBM </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <?= form_open('biaya/simpanBbm', 'class="form-horizontal" role="form" id="form-bbm"'); ?>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right " for="tgl_isi">Tanggal Isi :</label>
                            <div class="col-sm-9">
                                <input type="text" name="tgl_isi" id="tgl_isi" class="col-xs-12 col-sm-10 date-picker" autocomplete="off" value="<?= date('d-m-Y'); ?>" />
                                <input type="hidden" name="idDetilBbm">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="km_isi">Km Isi :</label>
                                <div class="col-sm-9">
                                    <input type="number" name="km_isi" id="km_isi" placeholder="Km Isi" class="col-xs-12 col-sm-6" autocomplete="off" />
                                </div>
                            </div> -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="nama_bbm">Jenis BBm :</label>
                            <div class="col-sm-9">
                                <select name="nama_bbm" id="nama_bbm" class=" col-xs-12 col-sm-10">
                                    <option value="">Jenis Bbm</option>
                                    <?php foreach ($bbm as $bm) : ?>
                                        <option value="<?= $bm['id']; ?>"><?= $bm['nama_bbm']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="liter">Jumlah Ltr :</label>
                            <div class="col-sm-9">
                                <input type="number" name="liter" id="liter" placeholder="0" class="col-xs-12 col-sm-10" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="harga_bbm">Harga /Ltr :</label>
                            <div class="col-sm-9">
                                <input type="number" name="harga_bbm" id="harga_bbm" placeholder="0" class="col-xs-12 col-sm-10" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-3 control-label no-padding-right" for="totalHargaBbm"><b> Total :</b> </label>
                            <div class="col-sm-9">
                                <input type="text" name="totalHargaBbm" id="totalHargaBbm" placeholder="0" class="col-xs-12 col-sm-10" autocomplete="off" readonly />
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer btnBbm" style="display: none;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <!-- <button type="button" class="btn btn-primary " id="btnsimpanBbm">Simpan</button> -->
                <a href="javascript:;" class="btn btn-primary" id="btnsimpanBbm">Simpan</a>
            </div>
        </div>
    </div>
</div>

<!-- modal hapus detil bbm -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" id="modalHapusBiaya" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin akan dihapus? </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <!-- <button type="button" class="btn btn-primary " id="btnsimpanBbm">Simpan</button> -->
                <a href="javascript:;" class="btn btn-danger" id="btnhapusBiaya">Hapus</a>
            </div>
        </div>
    </div>
</div>





<!-- end modal Bbm -->


<!--  ================================ -->

<!-- Modal Hotel -->
<div class="modal fade" id="modalHotel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data biaya penginapan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <?= form_open('biaya/simpanHotel', 'class="form-horizontal" role="form" id="form-hotel"'); ?>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right " for="jumlah_hari">Lama menginap</label>
                            <div class="col-sm-9">
                                <input type="number" name="jumlah_hari" id="jumlah_hari" class="col-xs-12 col-sm-10" autocomplete="off" required placeholder="0" />
                                <input type="hidden" name="idDetilHotel">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="hargaHotel">Harga Penginapan</label>
                            <div class="col-sm-9">
                                <input type="number" name="hargaHotel" id="hargaHotel" placeholder="0" class="col-xs-12 col-sm-10" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-3 control-label no-padding-right" for="totalHargaHotel"><b> Total :</b> </label>
                            <div class="col-sm-9">
                                <input type="text" name="totalHargaHotel" id="totalHargaHotel" placeholder="0" class="col-xs-12 col-sm-10" autocomplete="off" readonly />
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <!-- <button type="button" class="btn btn-primary " id="btnsimpanBbm">Simpan</button> -->
                <a href="javascript:;" class="btn btn-primary" id="btnsimpanHotel">Simpan</a>
            </div>
        </div>
    </div>
</div>

<!-- end modal hotel -->

<!-- Modal Kos -->
<div class="modal fade" id="modalKos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Biaya Kos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <?= form_open('biaya/simpanKos', 'class="form-horizontal" role="form" id="form-kos"'); ?>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right " for="jumlah_hari">Nama Kos</label>
                            <div class="col-sm-9">
                                <select class="col-xs-12 col-sm-10" name="dataKos" id="dataKos" data-placeholder="Choose a State...">
                                    <option value=""> </option>
                                    <option value="AL">Marisa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="hargaKos">Biaya Sewa Perbulan</label>
                            <div class="col-sm-9">
                                <label> Rp.0</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="barayKos">Jumlah Bayar</label>
                            <div class="col-sm-9">
                                <input type="number" name="barayKos" id="barayKos" placeholder="0" class="col-xs-12 col-sm-10" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="barayKos">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea name="ketKos" id="ketKos" cols="50" rows="3" placeholder="Keterangan bayar"></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-3 control-label no-padding-right" for="totalBayarKos"><b> Total :</b> </label>
                            <div class="col-sm-9">
                                <input type="text" name="totalBayarKos" id="totalBayarKos" placeholder="0" class="col-xs-12 col-sm-10" autocomplete="off" readonly />
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <!-- <button type="button" class="btn btn-primary " id="btnsimpanBbm">Simpan</button> -->
                <a href="javascript:;" class="btn btn-primary" id="btnsimpanKos">Simpan</a>
            </div>
        </div>
    </div>
</div>
<!--End Modal Kos -->

<div class="modal fade bd-example-modal-sm" tabindex="-1" id="modal-konfirmasi" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Data di simpan !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Ingin tambah data baru ?</p>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary" id="batal-konfirmasi">Tidak</button>
                <button type="button" class="btn btn-success" id="ya-konfirmasi">Ya</button>
            </div>
        </div>
    </div>
</div>