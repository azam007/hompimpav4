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
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Nama">
                    </div>
                  </div>
                  <p align="justify">* Untuk menambahkan banyak data sekaligus gunakan format nama, nama, nama</p>
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
                      <div class="panel-title">Data Santri</div>
                    
                      <div class="panel-options">
                        <a href="<?=PATH_GLOBALS?>santri" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
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
                          <th>Nama</th>
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
                        foreach ($data['santri'] as $data) :?>
                        <tr>
                          <td><?=$no?></td>
                          <td><?=!$data['status'] ? '<strike>'.$data['name'].'</strike>' : $data['name']?></td>
                          <td><?php
                            if($data['status']){
                              echo "ON | <a href=\"".PATH_GLOBALS."santri/off/{$data['id']}\">OFF</a>";
                            }else{
                              echo "<a href=\"".PATH_GLOBALS."santri/on/{$data['id']}\">ON</a> | OFF";
                            }
                          ?>
                          <div class="pull-right">
                            <a href="<?=PATH_GLOBALS?>santri/edit/<?=$data['id']?>"><i class="glyphicon glyphicon-pencil"></i></a>
                            <span style="color:#ddd">|</span>
                            <a href="<?=PATH_GLOBALS?>santri/delete/<?=$data['id']?>"><i class="glyphicon glyphicon-trash"></i></a>
                          </div>
                          </td>
                        </tr>
                        <?php $no++; endforeach; endif;?>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
</div>
</div>