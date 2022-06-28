<div class="w3-theme w3-card-4 w3-panel w3-padding w3-round-large">
    <fieldset class="w3-panel w3-padding w3-round-large" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Crea account</div>
        </legend>
        <form action="/login" method="post">
            <div class="w3-row">
                <label class="w3-col m4 w3-padding">
                    Nome *
                    <input name="text" type="text" class="w3-input w3-card w3-round-large" required="required">
                </label>
                <label class="w3-col m4 w3-padding">
                    Cognome *
                    <input name="text" type="text" class="w3-input w3-card w3-round-large" required="required">
                </label>
                <label class="w3-col m4 w3-padding">
                    Data di nascita
                    <input name="text" type="date" class="w3-input w3-card w3-round-large">
                </label>
            </div>
            <div class="w3-row">
                <label class="w3-col m9 w3-padding">
                    Email *
                    <input name="email" type="email" class="w3-input w3-card w3-round-large" required="required">
                </label>
                <label class="w3-col m2 w3-padding w3-center">
                    <br>
                    <input type="submit" value="Crea account" class="w3-btn w3-white w3-round-large">
                </label>
            </div>
        </form>
    </fieldset>
</div>