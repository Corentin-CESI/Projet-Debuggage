<?php
    /** Charge la barre latérale de navigation */
    template('header', array(
        'title' => 'Boite à outils • Pourcentage',
    ));
?>

    <!-- ======= POURCENTAGE ======= -->
    <section id="homepage" class="homepage">
        <div class="container-fluid col-11 mx-auto">
            <div class="section-title">
                <h2>Calcul de pourcentage </h2>
                <p>La calculatrice de pourcentage vous permez de calculez facilement le pourcentage de n’importe quel chiffre avec la calculatrice de pourcentage en ligne, une calculatrice utile et simple à utiliser.</p>
            </div>

            <div class="col-11 mx-auto">
                <fieldset class="col-12 mt-4 ps-2 pt-2">
                    <legend>Calculer la quantité</legend>
                    <form action="" method="POST" name="percent">
                        <div class="form-group row mx-auto">
                            <div class="col-3">
                                <label for="percent" aria-hidden="true" hidden>Pourcentage</label>
                                <div class="input-group">
                                    <input id="percent" name="percent" type="text" class="form-control" required value="50">
                                    <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="of" aria-hidden="true" hidden>Nombre</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">de</div>
                                    </div>
                                    <input id="of" name="of" type="text" class="form-control" required value="50">
                                </div>
                            </div>

                            <div class="d-inline-flex align-items-center col-1 mb-3">
                                <span class="ver mx-auto">=</span>
                            </div>

                            <div class="col-3">
                                <label for="result" aria-hidden="true" hidden>Résultat</label>
                                <div class="input-group">
                                    <input id="result" name="result" type="text" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="col-2 mb-3">
                                <button name="submit" type="submit" class="btn btn-primary btn-block">Calculer</button>
                            </div>
                        </div>
                    </form>
                </fieldset>


                <fieldset class="col-12 mt-4 ps-2 pt-2">
                    <legend>Calculer le nombre initial</legend>
                    <form action="" method="POST" name="percent">
                        <div class="form-group row mx-auto">
                            <div class="col-3">
                                <label for="result" aria-hidden="true" hidden>Nombre</label>
                                <div class="input-group">
                                    <input id="result" name="result" type="text" class="form-control" required value="10">
                                </div>
                            </div>


                            <div class="d-inline-flex align-items-center col mb-3">
                                <span class="ver">est le</span>
                            </div>

                            <div class="col-3">
                                <label for="percent" aria-hidden="true" hidden>Nombre</label>
                                <div class="input-group">
                                    <input id="percent" name="percent" type="text" class="form-control" required value="10">
                                    <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                    </div>
                                </div>
                            </div>


                            <div class="d-inline-flex align-items-center col mb-3">
                                <span class="ver">de</span>
                            </div>


                            <div class="col-3 mb-3">
                                <label for="of" aria-hidden="true" hidden>Résultat</label>
                                <div class="input-group">
                                    <input id="of" name="of" type="text" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="col">
                                <button name="submit" type="submit" class="btn btn-primary btn-block">Calculer</button>
                            </div>
                        </div>
                    </form>
                </fieldset>

                <fieldset class="col-12 mt-4 ps-2 pt-2">
                    <legend>Calculer le pourcentage</legend>
                    <form action="" method="POST" name="percent">
                        <div class="form-group row mx-auto">
                            <div class="col-3">
                                <label for="of" aria-hidden="true" hidden>Nombre</label>
                                <div class="input-group">
                                    <input id="of" name="of" type="text" class="form-control" required>
                                </div>
                            </div>


                            <div class="d-inline-flex align-items-center col mb-3">
                                <span class="ver">est le</span>
                            </div>

                            <div class="col-3">
                                <label for="percent" aria-hidden="true" hidden>Nombre</label>
                                <div class="input-group">
                                    <input id="percent" name="percent" type="text" class="form-control" disabled>
                                    <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                    </div>
                                </div>
                            </div>


                            <div class="d-inline-flex align-items-center col mb-3">
                                <span class="ver">de</span>
                            </div>


                            <div class="col-3 mb-3">
                                <label for="result" aria-hidden="true" hidden>Résultat</label>
                                <div class="input-group">
                                    <input id="result" name="result" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="col">
                                <button name="submit" type="submit" class="btn btn-primary btn-block">Calculer</button>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>

            <div id="loading" class="position-absolute top-50 start-50 translate-middle" style="max-width:fit-content; display: none;">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </section>
    <!-- =========================== -->

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
                     *              -  : {result: 25}
                     *              -  : {of: 50}
                     *              -  : {percent: 50}
                     */
                    const response = await fetch('/api/post', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(
                            Object.assign(Object.fromEntries(formData), {form: event.target.name})
                        )
                    });

                    const result = await response.json();

                    /** inputName prend la première colonne du résultat dans DATA (result -- of -- percent) */
                    let inputName = Object.keys(result.data)[0];

                    /** Sélection sur le NAME de l'élément de la page HTML */
                    event.target.querySelector(`input[name="${inputName}"]`).value = result.data[inputName];

                    /** Enlève le LOADING SPINNER */
                    document.getElementById('loading').style.display = 'none';
                })
            }
        });

        /** Attend l'activation du BUTTON d'envoi du formulaire pour afficher le 
         *  LOADING SPINNER. 
         * */
        const percent = document.getElementsByName('percent');

        percent.forEach(element => {
            element.addEventListener('submit', function() {
                document.getElementById('loading').style.display = 'block';
            }); 
        });
    </script>

<?php 
    /** Charge la fin de la page HTML */
    template('footer');
