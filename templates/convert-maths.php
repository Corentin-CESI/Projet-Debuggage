<?php
template('header', array(
    'title' => 'Boite à outils • Convertisseur de litres et millilitres',
));
?>

    <!-- ======= Convert Maths ======= -->
    <section id="homepage" class="homepage">
        <div class="container-fluid row">
            <div class="section-title col-11 mx-auto">
                <h2>Convertisseur d'unités</h2>
            </div>

            <div class="col-11 mx-auto">
                <div class="container-fluid row">
                    <!-- Liter to Milliliter -->
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Conversion de litres en millilitres</legend>
                        <form action="" method="post" name="LtomL">
                            <div class="form-group row position-relative">
                                <div class="col-5">
                                    <label for="L" aria-hidden="true" hidden>Litres</label>
                                    <div class="input-group">
                                        <input id="L" name="L" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">L</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-1" style="max-height:fit-content">
                                    <span class="ver fs-1 position-absolute top-0 start-50 translate-middle mt-3" style="padding-right:2em">↔</span>
                                </div>

                                <div class="col-6">
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

                    <!-- Milliliter to Liter -->
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Conversion de millilitres en litres</legend>
                        <form action="" method="post" name="LtomL">
                            <div class="form-group row position-relative">
                                <div class="col-5">
                                    <label for="mL" aria-hidden="true" hidden>Millilitres</label>
                                    <div class="input-group">
                                        <input id="mL" name="mL" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">mL</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-1" style="max-height:fit-content">
                                    <span class="ver fs-1 position-absolute top-0 start-50 translate-middle mt-3" style="padding-right:2em">↔</span>
                                </div>

                                <div class="col-6">
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

                    <!-- Length -->
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Longueur</legend>
                        <form action="" method="post" name="length">
                            <div class="form-group row position-relative">
                                <div class="col-5">
                                    <div class="input-group">
                                        <input id="fromLength" name="fromLength" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <select id="fromLengthSelect" name="fromLengthSelect" class="form-control" required>
                                                <option value="Meter" selected hidden>m - Meter</option>
                                                <!-- Options de devises générées dynamiquement par JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-1" style="max-height:fit-content">
                                    <span class="ver fs-1 position-absolute top-0 start-50 translate-middle mt-3" style="padding-right:2em">↔</span>
                                </div>

                                <div class="col-6">
                                    <div class="input-group">
                                        <input id="toLength" name="toLength" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <select id="toLengthSelect" name="toLengthSelect" class="form-control" required>
                                                <option value="Mile" selected hidden>mi - Mile</option>
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

                    <!-- Angle -->
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Angle</legend>
                        <form action="" method="post" name="angle">
                            <div class="form-group row position-relative">
                                <div class="col-5">
                                    <div class="input-group">
                                        <input id="fromAngle" name="fromAngle" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <select id="fromAngleSelect" name="fromAngleSelect" class="form-control" required>
                                                <option value="Degree" selected hidden>° - Degree</option>
                                                <!-- Options de devises générées dynamiquement par JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-1" style="max-height:fit-content">
                                    <span class="ver fs-1 position-absolute top-0 start-50 translate-middle mt-3" style="padding-right:2em">↔</span>
                                </div>

                                <div class="col-6">
                                    <div class="input-group">
                                        <input id="toAngle" name="toAngle" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <select id="toAngleSelect" name="toAngleSelect" class="form-control" required>
                                                <option value="Radian" selected hidden>rad - Radian</option>
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

                    <!-- Area -->
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Aire</legend>
                        <form action="" method="post" name="area">
                            <div class="form-group row position-relative">
                                <div class="col-5">
                                    <div class="input-group">
                                        <input id="fromArea" name="fromArea" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <select id="fromAreaSelect" name="fromAreaSelect" class="form-control" required>
                                                <option value="Square Meter" selected hidden>m² - Square Meter</option>
                                                <!-- Options de devises générées dynamiquement par JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-1" style="max-height:fit-content">
                                    <span class="ver fs-1 position-absolute top-0 start-50 translate-middle mt-3" style="padding-right:2em">↔</span>
                                </div>

                                <div class="col-6">
                                    <div class="input-group">
                                        <input id="toArea" name="toArea" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <select id="toAreaSelect" name="toAreaSelect" class="form-control" required>
                                                <option value="Square Kilometer" selected hidden>km² - Square Kilometer</option>
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

                    <!-- Mass -->
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Masse</legend>
                        <form action="" method="post" name="mass">
                            <div class="form-group row position-relative">
                                <div class="col-5">
                                    <div class="input-group">
                                        <input id="fromMass" name="fromMass" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <select id="fromMassSelect" name="fromMassSelect" class="form-control" required>
                                                <option value="Gram" selected hidden>g - Gram</option>
                                                <!-- Options de devises générées dynamiquement par JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-1" style="max-height:fit-content">
                                    <span class="ver fs-1 position-absolute top-0 start-50 translate-middle mt-3" style="padding-right:2em">↔</span>
                                </div>

                                <div class="col-6">
                                    <div class="input-group">
                                        <input id="toMass" name="toMass" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <select id="toMassSelect" name="toMassSelect" class="form-control" required>
                                                <option value="Pound" selected hidden>lbs - Pound</option>
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

                    <!-- Temperature -->
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Température</legend>
                        <form action="" method="post" name="temperature">
                            <div class="form-group row position-relative">
                                <div class="col-5">
                                    <div class="input-group">
                                        <input id="fromTemperature" name="fromTemperature" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <select id="fromTemperatureSelect" name="fromTemperatureSelect" class="form-control" required>
                                                <option value="Celsius" selected hidden>°C - Celsius</option>
                                                <!-- Options de devises générées dynamiquement par JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-1" style="max-height:fit-content">
                                    <span class="ver fs-1 position-absolute top-0 start-50 translate-middle mt-3" style="padding-right:2em">↔</span>
                                </div>

                                <div class="col-6">
                                    <div class="input-group">
                                        <input id="toTemperature" name="toTemperature" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <select id="toTemperatureSelect" name="toTemperatureSelect" class="form-control" required>
                                                <option value="Fahrenheit" selected hidden>°F - Fahrenheit</option>
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

                    <!-- Time -->
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Temps</legend>
                        <form action="" method="post" name="time">
                            <div class="form-group row position-relative">
                                <div class="col-5">
                                    <div class="input-group">
                                        <input id="fromTime" name="fromTime" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <select id="fromTimeSelect" name="fromTimeSelect" class="form-control" required>
                                                <option value="Second" selected hidden>Second</option>
                                                <!-- Options de devises générées dynamiquement par JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-1" style="max-height:fit-content">
                                    <span class="ver fs-1 position-absolute top-0 start-50 translate-middle mt-3" style="padding-right:2em">↔</span>
                                </div>

                                <div class="col-6">
                                    <div class="input-group">
                                        <input id="toTime" name="toTime" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <select id="toTimeSelect" name="toTimeSelect" class="form-control" required>
                                                <option value="Minute" selected hidden>Minute</option>
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

                    <!-- Speed -->
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Vitesse</legend>
                        <form action="" method="post" name="speed">
                            <div class="form-group row position-relative">
                                <div class="col-5">
                                    <div class="input-group">
                                        <input id="fromSpeed" name="fromSpeed" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <select id="fromSpeedSelect" name="fromSpeedSelect" class="form-control" required>
                                                <option value="km/h" selected hidden>km/h</option>
                                                <!-- Options de devises générées dynamiquement par JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-1" style="max-height:fit-content">
                                    <span class="ver fs-1 position-absolute top-0 start-50 translate-middle mt-3" style="padding-right:2em">↔</span>
                                </div>

                                <div class="col-6">
                                    <div class="input-group">
                                        <input id="toSpeed" name="toSpeed" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <select id="toSpeedSelect" name="toSpeedSelect" class="form-control" required>
                                                <option value="m/s" selected hidden>m/s</option>
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

                    <!-- Volume -->
                    <fieldset class="col-11 mx-auto mt-4 pb-3 pt-3">
                        <legend>Volume</legend>
                        <form action="" method="post" name="volume">
                            <div class="form-group row position-relative">
                                <div class="col-5">
                                    <div class="input-group">
                                        <input id="fromVolume" name="fromVolume" type="text" class="form-control" required>
                                        <div class="input-group-append">
                                            <select id="fromVolumeSelect" name="fromVolumeSelect" class="form-control" required>
                                                <option value="Liter" selected hidden>L - Liter</option>
                                                <!-- Options de devises générées dynamiquement par JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-flex align-items-center col-1" style="max-height:fit-content">
                                    <span class="ver fs-1 position-absolute top-0 start-50 translate-middle mt-3" style="padding-right:2em">↔</span>
                                </div>

                                <div class="col-6">
                                    <div class="input-group">
                                        <input id="toVolume" name="toVolume" type="text" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <select id="toVolumeSelect" name="toVolumeSelect" class="form-control" required>
                                                <option value="Cubic Centimeter" selected hidden>cm³ - Cubic Centimeter</option>
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
    <!-- ======= Convert Maths END ======= -->
    <script type="text/javascript">
        window.addEventListener('load', () => {
            /**
             * LENGHT
             */
            const fromLengthSelect = document.getElementById('fromLengthSelect');
            const toLengthSelect = document.getElementById('toLengthSelect');
            
            // Récupérer les données JSON
            fetch('./json/length.json')
                .then(response => response.json())
                .then(data => {
                    // Extraire les unités
                    const lengths = Object.keys(data);
                    
                    // Créer une option pour chaque unité et l'ajouter à la liste déroulante
                    lengths.forEach(length => {
                        /** fromLengthSelect */
                        const optionFromLength = document.createElement('option');
                        
                        optionFromLength.value = length;
                        optionFromLength.textContent = data[length]["unit"] + " - " + length;

                        fromLengthSelect.appendChild(optionFromLength);

                        /** toLengthSelect */
                        const optionToLength = document.createElement('option');
                        
                        optionToLength.value = length;
                        optionToLength.textContent = data[length]["unit"] + " - " + length;

                        toLengthSelect.appendChild(optionToLength);

                        /** A noter : obligé de faire en 2 fois puisque l'objet ne peut être 
                         *  attribué à un seul élément 
                         * */
                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des données :', error));

            /**
             * ANGLE
             */
            const fromAngleSelect = document.getElementById('fromAngleSelect');
            const toAngleSelect = document.getElementById('toAngleSelect');
            
            // Récupérer les données JSON
            fetch('./json/angle.json')
                .then(response => response.json())
                .then(data => {
                    // Extraire les unités
                    const angles = Object.keys(data);
                    
                    // Créer une option pour chaque unité et l'ajouter à la liste déroulante
                    angles.forEach(angle => {
                        /** fromAngleSelect */
                        const optionFromAngle = document.createElement('option');
                        
                        optionFromAngle.value = angle;
                        optionFromAngle.textContent = data[angle]["unit"] + " - " + angle;

                        fromAngleSelect.appendChild(optionFromAngle);

                        /** toAngleSelect */
                        const optionToAngle = document.createElement('option');
                        
                        optionToAngle.value = angle;
                        optionToAngle.textContent = data[angle]["unit"] + " - " + angle;

                        toAngleSelect.appendChild(optionToAngle);

                        /** A noter : obligé de faire en 2 fois puisque l'objet ne peut être 
                         *  attribué à un seul élément 
                         * */
                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des données :', error));

            /**
             * AREA
             */
            const fromAreaSelect = document.getElementById('fromAreaSelect');
            const toAreaSelect = document.getElementById('toAreaSelect');
            
            fetch('./json/area.json')
                .then(response => response.json())
                .then(data => {
                    const areas = Object.keys(data);
                    
                    areas.forEach(area => {
                        /** fromAreaSelect */
                        const optionFromArea = document.createElement('option');
                        
                        optionFromArea.value = area;
                        optionFromArea.textContent = data[area]["unit"] + " - " + area;

                        fromAreaSelect.appendChild(optionFromArea);

                        /** toAreaSelect */
                        const optionToArea = document.createElement('option');
                        
                        optionToArea.value = area;
                        optionToArea.textContent = data[area]["unit"] + " - " + area;

                        toAreaSelect.appendChild(optionToArea);
                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des données :', error));

            /**
             * MASS
             */     
            const fromMassSelect = document.getElementById('fromMassSelect');
            const toMassSelect = document.getElementById('toMassSelect');
            
            fetch('./json/mass.json')
                .then(response => response.json())
                .then(data => {
                    const masses = Object.keys(data);
                    
                    masses.forEach(mass => {
                        /** fromMassSelect */
                        const optionFromMass = document.createElement('option');
                        
                        optionFromMass.value = mass;
                        optionFromMass.textContent = data[mass]["unit"] + " - " + mass;

                        fromMassSelect.appendChild(optionFromMass);

                        /** toMassSelect */
                        const optionToMass = document.createElement('option');
                        
                        optionToMass.value = mass;
                        optionToMass.textContent = data[mass]["unit"] + " - " + mass;

                        toMassSelect.appendChild(optionToMass);

                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des données :', error));

            /**
             * SPEED
             */
            const fromSpeedSelect = document.getElementById('fromSpeedSelect');
            const toSpeedSelect = document.getElementById('toSpeedSelect');
            
            fetch('./json/speed.json')
                .then(response => response.json())
                .then(data => {
                    const speeds = Object.keys(data);
                    
                    speeds.forEach(speed => {
                        /** fromSpeedSelect */
                        const optionFromSpeed = document.createElement('option');
                        
                        optionFromSpeed.value = speed;
                        optionFromSpeed.textContent = speed;

                        fromSpeedSelect.appendChild(optionFromSpeed);

                        /** toSpeedSelect */
                        const optionToSpeed = document.createElement('option');
                        
                        optionToSpeed.value = speed;
                        optionToSpeed.textContent = speed;

                        toSpeedSelect.appendChild(optionToSpeed);

                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des données :', error));

            /**
             * TEMPERATURE
             */
            const fromTemperatureSelect = document.getElementById('fromTemperatureSelect');
            const toTemperatureSelect = document.getElementById('toTemperatureSelect');
            
            fetch('./json/temperature.json')
                .then(response => response.json())
                .then(data => {
                    const temperatures = Object.keys(data);
                    
                    temperatures.forEach(temperature => {
                        /** fromTemperatureSelect */
                        const optionFromTemperature = document.createElement('option');
                        
                        optionFromTemperature.value = temperature;
                        optionFromTemperature.textContent = data[temperature]["unit"] + " - " + temperature;

                        fromTemperatureSelect.appendChild(optionFromTemperature);

                        /** toTemperatureSelect */
                        const optionToTemperature = document.createElement('option');
                        
                        optionToTemperature.value = temperature;
                        optionToTemperature.textContent = data[temperature]["unit"] + " - " + temperature;

                        toTemperatureSelect.appendChild(optionToTemperature);

                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des données :', error));

            /**
             * TIME
             */
            const fromTimeSelect = document.getElementById('fromTimeSelect');
            const toTimeSelect = document.getElementById('toTimeSelect');
            
            fetch('./json/time.json')
                .then(response => response.json())
                .then(data => {
                    const times = Object.keys(data);
                    
                    times.forEach(time => {
                        /** fromTimeSelect */
                        const optionFromTime = document.createElement('option');
                        
                        optionFromTime.value = time;
                        optionFromTime.textContent = time;

                        fromTimeSelect.appendChild(optionFromTime);

                        /** toTimeSelect */
                        const optionToTime = document.createElement('option');
                        
                        optionToTime.value = time;
                        optionToTime.textContent = time;

                        toTimeSelect.appendChild(optionToTime);

                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des données :', error));            
            

            /**
             * VOLUME
             */
            const fromVolumeSelect = document.getElementById('fromVolumeSelect');
            const toVolumeSelect = document.getElementById('toVolumeSelect');
            
            fetch('./json/volume.json')
                .then(response => response.json())
                .then(data => {
                    const volumes = Object.keys(data);
                    
                    volumes.forEach(volume => {
                        /** fromVolumeSelect */
                        const optionFromVolume = document.createElement('option');
                        
                        optionFromVolume.value = volume;
                        optionFromVolume.textContent = data[volume]["unit"] + " - " + volume;

                        fromVolumeSelect.appendChild(optionFromVolume);

                        /** toVolumeSelect */
                        const optionToVolume = document.createElement('option');
                        
                        optionToVolume.value = volume;
                        optionToVolume.textContent = data[volume]["unit"] + " - " + volume;

                        toVolumeSelect.appendChild(optionToVolume);

                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des données :', error)); 
            /**
             * GESTION DES FORMULAIRES
             */
            let forms = document.forms;

            for (let form of forms) {
                form.addEventListener('submit', async (event) => {
                    /** Permet de bloquer les actions par défaut des pages web (ex: redirection vers une 
                     *  page lors d'une sélection de lien) 
                     * */
                    event.preventDefault();

                    /** Permet de récuper toutes les pairs de clé (Name d'un input) et sa valeur (la VALUE) */
                    const formData = new FormData(event.target).entries();
                    
                    /** Renvoi un objet JSON avec dans DATA le résultat de la convertion monétaire de la forme :
                     *              - : {toLength: 12.89}
                     */
                    const response = await fetch('/api/post', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(
                            Object.assign(Object.fromEntries(formData), { form: event.target.name })
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
