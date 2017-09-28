<div class="col-md-10">
          <div class="row">
            <div class="col-md-6">
              <div class="content-box-large">
                <div class="panel-heading">
                      <div class="panel-title">Tambah Data</div>
                  </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" action="">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tugas</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tugas" id="name" placeholder="Tugas">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Untuk</label>
                    <div class="col-sm-4">
                      <select name="orang" class="form-control">
                      <?php
                      for ($i=1; $i <= 9 ; $i++) { 
                        echo "<option value=\"{$i}\">{$i}</option>";
                      }
                      ?>
                      </select>
                    </div>                    
                    <div class="col-sm-6">
                      <span class="panel-title">Orang</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="submit" class="btn btn-primary" value="Tambah" />
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="content-box-large">
                <div class="panel-heading">
                      <div class="panel-title">Data Piket</div>
                    
                      <div class="panel-options">
                        <a href="<?=PATH_GLOBALS?>piket" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                      </div>
                  </div>
                <div class="panel-body">
                  <?php if(isset($_SESSION['message'])) :
                    foreach ($_SESSION['message'] as $alert => $value) : ?>
                  <div class="alert alert-<?=$alert?>">
                    <?=$value?>
                  </div>
                  <?php unset($_SESSION['message']); endforeach; endif;?>
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Tugas</th>
                          <th>Jumlah</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if ($data['count'] == '0') :?>
                        <tr>
                          <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                        <?php else :
                        $no = 1;
                        foreach ($data['piket'] as $piket) :?>
                        <tr>
                          <td><?=$no?></td>
                          <td><?=$piket['tugas']?></td>
                          <td><?=$piket['orang']?> Orang</td>
                          <td><?php
                            if($piket['status']){
                              echo "ON | <a href=\"".PATH_GLOBALS."piket/off/{$piket['id']}\">OFF</a>";
                            }else{
                              echo "<a href=\"".PATH_GLOBALS."piket/on/{$piket['id']}\">ON</a> | OFF";
                            }
                          ?><div class="pull-right">
                            <a href="<?=PATH_GLOBALS?>piket/edit/<?=$piket['id']?>"><i class="glyphicon glyphicon-pencil"></i></a>
                            <span style="color:#ddd">|</span>
                            <a href="<?=PATH_GLOBALS?>piket/delete/<?=$piket['id']?>"><i class="glyphicon glyphicon-trash"></i></a>
                          </div>
                          </td>
                        </tr>
                        <?php $no++; endforeach; endif;?>
                        <tr>
                          <td colspan="4"><div class="pull-right">Total : <?=$data['jumlah'][0]['orang']?> Orang</div></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
</div>
</div>