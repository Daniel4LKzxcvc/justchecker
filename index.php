<!DOCTYPE html>
<html class="loading">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="SK Based Rate Limit Bypass">
    <meta name="keywords" content="Stripe Key, Credit Card, Checker, SK, CC, Bin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- /.-.. .. - - .-.. . ..-. --- -..-/ -->
    <title>Just Checker 「 SK BASED 」</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <!-- /.-.. .. - - .-.. . ..-. --- -..-/ -->   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <style>
        @media (max-width: 767px) {
            .hidden-mobile {
                display: none;
            }
        }
        footer {
            text-align: center;
            padding: 3px;
            background-image: linear-gradient(to right, #00fbff, #00fbff);
            color: #000000;
    </style>
</head>

<body class="vertical-layout" data-color="bg-gradient-x-blue-cyan">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before mb-3">
            </div> <!-- /.-.. .. - - .-.. . ..-. --- -..-/ -->
            <div class="content-body">
                <div class="mt-2"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="mb-2"><strong>Just Checker </strong>✨</h4>
                                <!-- /.-.. .. - - .-.. . ..-. --- -..-/ -->
                                <textarea rows="9" class="form-control text-center form-checker" style="margin-bottom: 13px;" placeholder="PASTE YOUR CARDS  "></textarea>
                                <textarea rows="1" class="form-control text-center" style="width: 70%; float: left; margin-bottom: 13px;" id="sec" placeholder="sk_live_xxxxxx"></textarea>
                                <textarea rows="1" class="form-control text-center" style="width: 30%; display: inline-block;" id="unm" placeholder="name (optional)"></textarea>
                                <select name="gate" id="gate" class="form-control" style="margin-bottom: 13px; width: 70%; float: left;">
                                    <option style="background:white;color:black" value="gate/usd1ccn.php">CCN CHARGE: $1</option>
                                    <option style="background:white;color:black" value="gate/usd1cvv.php">CVV CHARGE: $1</option>
                                    <option style="background:white;color:black" value="gate/eur1ccn.php">CCN CHARGE: €1</option>
                                    <option style="background:white;color:black" value="gate/eur1cvv.php">CVV CHARGE: €1</option>
                                </select>
                                <textarea rows="1" class="form-control text-center" style="width: 30%; float: right;" id="cst" placeholder="amount (optional)"></textarea>
                                <!-- /.-.. .. - - .-.. . ..-. --- -..-/ -->
                                <textarea rows="1" class="form-control text-center" style="float: right; margin-bottom: 13px;" id="idd" placeholder="telegram_id (optional)"></textarea>

                                <button class="btn btn-play btn-glow btn-bg-gradient-x-blue-cyan text-white" style="width: 49%; float: left;"><i class="fa fa-play"></i> START</button>
                                <button class="btn btn-stop btn-glow btn-bg-gradient-x-red-pink text-white" style="width: 49%; float: right;" disabled><i class="fa fa-stop"></i> STOP</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.-.. .. - - .-.. . ..-. --- -..-/ -->
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <button class="btn btn-glow btn-bg-gradient-x-blue-cyan text-white" onclick="window.open('https://t.me/foxcheckerbot','_blank')" style="width: 100%;">START THE BOT</button>
                                <hr>
                                <h5>TOTAL :<span class="badge badge-primary float-right carregadas">0</span></h5>
                                <hr>
                                <h5>CHARGED :<span class="badge badge-success float-right charge">0</span></h5>
                                <hr>
                                <h5>CVV :<span class="badge badge-success float-right cvvs">0</span></h5>
                                <hr>
                                <h5>CCN :<span class="badge badge-success float-right aprovadas">0</span></h5>
                                <hr>
                                <h5>DEAD :<span class="badge badge-danger float-right reprovadas">0</span></h5>

                            </div>
                        </div>

                        <div class="card mb-2 hidden-mobile">
                            <div class="card-body">

                                <h4 class="text-center"><strong>Tools</strong></h4>
                                <hr>
                                <h5>NAMSO GEN :<span class="badge badge-primary float-right btn-bg-gradient-x-cyan btn-primary"><a href="https://namso-gen.com/" target="_blank">CLICK</a></span></h5>
                                <!--
                                <hr>
                                <h5>CHECK SK :<span class="badge badge-primary float-right btn-bg-gradient-x-blue-cyan btn-primary"><a href="#">SOON...</a></span></h5>
                                <hr>
                                <h5>FOUND BUG ?<span class="badge badge-primary float-right btn-bg-gradient-x-blue-cyan btn-primary"><a href="https://t.me/adtitas" target="_blank">CONTACT</a></span></h5> -->

                            </div>
                        </div>
                    </div>
                    <!-- /.-.. .. - - .-.. . ..-. --- -..-/ -->
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                    <button type="show" class="btn btn-primary btn-sm show-charge"><i class="fa fa-eye-slash"></i></button>
                                    <button class="btn btn-success btn-sm btn-copy1"><i class="fa fa-copy"></i></button>
                                </div>
                                <h4 class="card-title mb-1"><i class="fa fa-check-circle text-success"></i> CHARGED</h4>
                                <div id='lista_charge'></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                    <button type="show" class="btn btn-primary btn-sm show-live"><i class="fa fa-eye-slash"></i></button>
                                    <button class="btn btn-success btn-sm btn-copy2"><i class="fa fa-copy"></i></button>
                                </div>
                                <h4 class="card-title mb-1"><i class="fa fa-check text-success"></i> CVV</h4>
                                <div id='lista_cvvs'></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                    <button type="show" class="btn btn-primary btn-sm show-lives"><i class="fa fa-eye-slash"></i></button>
                                    <button class="btn btn-success btn-sm btn-copy"><i class="fa fa-copy"></i></button>
                                </div>
                                <h4 class="card-title mb-1"><i class="fa fa-times text-success"></i> CCN</h4>
                                <div id='lista_aprovadas'></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                    <button type='hidden' class="btn btn-primary btn-sm show-dies"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-danger btn-sm btn-trash"><i class="fa fa-trash"></i></button>
                                </div>
                                <h4 class="card-title mb-1"><i class="fa fa-times text-danger"></i> DECLINED</h4>
                                <div style='display: none;' id='lista_reprovadas'></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script src="theme-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
        <!-- /.-.. .. - - .-.. . ..-. --- -..-/ -->
        <footer>
            <p>[V1.5] JUSTIDK 2023.</p>
        </footer>

<script>
$(document).ready(function() {

    Swal.fire({
        title: "When the checker stop just reload the website!",
        html: "Join @justcom for more updates",
        icon: "warning",
        confirmButtonText: "Yes, I'll",
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-primary',
        customClass: {
            popup: 'dark-background',
            title: 'white-title',
            content: 'white-text'
        }
    }); /*.-.. .. - - .-.. . ..-. --- -..-*/

    $('.show-charge').click(function() {
        var type = $('.show-charge').attr('type');
        $('#lista_charge').slideToggle();
        if (type == 'show') {
            $('.show-charge').html('<i class="fa fa-eye"></i>');
            $('.show-charge').attr('type', 'hidden');
        } else {
            $('.show-charge').html('<i class="fa fa-eye-slash"></i>');
            $('.show-charge').attr('type', 'show');
        }
    });

    $('.show-live').click(function() {
        var type = $('.show-live').attr('type');
        $('#lista_cvvs').slideToggle();
        if (type == 'show') {
            $('.show-live').html('<i class="fa fa-eye"></i>');
            $('.show-live').attr('type', 'hidden');
        } else {
            $('.show-live').html('<i class="fa fa-eye-slash"></i>');
            $('.show-live').attr('type', 'show');
        }
    }); /*.-.. .. - - .-.. . ..-. --- -..-*/

    $('.show-lives').click(function() {
        var type = $('.show-lives').attr('type');
        $('#lista_aprovadas').slideToggle();
        if (type == 'show') {
            $('.show-lives').html('<i class="fa fa-eye"></i>');
            $('.show-lives').attr('type', 'hidden');
        } else {
            $('.show-lives').html('<i class="fa fa-eye-slash"></i>');
            $('.show-lives').attr('type', 'show');
        }
    });

    $('.show-dies').click(function() {
        var type = $('.show-dies').attr('type');
        $('#lista_reprovadas').slideToggle();
        if (type == 'show') {
            $('.show-dies').html('<i class="fa fa-eye"></i>');
            $('.show-dies').attr('type', 'hidden');
        } else {
            $('.show-dies').html('<i class="fa fa-eye-slash"></i>');
            $('.show-dies').attr('type', 'show');
        }
    });

    $('.btn-trash').click(function() {
        Swal.fire({
            title: 'Removed Dead',
            icon: 'success',
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            timer: 3000
        });
        $('#lista_reprovadas').text('');
    }); /*.-.. .. - - .-.. . ..-. --- -..-*/

    $('.btn-copy1').click(function() {
        Swal.fire({
            title: 'Copied Charged',
            icon: 'success',
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            timer: 3000
        });
        var lista_charge = document.getElementById('lista_charge').innerText;
        var textarea = document.createElement("textarea");
        textarea.value = lista_charge;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
    });

    $('.btn-copy2').click(function() {
        Swal.fire({
            title: 'Copied CVV',
            icon: 'success',
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            timer: 3000
        });
        var lista_live = document.getElementById('lista_cvvs').innerText;
        var textarea = document.createElement("textarea");
        textarea.value = lista_live;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
    });

    $('.btn-copy').click(function() {
        Swal.fire({
            title: 'Copied CCN',
            icon: 'success',
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            timer: 3000
        });
        var lista_lives = document.getElementById('lista_aprovadas').innerText;
        var textarea = document.createElement("textarea");
        textarea.value = lista_lives;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
    });

    $('.btn-play').click(function() {
        var sec = $("#sec").val();
        var unm = $("#unm").val();
        var cst = $("#cst").val();
        var idd = $("#idd").val();
        var e = document.getElementById("gate");
        var gate = e.options[e.selectedIndex].value;
        var lista = $('.form-checker').val().trim();
        var array = lista.split('\n');
        var charge = 0,
            live = 0,
            lives = 0,
            dies = 0,
            testadas = 0,
            txt = ''; /*.-.. .. - - .-.. . ..-. --- -..-*/

        if (!lista) {
            Swal.fire({
                title: 'Add CC!',
                icon: 'error',
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
                timer: 3000
            });
            return false;
        }
        if (!sec) {
            Swal.fire({
                title: 'Put SK!',
                icon: 'error',
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
                timer: 3000
            });
            return false;
        }

        Swal.fire({
            title: 'Proccessing!',
            icon: 'success',
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            timer: 3000
        });  /*.-.. .. - - .-.. . ..-. --- -..-*/

        var line = array.filter(function(value) {
            if (value.trim() !== "") {
                txt += value.trim() + '\n';
                return value.trim();
            }
        });

        var total = line.length;

        $('.form-checker').val(txt.trim());

        if (total > 10000) {
            Swal.fire({
                title: 'Reduce number of cards to <10K',
                icon: 'warning',
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
                timer: 3000
            });
            return false;
        }
        /*.-.. .. - - .-.. . ..-. --- -..-*/
        $('.carregadas').text(total);
        $('.btn-play').attr('disabled', true);
        $('.btn-stop').attr('disabled', false);

        line.forEach(function(data) {
            var callBack = $.ajax({
                url: gate + '?lista=' + data + '&sec=' + sec + '&cst=' + cst + '&unm=' + unm + '&idd=' + idd,
                success: function(retorno) {
                    if (retorno.indexOf("#CHARGED") >= 0) {
                        $('#lista_charge').append(retorno);
                        removelinha();
                        charge = charge + 1;
                    } else if (retorno.indexOf("#CVV") >= 0) {
                        $('#lista_cvvs').append(retorno);
                        removelinha();
                        live = live + 1;
                    } else if (retorno.indexOf("#CCN") >= 0) {
                        $('#lista_aprovadas').append(retorno);
                        removelinha();
                        lives = lives + 1;
                    } else {
                        $('#lista_reprovadas').append(retorno);
                        removelinha();
                        dies = dies + 1;
                    }
                    testadas = charge + live + lives + dies;
                    $('.charge').text(charge);
                    $('.cvvs').text(live);
                    $('.aprovadas').text(lives);
                    $('.reprovadas').text(dies);
                    $('.testadas').text(testadas);

                    if (testadas == total) {
                        Swal.fire({
                            title: 'All cards has been checked',
                            icon: 'success',
                            showConfirmButton: false,
                            toast: true,
                            position: 'top-end',
                            timer: 3000
                        });
                        $('.btn-play').attr('disabled', false);
                        $('.btn-stop').attr('disabled', true);
                    }
                }
            }); /*.-.. .. - - .-.. . ..-. --- -..-*/
            $('.btn-stop').click(function() {
                Swal.fire({
                    title: 'Paused',
                    icon: 'warning',
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end',
                    timer: 3000
                });
                $('.btn-play').attr('disabled', false);
                $('.btn-stop').attr('disabled', true);
                callBack.abort();
                return false;
            });
        });
    });
});
/*.-.. .. - - .-.. . ..-. --- -..-*/
function removelinha() {
    var lines = $('.form-checker').val().split('\n');
    lines.splice(0, 1);
    $('.form-checker').val(lines.join("\n"));
}
</script>
</body>
</html>