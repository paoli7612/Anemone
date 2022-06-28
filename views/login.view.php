<?php if (isset($_SESSION['error'])) : ?>
    <div class="w3-red w3-center w3-panel w3-round-large w3-card-4 w3-display-container">
        <i class="fa-solid fa-circle-exclamation"></i>
        <br>
        <?= $_SESSION['error'] ?>
        <button class="w3-display-topright w3-btn w3-round-large w3-small">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <?php session_destroy() ?>
<?php endif ?>
<div class="w3-theme w3-card-4 w3-panel w3-padding w3-round-large">
    <fieldset class="w3-panel w3-padding w3-round-large" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Login</div>
        </legend>
        <form action="/login" method="post">
            <div class="w3-row">
                <label class="w3-col m5 w3-padding">
                    Email
                    <input name="email" type="email" class="w3-input w3-card w3-round-large" required="required" value="paoli7612@gmail.com">
                </label>
                <label class="w3-col m5 w3-padding">
                    Password
                    <input name="password" type="password" class="w3-input w3-card w3-round-large">
                </label>
                <label class="w3-col m2 w3-padding w3-center">
                    <br>
                    <input type="submit" value="Login" class="w3-btn w3-white w3-round-large">
                </label>
            </div>
        </form>
    </fieldset>
</div>