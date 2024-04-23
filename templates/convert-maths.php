<?php
template('header', array(
    'title' => 'Boite à outils • Code césar',
));
?>

    <!-- ======= Convert Maths ======= -->
    <section id="homepage" class="homepage">
        <div class="container-fluid row">
            <div class="section-title col-11 mx-auto">
                <h2>Convertisseur d'unité mathématiques</h2>
            </div>

            <div class="col-11 mx-auto">
                <div class="container-fluid row">
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Machin en Truc</legend>
                        <form action="" method="post" name="machin-truc">
                            <div class="form-group row">
                                <div class="col-5">
                                    <label for="EUR" aria-hidden="true" hidden>Machin</label>
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
                                    <label for="USD" aria-hidden="true" hidden>Truc</label>
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
    <!-- ======= Convert Maths END ======= -->