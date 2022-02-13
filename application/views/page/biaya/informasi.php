<form class="form-horizontal" id="sample-form">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="nomorStok">Nomor Stok</label>
        <div class="col-sm-6">
            <input type="text" name="nomorStok" id="nomorStok" class="col-xs-9 col-sm-5 input-sm" autocomplete="off" placeholder="Masukan nomor stok">
            <input type="hidden" name="nomorBiaya" id="nomorBiaya" value="<?= $this->session->userdata('nomorBiaya'); ?>">
            <input type="hidden" name="id_stok" id="id_stok">
            <div class="col-xs-3 col-sm-3">
                <button type="button" class="btn btn-sm btn-secondary reset-nomor">R</button>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Priode : </label>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <div class="input-daterange input-group">
                        <input type="text" class="input-sm form-control date-picker" name="start" id="start" value="<?= date('d-m-Y'); ?>" autocomplete="off" />
                        <span class="input-group-addon">
                            <i class="fa fa-exchange"></i>
                        </span>

                        <input type="text" class="input-sm form-control date-picker" name="end" id="end" value="<?= date('d-m-Y'); ?>" autocomplete="off" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="plat"> No.Kendaraan : </label>
        <div class="col-sm-6">
            <input type="text" name="plat" id="plat" placeholder="DN.XXX" class="col-xs-9 col-sm-5 input-sm" autocomplete="off" />
            <input type="hidden" id="id_kendaraan" name="id_kendaraan">
            <div class="col-xs-3 col-sm-3">
                <button type="button" class="btn btn-sm btn-secondary reset-plat">R</button>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="area"> Tujuan : </label>
        <div class="col-sm-6">
            <input type="text" name="area" id="area" placeholder="Area" class="col-xs-12 col-sm-12 input-sm" />
            <input type="hidden" name="id_area" id="id_area">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="fkm"> Driver & Sales : </label>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <div class=" input-group">
                        <input type="text" class="input-sm form-control" name="driver" id="driver" placeholder="Driver /Sopir" />
                        <input type="hidden" name="id_driver">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" class="input-sm form-control" name="sales" id="sales" placeholder="Sales /Helper" />
                        <input type="hidden" name="id_sales">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="fkm"> Kilometer : </label>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <div class="input-daterange input-group">
                        <input type="text" class="input-sm form-control" name="kmAwal" id="kmAwal" placeholder="KM awal" />
                        <span class="input-group-addon">
                            <i class="fa fa-tachometer"></i>
                        </span>
                        <input type="text" class="input-sm form-control" name="kmAkhir" id="kmAkhir" placeholder="KM akhir" />
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>