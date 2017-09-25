<form name="f_modif_client" target="" method="POST" action="./modification2Cons.php">
         
         
                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Prénom</label>
                    <div class="col-sm-10">
                      <input type="text" required class="form-control" id="prénom" name="f_prenom" value=<?php echo "$prenom" ?> readonly>
                    </div>
                  </div>
         
 
                                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name='f_nom' id="Nom"  value=<?php echo "$nom" ?> readonly>
                 </div>                               
                </div>
                
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">No parking</label>
                    <div class="col-sm-10">
                      <input type="text" required class="form-control" id="numéroparking" name="f_numpar" placeholder="Parking number">
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">No client</label>
                    <div class="col-sm-10">
                      <input type="text" required class="form-control" id="numéroclient" name="f_numcli" placeholder="Id">
                    </div>
                  </div>
                            
                
                
                
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="modifier" value="modifier" class="btn btn-default">Modifier</button>  &nbsp;&nbsp;
                      <button type="submit" name="supprimer" value="supprimer" class="btn btn-default">Supprimer</button>
                    </div>
                  </div>

                </table>
                </form>



