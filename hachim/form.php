<form name="f_abonnement" target="" method="POST" action="recup_form.php">

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-10">
                <input type="text" required class="form-control" id="Prénom" name="f_prenom" placeholder="First name">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
                <div class="col-sm-10">
                <input type="text" required class="form-control" id="Nom" name="f_nom" placeholder="Last name">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Mail</label>
                <div class="col-sm-10">
                <input type="email" required class="form-control" id="Mail" name="f_mail" placeholder="Email">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Adresse</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="Adresse" name="f_adresse" placeholder="Adress">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Code postal</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="Code postal" name="f_cp" placeholder="ZIP Code">
                </div>
            </div>

            <div class="form-group">
                <label for="inputRIB" class="col-sm-2 control-label">RIB</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="rib" name="f_rib" placeholder="Relevé d'identité bancaire">
                </div>
            </div>


            <div id="typebadge">
                <label for="TypeBadge">Type de badge </label> &nbsp;&nbsp;&nbsp;
                <input type="radio" name="f_type" value="Badge national"> Annuel  &nbsp;&nbsp;
                <input type="radio" checked name="f_type" value="Badge multiparking"> Mensuel <br>
            </div>

            <div class="form-group">
                <div id="bouton" class="col-sm-offset-2 col-sm-10">
                <button id="action" type="submit" class="btn btn-default" onClick="envoiForm()">Envoyer</button>&nbsp;&nbsp;
                <button id="action" type="reset" class="btn btn-default" >Réinitialiser</button>
                </div>
            </div>
  </form>
