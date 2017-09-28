<div class="col-md-10">
          <div class="row">
            <div class="col-md-12">
              <div class="content-box-large">
                <div class="panel-heading">
                      <div class="panel-title">Edit Data</div>
                    
                      <div class="panel-options">
                        <a href="<?=PATH_GLOBALS?>santri" data-rel="collapse"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
                      </div>
                  </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" action="">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?=$data[0]['name']?>" name="name" id="name" placeholder="Nama">
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