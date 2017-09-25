<section>
            <h2 style="font-family:Candara"> Chiffre d'affaire </h2>
            <br><br>
            <form name="f_envoyer" target="" method="POST" action="caj.php">
            <select name="ca" size="1" class="form-control">
            <option value="caj"> Chiffre d'affaire de l'heure </option>
                <option value="cag">Chiffre d'affaire</option>
            </select>
            <br>
            <select name="choix" size="1" class="form-control">
                <option value="Espèces"> Espèces</option>
                <option value="Carte bancaire">Carte bancaire</option>
                <option value="Badge mensuel">Badge mensuel</option>
                <option value="Badge annuel">Badge annuel</option>
                //option value="Tout type de paiement">Tout type de paiement</option>
            </select>
            <br>
            <button id="action" class="btn btn-default" onClick="caj()">Valider</button><br />

            </form>

    </section>
