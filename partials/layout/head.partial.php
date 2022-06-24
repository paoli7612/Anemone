<?php

use App\App;
use App\core\Request;

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Gestore gratuito locale e delivery">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" content="Gestore gratuido locali e delivery">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link id="theme_link" rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-<?= App::theme() ?>.css">
    <title>Anemone - <?= Request::name() ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-image: url('/back.png');
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="/favicon.ico">


    <link rel="preload" as="script" href="https://cdn.iubenda.com/cs/iubenda_cs.js" />
    <link rel="preload" as="script" href="https://cdn.iubenda.com/cs/tcf/stub-v2.js" />
    <script src="https://cdn.iubenda.com/cs/tcf/stub-v2.js"></script>
    <script>
        (_iub = self._iub || []).csConfiguration = {
            cookiePolicyId: 13166603,
            siteId: 2707190,
            localConsentDomain: 'anemone.altervista.org',
            timeoutLoadConfiguration: 30000,
            lang: 'it',
            enableTcf: true,
            tcfVersion: 2,
            tcfPurposes: {
                "2": "consent_only",
                "3": "consent_only",
                "4": "consent_only",
                "5": "consent_only",
                "6": "consent_only",
                "7": "consent_only",
                "8": "consent_only",
                "9": "consent_only",
                "10": "consent_only"
            },
            invalidateConsentWithoutLog: true,
            googleAdditionalConsentMode: true,
            consentOnContinuedBrowsing: false,
            banner: {
                position: "top",
                acceptButtonDisplay: true,
                customizeButtonDisplay: true,
                closeButtonDisplay: true,
                closeButtonRejects: true,
                fontSizeBody: "14px",
            },
        }
    </script>
    <!--<script async src="https://cdn.iubenda.com/cs/iubenda_cs.js"></script>-->

</head>