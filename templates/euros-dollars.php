<?php
    /** Charge la barre latérale de navigation */
    template('header', array(
        'title' => 'Boite à outils • Devise',
    ));
?>

    <!-- ======= DEVISE ======= -->
    <section id="homepage" class="homepage">
        <div class="container-fluid row">
            <div class="section-title col-11 mx-auto">
                <h2>Convertisseur de devise</h2>
            </div>

            <div class="col-11 mx-auto">
                <div class="container-fluid row">
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Euro vers dollar américain</legend>
                        <form action="" method="post" name="euros-dollars">
                            <div class="form-group row">
                                <div class="col-5">
                                    <label for="EUR" aria-hidden="true" hidden>Euros</label>
                                    <div class="input-group">
                                        <input id="EUR" name="EUR" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">€</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-2">
                                    <span class="ver">vaut actuellement</span>
                                </div>

                                <div class="col-5">
                                    <label for="USD" aria-hidden="true" hidden>Dollars</label>
                                    <div class="input-group">
                                        <input id="USD" name="USD" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <div class="input-group-text">$</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 ms-auto mt-2">
                                    <button name="submit" type="submit" class="btn btn-primary btn-block col-12">Calculer</button>
                                </div>

                                <!--https://fr.calcuworld.com/calculs-mathematiques/calculatrice-pourcentage/-->
                            </div>
                        </form>
                    </fieldset>

                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Dollar américain vers euro</legend>
                        <form action="" method="post" name="euros-dollars">
                            <div class="form-group row">
                                <div class="col-5">
                                    <label for="USD" aria-hidden="true" hidden>Dollars</label>
                                    <div class="input-group">
                                        <input id="USD" name="USD" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">$</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-2">
                                    <span class="ver">vaut actuellement</span>
                                </div>

                                <div class="col-5">
                                    <label for="EUR" aria-hidden="true" hidden>Euros</label>
                                    <div class="input-group">
                                        <input id="EUR" name="EUR" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <div class="input-group-text">€</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2 ms-auto mt-2">
                                    <button name="submit" type="submit" class="btn btn-primary btn-block col-12">Calculer</button>
                                </div>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== -->


    <script type="text/javascript">
        window.addEventListener('load', () => {
            /** Récupère tous les FORM dans la page HTML */
            let forms = document.forms;

            for(form of forms){
                form.addEventListener('submit', async (event) => {
                    /** Permet de bloquer les actions par défaut des pages web (ex: redirection vers une 
                     *  page lors d'une sélection de lien) 
                     * */
                    event.preventDefault();

                    /** Permet de récuper toutes les pairs de clé (Name d'un input) et sa valeur (la VALUE) */
                    const formData = new FormData(event.target).entries()

                    /** Renvoi un objet JSON avec dans DATA le résultat de la convertion monétaire de la forme :
                     *              - Chiffrement : {USD: 12.89}
                     */
                    const response = await fetch('/api/post', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(
                            Object.assign(Object.fromEntries(formData), {form: event.target.name})
                        )
                    });

                    const result = await response.json();

                    /** inputName prend la devise monétaire qui a été converti*/
                    let inputName = Object.keys(result.data)[0];

                    /** Sélection sur le NAME de l'élément de la page HTML */
                    event.target.querySelector(`input[name="${inputName}"]`).value = result.data[inputName];
                });
            }
        });
    </script>

<?php 
    /** Charge la fin de la page HTML */
    template('footer');
