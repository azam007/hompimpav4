      <div class="col-md-10">
        <div class="row">
          <div class="col-md-6">
            <div class="content-box-large">
              <div class="panel-heading">
              <div class="panel-title">Hompimpa!</div>
              
              <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
              </div>
            </div>
              <div class="panel-body">
              <?php if(isset($data['acakBiasa'])):?>
              <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                        </tr>
                      </thead>
                      <tbody>
              <?php $no = 1; foreach ($data['acakBiasa'] as $acak): ?>
                        <tr>
                          <td><?=$no?></td>
                          <td><?=$acak['name']?></td>
                        </tr>
              <?php $no++; endforeach; ?>
                        <tr>
                          <td colspan="2"><div class='pull-right'>Diacak : <?=$_SESSION['acak']?>x | <a href="<?=PATH_GLOBALS?>home/reset">Reset</a></div></td>
                        </tr>
                      </tbody>
                    </table>
              <?php elseif(isset($data['acakTugas'])) : ?>
              <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Tugas</th>
                        </tr>
                      </thead>
                      <tbody>
              <?php $no = 0; foreach ($data['acakSantri'] as $santri): ?>
                        <tr>
                          <td><?=$no+1?></td>
                          <td><?=$santri['name']?></td>
                          <td><?=$data['acakTugas'][$no]?></td>
                        </tr>
              <?php $no++; endforeach; ?>
                        <tr>
                          <td colspan="3"><div class='pull-right'>Diacak : <?=$_SESSION['acakPiket']?>x | <a href="<?=PATH_GLOBALS?>home/reset">Reset</a></div></td>
                        </tr>
                      </tbody>
                    </table>
              <?php else : ?>
              <div class="text-center">~ Siap Diacak ~</div>
              <?php endif;?>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <div class="content-box-header">
                  <div class="panel-title">Pilih Mode</div>
                </div>
                <div class="content-box-large box-with-header">
                  <p>Silahkan Pilih Untuk Memulai Pengacakan!</p>
                  <a href="<?=PATH_GLOBALS?>home/shuffle" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-refresh"></i> Acak Biasa</a>
                  <a href="<?=PATH_GLOBALS?>home/piketShuffle" class="btn btn-lg btn-warning <?=($data['totalPiket'][0]['orang'] != $data['totalSantri']) ? 'disabled' : ''?>"><i class="glyphicon glyphicon-refresh"></i> Acak Tugas Piket</a>        
                <br /><br />
                  <?php if($data['totalPiket'][0]['orang'] != $data['totalSantri']):?>
                    <div class="pull-right">*Untuk Acak Tugas Data Santri dan Data Piket harus sama</div>
                  <?php endif;?>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="content-box-header">
                  <div class="panel-title">Data Count</div>
                
                <div class="panel-options">
                  <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                  <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                </div>
                </div>
                <div class="content-box-large box-with-header">
                   <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$data['totalSantri']?>"
                    aria-valuemin="0" aria-valuemax="50" style="width:<?=$data['totalSantri']+10?>%">
                      <?=$data['totalSantri']?> Santri
                    </div>
                  </div> 
                   <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$data['totalPiket'][0]['orang']?>"
                    aria-valuemin="0" aria-valuemax="50" style="width:<?=$data['totalPiket'][0]['orang']+10?>%">
                      <?=$data['totalPiket'][0]['orang']?> Tugas
                    </div>
                  </div>
                    <?php if($data['totalPiket'][0]['orang'] == $data['totalSantri']):?>
                    <div class="pull-right">*Tugas Sudah bisa diacak</div>
                  <?php endif;?>
                </div>
              </div>
            </div>
          </div>
        </div>

        
    </div>
    </div>