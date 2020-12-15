          <div class="col-sm-2 row images">
              <div class="col">
                  <div class="titleImg">
                      ../img/upload/<?php echo $x['value']; ?>
                  </div>
                  <img width="100%" src="<?php echo $x['img']; ?>" alt="<?php echo $x['img']; ?>">
                  <div class="descriptImg">
                      <?php echo $x['value']; ?>
                  </div>
              </div>
              <div class="buttonImg">
                  <button class="text-right deleteF" name="idfiles" value="../img/upload/<?php echo $x['value']; ?>">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                      </svg>
                  </button>
              </div>

          </div>