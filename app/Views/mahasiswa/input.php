<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>
            <!-- /.card-header -->
            <form action="<?php echo $action; ?>" method="post" autocomplete="off">
                <div class="card-body">
                    <?php if (validation_errors()){
                    ?>  
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                        <?php echo validation_list_errors() ?>
                        </div>    
                    <?php   
                    }
                    ?>
                    <?php 
                    if (session()->getFlashdata('error')){
                        ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-warning"></i> Error </h5>
                            <?php echo session()->getFlashdata('success'); ?>
                        </div> 
                        <?php 
                    }
                    ?>

                    <?php echo csrf_field() ?>
<?php 
if (current_url(true)->getSegment(2) =='edit'){
    ?>
    <input type="hidden" name="param" id="param" value="<?php echo $edit_data[' NPM']; ?>">
    <?php 
   
}
?>
                    <div class="form-group">
                        <label for=" NPM"> NPM</label>
                        <input type="text" name=" NPM" id=" NPM" value="<?php echo empty(set_value(' NPM')) ? (empty($edit_data[' NPM']) ? "":$edit_data[' NPM']): set_value(' NPM'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Nama"> Nama</label>
                        <input type="text" name="Nama" id="Nama" value="<?php echo empty(set_value('Nama')) ? (empty($edit_data['Nama']) ? "":$edit_data['Nama']): set_value('Nama');?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Alamat"> Alamat</label>
                        <input type="text" name="Alamat" id="Alamat" value="<?php echo empty(set_value('Alamat')) ? (empty($edit_data['Alamat']) ? "":$edit_data['Alamat']): set_value('Alamat');?>" class="form-control">
                    </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
        </div>
</form>
    </div>
</div>
</div>
<?php
echo $this->endSection();
