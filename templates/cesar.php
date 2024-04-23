<?php
    /** Charge la barre latérale de navigation */
    template('header', array(
        'title' => 'Boite à outils • Code césar',
    ));
?>

    <!-- ======= CESAR ======= -->
    <section id="homepage" class="homepage">
        <div class="container-fluid row">
            <div class="section-title col-11 mx-auto">
                <h2>Coder ou décoder un texte à l'aide du Code César </h2>
            </div>
            <!-- Explication -->
            <div class="col-11 mx-auto">
                <figure class="bg-light rounded p-3">
                    <blockquote cite="https://www.huxley.net/bnw/four.html">
                        <p>
                            Le code César est une méthode de cryptage qui consiste à décaler chaque lettre de l'alphabet d'un certain rang. Ce code est le plus simple et le plus connu de la cryptographie, mais cela reste très amusant à utiliser.
                        </p>

                        <p>
                            Le code César consiste à substituer une lettre par une autre un plus loin dans l'alphabet, c'est-à-dire qu'une lettre est toujours remplacée par la même lettre et que l'on applique le même décalage à toutes les lettres, cela rend très simple le décode d'un message puisqu'il y a 25 décalages possibles.
                        </p>
                    </blockquote>
                    <figcaption><cite><a href="https://calculis.net/code-cesar">Calculis.net</a></cite></figcaption>
                </figure>
            </div>
            <!-- ----------- -->

            <div class="col-11 mx-auto">
                <div class="container-fluid row justify-content-around">
                    <!-- A Chiffrer -->
                    <fieldset class="col-5 mt-4 pt-2 pb-3">
                        <legend>Chiffrer</legend>
                        <form action="" method="POST" name="cesar">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="clear">Le texte à chiffrer</label>
                                    <div class="input-group">
                                        <textarea id="clear" name="clear" rows="10" class="form-control" required></textarea>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <label for="key">Clé</label>
                                    <div class="input-group">
                                        <input id="key" name="key" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <label for="result">Résultat</label>
                                    <p id="result"></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn-block btn btn-primary">Chiffrer</button>
                                </div>
                            </div>
                        </form>
                    </fieldset>
                    <!-- ---------- -->


                    <!-- A Déchiffrer -->
                    <fieldset class="col-5 mt-4 pt-2 pb-3">
                        <legend>Déchiffrer</legend>
                        <form action="" method="POST" name="cesar">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="result">Le texte à déchiffrer</label>
                                    <div class="input-group">
                                        <textarea id="result" name="result" rows="10" class="form-control" required></textarea>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <label for="key">Clé</label>
                                    <div class="input-group">
                                        <input id="key" name="key" type="number" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <label for="clear">Résultat</label>
                                    <p id="clear"></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn-block btn btn-primary">Déchiffrer</button>
                                </div>
                            </div>
                        </form>
                    </fieldset>
                    <!-- ------------ -->
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== -->


    <script type="text/javascript">
        window.addEventListener('load', () => {
            /** Récupère tous les FORM dans la page HTML, ici se sont ceux avec le NAME CESAR */
            let forms = document.forms;

            for(form of forms){
                form.addEventListener('submit', async (event) => {
                    /** Permet de bloquer les actions par défaut des pages web (ex: redirection vers une 
                     *  page lors d'une sélection de lien) 
                     * */
                    event.preventDefault();

                    /** Permet de récuper toutes les pairs de clé (Name d'un input) et sa valeur (la VALUE) */
                    const formData = new FormData(event.target).entries()

                    /** Renvoi un objet JSON avec dans DATA le résultat du (dé)chiffrement de la forme :
                     *              - Chiffrement : {result: 'ba'}
                     *              - Déchiffrement : {clear: 'az'}
                     */
                    const response = await fetch('/api/post', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(
                            Object.assign(Object.fromEntries(formData), {form: event.target.name})
                        )
                    });

                    const result = await response.json();
                    
                    /** inputName prend soit RESULT soit CLEAR en fonction du (dé)chiffrement */
                    let inputName = Object.keys(result.data)[0];

                    /** Sélection sur l' ID de l'élément de la page HTML */
                    event.target.querySelector(`#${inputName}`).innerHTML= result.data[inputName];

                })
            }
        });
    </script>

<?php 
    /** Charge la fin de la page HTML */
    template('footer');