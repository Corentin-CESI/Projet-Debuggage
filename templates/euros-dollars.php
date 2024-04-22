<?php
template('header', array(
    'title' => 'Boite à outils • Devise',
));
?>

<!-- ======= About Section ======= -->
<section id="homepage" class="homepage">
    <div class="container-fluid row">
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
            </div>
        </div>
    </div>
</section>
<!-- End Home Section -->

<?php template('footer'); ?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
        const fromCurrencySelect = document.getElementById('fromCurrency');
        const toCurrencySelect = document.getElementById('toCurrency');

        // Récupérer les données JSON depuis l'API
        fetch('https://open.er-api.com/v6/latest/USD')
            .then(response => response.json())
            .then(data => {
                // Extraire les devises et leurs symboles
                const currencies = Object.keys(data.rates);

                // Créer une option pour chaque devise et l'ajouter à la liste déroulante
                currencies.forEach(currency => {
                    const option = document.createElement('option');
                    option.value = currency;
                    option.textContent = currency;
                    fromCurrencySelect.appendChild(option);

                    const option2 = document.createElement('option');
                    option2.value = currency;
                    option2.textContent = currency;
                    toCurrencySelect.appendChild(option2);
                });
            })
            .catch(error => console.error('Erreur lors de la récupération des données :', error));
        });

    const form = document.getElementById('convert-currency-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(event.target);
        const amount = formData.get('amount');
        const fromCurrency = formData.get('fromCurrency');
        const toCurrency = formData.get('toCurrency');

        // Fetch the exchange rate from the API
        const response = await fetch(`https://open.er-api.com/v6/latest/${fromCurrency}`);
        const data = await response.json();
        const exchangeRate = data.rates[toCurrency];

        // Perform the conversion
        const result = amount * exchangeRate;

        // Update the input field with the result
        document.getElementById('result').value = result.toFixed(2); // Round to 2 decimal places
    });
</script>

<?php template('footer'); ?>
