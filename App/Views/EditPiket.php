<div class="col-md-10">
          <div class="row">
            <div class="col-md-12">
              <div class="content-box-large">
                <div class="panel-heading">
                      <div class="panel-title">Edit Data</div>
                    
                      <div class="panel-options">
                        <a href="<?=PATH_GLOBALS?>piket" data-rel="collapse"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
                      </div>
                  </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" action="">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tugas</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?=$data[0]['tugas']?>" name="tugas" id="name" placeholder="Nama">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Orang</label>
                    <div class="col-sm-10">
                      <select name="orang" class="form-control">
                      <?php
                      for ($i=1; $i <= 9 ; $i++) {
                        if ($data[0]['orang'] == $i) {
                           echo "<option value=\"{$i}\" selected>{$i}</option>";
                        }else{
                          echo "<option value=\"{$i}\">{$i}</option>";
                        }
                        
                      }
                      ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="submit" class="btn btn-primary" value="Edit" />
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
</div>
</div>