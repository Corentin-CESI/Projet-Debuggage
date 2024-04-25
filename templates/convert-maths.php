<?php
template('header', array(
    'title' => 'Boite à outils • Convertisseur de litres et millilitres',
));
?>

    <!-- ======= Convert Maths ======= -->
    <section id="homepage" class="homepage">
        <div class="container-fluid row">
            <div class="section-title col-11 mx-auto">
                <h2>Convertisseur d'unités de volume</h2>
            </div>

            <div class="col-11 mx-auto">
                <div class="container-fluid row">
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Conversion de litres en millilitres</legend>
                        <form action="" method="post" name="LtomL">
                            <div class="form-group row">
                                <div class="col-5">
                                    <label for="L" aria-hidden="true" hidden>Litres</label>
                                    <div class="input-group">
                                        <input id="L" name="L" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">L</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-2">
                                    <span class="ver">équivaut à</span>
                                </div>

                                <div class="col-5">
                                    <label for="mL" aria-hidden="true" hidden>Millilitres</label>
                                    <div class="input-group">
                                        <input id="mL" name="mL" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <div class="input-group-text">mL</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 ms-auto mt-2">
                                    <button name="submit" type="submit" class="btn btn-primary btn-block col-12">Calculer</button>
                                </div>
                            </div>
                        </form>
                    </fieldset>

                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Conversion de millilitres en litres</legend>
                        <form action="" method="post" name="LtomL">
                            <div class="form-group row">
                                <div class="col-5">
                                    <label for="mL" aria-hidden="true" hidden>Millilitres</label>
                                    <div class="input-group">
                                        <input id="mL" name="mL" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">mL</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-2">
                                    <span class="ver">équivaut à</span>
                                </div>

                                <div class="col-5">
                                    <label for="L" aria-hidden="true" hidden>Litres</label>
                                    <div class="input-group">
                                        <input id="L" name="L" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <div class="input-group-text">L</div>
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
    <script type="text/javascript">
    window.addEventListener('load', () => {
        let forms = document.forms;

        for (let form of forms) {
            form.addEventListener('submit', async (event) => {
                event.preventDefault();

                const formData = new FormData(event.target).entries();
                
                const response = await fetch('/api/post', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(
                        Object.assign(Object.fromEntries(formData), { form: event.target.name })
                    )
                });

                const result = await response.json();
                console.log(result);

                let inputName = Object.keys(result.data)[0];

                event.target.querySelector(`input[name="${inputName}"]`).value = result.data[inputName];
            });
        }
    });
</script>
