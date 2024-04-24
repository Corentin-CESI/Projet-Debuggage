<?php
    /** Charge la barre latérale de navigation */
    template('header', array(
        'title' => 'Boite à outils • Décimal - Hexadécimal',
    ));
?>

    <!-- ======= DECIMAL HEXADECIMAL ======= -->
    <section id="homepage" class="homepage">
        <div class="container-fluid row position-relative">
            <div class="section-title col-11 mx-auto">
                <h2>Convertisseur système décimal positif en binaire </h2>
            </div>

            <div class="col-11 mx-auto">
                <figure class="bg-light rounded p-3">
                    <blockquote cite="https://www.huxley.net/bnw/four.html">
                        <p>
                            Le système binaire (du latin binārĭus, « double ») est le système de numération utilisant la base 2. On nomme couramment bit (de l'anglais binary digit, soit « chiffre binaire ») les chiffres de la numération binaire positionnelle. Un bit peut prendre deux valeurs, notées par convention 0 et 1.
                        </p>   <p>
                            Le système binaire est utile pour représenter le fonctionnement de l'électronique numérique utilisée dans les ordinateurs. Il est donc utilisé par les langages de programmation de bas niveau.
                        </p>
                    </blockquote>
                    <figcaption><cite><a href="https://fr.wikipedia.org/wiki/Syst%C3%A8me_binaire">Wikipedia</a></cite></figcaption>
                </figure>
            </div>

            <div class="col-11 mx-auto">
                <div class="container-fluid row">
                    <fieldset class="col-11 mt-4 mx-auto pb-3">
                        <legend>Convertisseur</legend>
                        <form action="" name="decimal-hexadecimal">
                            <div class="form-group row g-2">
                                <div class="col-12">
                                    <label for="decimal">Décimal</label>
                                    <div class="input-group">
                                        <input id="decimal" name="decimal" type="number" min="0" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="hex">Héxadécimal</label>
                                    <div class="input-group">
                                        <input id="hex" name="hex" type="text"  class="form-control" disabled>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="binary">Binaire</label>
                                    <div class="input-group">
                                        <input id="binary" name="binary" type="text" min="0" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn-block btn btn-primary">Convertir</button>
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
    <!-- =================================== -->

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
                const formData = new FormData(event.target).entries();

                /** Renvoi un objet JSON avec dans DATA le résultat de la conversion de la forme :
                 *              -  : [{hex: 'c'}, {binary: '1100'}]
                 */
                const response = await fetch('/api/post', {
                    method: 'POST',
                    header: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(
                        Object.assign(Object.fromEntries(formData), {form: event.target.name})
                    )
                });

                const result = await response.json();

                /** inputName prend soit HEX soit BINARY */
                let inputNameHEX = Object.keys(result.data[0])[0];
                let inputNameBIN = Object.keys(result.data[1])[0];
                
                /** Sélection sur l' ID de l'élément de la page HTML */
                event.target.querySelector(`#${inputNameHEX}`).value = result.data[0][inputNameHEX];
                event.target.querySelector(`#${inputNameBIN}`).value = result.data[1][inputNameBIN];

                /** Enlève le LOADING SPINNER */
                document.getElementById('loading').style.display = 'none';
            })
        }
    });

    /** Attend l'activation du BUTTON de validation du formulaire */
    const dec = document.getElementsByName('decimal-hexadecimal');

    dec.forEach(element => {
        element.addEventListener('submit', function() {
            document.getElementById('loading').style.display = 'block';
        }); 
    });
</script>

<?php 
    /** Charge la fin de la page HTML */
    template('footer');
