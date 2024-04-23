<?php
    /** Charge la barre latérale de navigation */
    template('header', array(
        'title' => 'Boite à outils • Décimal - Hexadécimal',
    ));
?>

    <!-- ======= DECIMAL HEXADECIMAL ======= -->
    <section id="homepage" class="homepage">
        <div class="container-fluid row">
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
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </section>
    <!-- =================================== -->

<script type="text/javascript">
    window.addEventListener('load', () => {
        /** Récupère tous les FORM dans la page HTML */
        let forms = document.forms;

        /** Récupère depuis le FORM du NAME DECIMAL-HEXADECIMAL l'élément DECIMAL */
        let decimal = forms['decimal-hexadecimal'].elements['decimal'];

        /** Fonction de convertion du DECIMAL vers l'HEXADECIMAL */
        function dec2Hex(dec) {
            return Math.abs(dec).toString(16);
        }

        /** Fonction de convertion du DECIMAL vers le BINAIRE */
        function convertToBinary(x) {
            let bin = 0;
            let rem, i = 1, step = 1;
            while (x !== 0) {
                rem = x % 2;
                console.log(
                    `Step ${step++}: ${x}/2, Remainder = ${rem}, Quotient = ${parseInt(x/2)}`
                );
                x = parseInt(x / 2); //Prend l'arrondi le plus proche de l'entier
                bin = bin + rem * i;
                i = i * 10;
            }
            return bin;
        }

        /** Reste à l'écoute du moindre changement de type INPUT (ex: touche du clavier) */
        decimal.addEventListener('input', () => {
            /** Récupère depuis le FORM du NAME DECIMAL-HEXADECIMAL l'élément HEXADECIMAL */
            let hex = forms['decimal-hexadecimal'].elements['hex'];

            /** Récupère depuis le FORM du NAME DECIMAL-HEXADECIMAL l'élément BINAIRE */
            let binary = forms['decimal-hexadecimal'].elements['binary'];


            hex.value = dec2Hex(decimal.value);
            binary.value = convertToBinary(decimal.value);
        });

    });
</script>

<?php 
    /** Charge la fin de la page HTML */
    template('footer');
