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
                        <form action="" method="post" name="euros-dollars">
                            <div class="form-group row">
                                <div class="col-5">
                                    <label for="fromCurrency" aria-hidden="true" hidden>Euros</label>
                                    <div class="input-group">
                                        <input id="fromCurrency" name="fromCurrency" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <select id="fromCurrencySelect" name="fromCurrencySelect" class="form-control" required>
                                                <option selected hidden>USD</option>
                                                <!-- Options de devises générées dynamiquement par JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-2">
                                    <span class="ver">vaut actuellement</span>
                                </div>

                                <div class="col-5 ">
                                    <label for="toCurrency" aria-hidden="true" hidden>Dollars</label>
                                    <div class="input-group">
                                        <input id="toCurrency" name="toCurrency" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <select id="toCurrencySelect" name="toCurrencySelect" class="form-control" required>
                                                <option selected hidden>EUR</option>
                                                <!-- Options de devises générées dynamiquement par JavaScript -->
                                            </select>
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
            const fromCurrencySelect = document.getElementById('fromCurrencySelect');
            const toCurrencySelect = document.getElementById('toCurrencySelect');
            
            // Récupérer les données JSON depuis l'API
            fetch('https://open.er-api.com/v6/latest/AED')
                .then(response => response.json())
                .then(data => {
                    // Extraire les devises et leurs symboles
                    const currencies = Object.keys(data.rates);

                    // Créer une option pour chaque devise et l'ajouter à la liste déroulante
                    currencies.forEach(currency => {
                        /** FromCurrencySelect */
                        const optionFromCurrency = document.createElement('option');
                        
                        optionFromCurrency.value = currency;
                        optionFromCurrency.textContent = currency;

                        fromCurrencySelect.appendChild(optionFromCurrency);

                        /** ToCurrencySelect */
                        const optionToCurrency = document.createElement('option');
                        
                        optionToCurrency.value = currency;
                        optionToCurrency.textContent = currency;

                        toCurrencySelect.appendChild(optionToCurrency);

                        /** A noter : obligé de faire en 2 fois puisque l'objet ne peut être 
                         *  attribué à un seul élément 
                         * */
                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des données :', error));


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
