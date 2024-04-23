<?php
    /** Charge la barre latérale de navigation */
    template('header', array(
        'title' => 'Boite à outils • Devise',
    ));
?>

    <!-- ======= DEVISE ======= -->
    <section id="homepage" class="homepage">
        <div class="container-fluid row position-relative">
            <div class="section-title col-11 mx-auto">
                <h2>Convertisseur de devise</h2>
            </div>

            <div class="col-11 mx-auto">
                <div class="container-fluid row">
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Euro vers dollar américain</legend>
                        <form action="" method="post" name="convert-currency" id="convert-currency-form">
                            <div class="form-group row">
                                <div class="col-5">
                                    <label for="amount" aria-hidden="true" hidden>Montant</label>
                                    <div class="input-group">
                                        <input id="amount" name="amount" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-2">
                                    <label for="fromCurrency" aria-hidden="true" hidden>Devise source</label>
                                    <select id="fromCurrency" name="fromCurrency" class="form-control" required>
                                        <!-- Options de devises générées dynamiquement par JavaScript -->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-5">
                                    <label for="result" aria-hidden="true" hidden>Résultat</label>
                                    <div class="input-group">
                                        <input id="result" name="result" type="text" class="form-control" disabled>
                                        
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-2">
                                <label for="toCurrency" aria-hidden="true" hidden>Devise cible</label>
                                    <select id="toCurrency" name="toCurrency" class="form-control" required>
                                        <!-- Options de devises générées dynamiquement par JavaScript -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-2 ms-auto mt-2">
                                <button name="submit" type="submit" class="btn btn-primary btn-block col-12">Convertir</button>
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

            <div id="loading" class="position-absolute top-50 start-50 translate-middle" style="max-width:fit-content; display: none;">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
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
               
                    /** Enlève le LOADING SPINNER */
                    document.getElementById('loading').style.display = 'none';
                });
            }
        });

        /** Attend l'activation du BUTTON d'envoi du formulaire pour afficher le 
         *  LOADING SPINNER. 
         * */
        const devise = document.getElementsByName('euros-dollars');

        devise.forEach(element => {
            element.addEventListener('submit', function() {
                document.getElementById('loading').style.display = 'block';
            }); 
        });
    </script>

<?php 
    /** Charge la fin de la page HTML */
    template('footer');
