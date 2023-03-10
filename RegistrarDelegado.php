 <!doctype html>
<html lang="Es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/miestilo.css">
    <script src="js/all.js"></script>
  </head>
  <body class="imagen-fondoD">

<!--MENU-->
<?php include("navbar.php");?>
<!--FIN MENU--> 
    <!--Registro de delegado-->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 p-3 bg-light rounded-2">
      <div class="mt-3 mb-3 text-center">
        <h1>Formulario de Registro para Delegados</h1>
      </div>
  <hr>    
<form action="reg_delegado.php" method="post" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email de la Persona encargada del equipo</label>
    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="example@gmail.com" required="">
  </div>
  <div class="col-md-6">  
    <label for="inputPassword4" class="form-label">Carnet de identidad del Delegado</label>
    <input maxlength="8" minlength="8" type="password" name="ci" class="form-control" pattern="[0-9]+" placeholder="12345678" required="">
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Nombre</label>
    <input type="text" name="nom" class="form-control" placeholder="Fulano Perito" pattern="[a-zA-Z]+" required="">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Apellido Paterno</label>
    <input type="text" name="ap" class="form-control" id="inputAddress2" placeholder="Primer apellido" pattern="[a-zA-Z]+" required="">
  </div>

  <div class="col-6">
    <label for="inputAddress2" class="form-label">Apellido Materno</label>
    <input type="text" name="am" class="form-control" id="inputAddress2" placeholder="Segundo apellido" pattern="[a-zA-Z]+" required="">
  </div>

  <div class="col-md-6">
    <label class="text-base" for="Country" data-bind="text: strings.lblCountryRegion">Pa??s o regi??n</label>
     <select id="Country" class="form-control win-dropdown" name="pais" data-bind="options: countries,
                                        optionsValue: 'iso',
                                        optionsText: 'name',
                                        value: country,
                                        ariaDescribedBy: 'iPageTitle BirthDateCountryDesc',
                                        css: { 'win-dropdown': config.isWin10HostOOBEDesktop !== 0 }" aria-describedby="iPageTitle BirthDateCountryDesc"><option value="AR">Argentina</option><option value="BO">Bolivia</option><option value="BR">Brasil</option><option value="BN">Brun??i</option><option value="CA">Canad??</option><option value="CL">Chile</option><option value="CN">China</option><option value="CY">Chipre</option><<option value="CO">Colombia</option><option value="KR">Corea del Sur</option><option value="CR">Costa Rica</option><option value="CU">Cuba</option><option value="DK">Dinamarca</option><option value="DM">Dominica</option><option value="EC">Ecuador</option><option value="EG">Egipto</option><option value="SV">El Salvador</option><option value="SK">Eslovaquia</option><option value="SI">Eslovenia</option><option value="ES">Espa??a</option><option value="US">Estados Unidos</option><option value="EE"><option value="ET">Etiop??a</option><option value="GT">Guatemala</option><option value="GF">Guayana Francesa</option><option value="GQ">Guinea Ecuatorial</option><option value="HT">Hait??</option><option value="HN">Honduras</option><option value="ID">Indonesia</option><option value="IQ">Irak</option><option value="IR">Ir??n</option><option value="IE">Irlanda</option><option value="AC">Isla Ascensi??n</option><option value="BV">Isla Bouvet</option><option value="IM">Isla de Man</option><option value="CX">Isla de Navidad</option><option value="NF">Isla Norfolk</option><option value="IS">Islandia</option><option value="AX">Islas ??land</option><option value="KY">Islas Caim??n</option><option value="CC">Islas Cocos</option><option value="CK">Islas Cook</option><option value="FO">Islas Feroe</option><option value="HM">Islas Heard y McDonald</option><option value="FK">Islas Malvinas</option><option value="MP">Islas Marianas del Norte</option><option value="MH">Islas Marshall</option><option value="UM">Islas menores alejadas de los EE. UU.</option><option value="PN">Islas Pitcairn</option><option value="SB">Islas Salom??n</option><option value="TC">Islas Turcas y Caicos</option><option value="VG">Islas V??rgenes Brit??nicas</option><option value="VI">Islas V??rgenes de los Estados Unidos</option><option value="IL">Israel</option><option value="IT">Italia</option><option value="JM">Jamaica</option><option value="XJ">Jan Mayen</option><option value="JP">Jap??n</option><option value="JE">Jersey</option><option value="JO">Jordania</option><option value="KZ">Kazajist??n</option><option value="KE">Kenia</option><option value="KG">Kirguist??n</option><option value="KI">Kiribati</option><option value="XK">Kosovo</option><option value="KW">Kuwait</option><option value="LA">Laos</option><option value="BS">Las Bahamas</option><option value="LS">Lesoto</option><option value="LV">Letonia</option><option value="LB">L??bano</option><option value="LR">Liberia</option><option value="LY">Libia</option><option value="LI">Liechtenstein</option><option value="LT">Lituania</option><option value="LU">Luxemburgo</option><option value="MO">Macao RAE</option><option value="MK">Macedonia del Norte</option><option value="MG">Madagascar</option><option value="MY">Malasia</option><option value="MW">Malawi</option><option value="MV">Maldivas</option><option value="ML">Mal??</option><option value="MT">Malta</option><option value="MA">Marruecos</option><option value="MQ">Martinica</option><option value="MU">Mauricio</option><option value="MR">Mauritania</option><option value="YT">Mayotte</option><option value="MX">M??xico</option><option value="FM">Micronesia</option><option value="MD">Moldova</option><option value="MC">M??naco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NI">Nicaragua</option><option value="NE">N??ger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NO">Noruega</option><option value="NC">Nueva Caledonia</option><option value="NZ">Nueva Zelanda</option><option value="OM">Om??n</option><option value="NL">Pa??ses Bajos</option><option value="PK">Pakist??n</option><option value="PW">Palaos</option><option value="PA">Panam??</option><option value="PG">Pap??a Nueva Guinea</option><option value="PY">Paraguay</option><option value="PE">Per??</option><option value="PF">Polinesia Francesa</option><option value="PL">Polonia</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="BH">Reino de Bar??in</option><option value="UK">Reino Unido</option><option value="CF">Rep??blica Centroafricana</option><option value="CG">Rep??blica del Congo</option><option value="DO">Rep??blica Dominicana</option><option value="RE">Reuni??n</option><option value="RW">Ruanda</option><option value="RO">Ruman??a</option><option value="RU">Rusia</option><option value="XS">Saba</option><option value="WS">Samoa</option><option value="AS">Samoa Americana</option><option value="BL">San Bartolom??</option><option value="KN">San Crist??bal y Nieves</option><option value="XE">San Eustaquio</option><option value="SM">San Marino</option><option value="MF">San Mart??n</option><option value="PM">San Pedro y Miquel??n</option><option value="VC">San Vicente y las Granadinas</option><option value="SH">Santa Elena, Ascensi??n y Trist??n da Cunha</option><option value="LC">Santa Luc??a</option><option value="ST">Santo Tom?? y Pr??ncipe</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leona</option><option value="SG">Singapur</option><option value="SX">Sint Maarten</option><option value="SY">Siria</option><option value="SO">Somalia</option><option value="LK">Sri Lanka</option><option value="SZ">Suazilandia</option><option value="ZA">Sud??frica</option><option value="SD">Sud??n</option><option value="SS">Sud??n del Sur</option><option value="SE">Suecia</option><option value="CH">Suiza</option><option value="SR">Surinam</option><option value="SJ">Svalbard</option><option value="TH">Tailandia</option><option value="TW">Taiw??n</option><option value="TZ">Tanzania</option><option value="TJ">Tayikist??n</option><option value="IO">Territorio Brit??nico del Oc??ano ??ndico</option><option value="TF">Territorios Australes Franceses</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad y Tobago</option><option value="TA">Trist??n da Cunha</option><option value="TN">T??nez</option><option value="TM">Turkmenist??n</option><option value="TR">Turqu??a</option><option value="TV">Tuvalu</option><option value="UA">Ucrania</option><option value="UG">Uganda</option><option value="UY">Uruguay</option><option value="UZ">Uzbekist??n</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis y Futuna</option><option value="YE">Yemen</option><option value="DJ">Yibuti</option><option value="ZM">Zambia</option><option value="ZW">Zimbabue</option>
                            </select>
  </div>

<div class="col-md-6">
    <label for="inputCity" class="form-label">Celular</label>
    <input type="text" maxlength="20" minlength="8" name="cel" class="form-control" id="inputCity" placeholder="Numero telefonico" required="">
  </div>

  <div class="col-md-6">
    <input type="hidden" name="pago" class="form-control" id="inputCity" >
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Ciudad</label>
    <input type="text" name="ciudad" class="form-control" id="inputCity" placeholder="Cochabamba" pattern="[a-zA-Z]+" required="">
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Provincia</label>
    <input type="text" name="provincia" class="form-control" id="inputCity" placeholder="Cochabamba" pattern="[a-zA-Z]+" required="">
  </div>
 
  <div class="borde1 p-5 text-white col-md-7 mt-4">
    <button type="submit" class="btn btn-primary">Enviar</button>
  </div>

  <div class="col-5">
    <img src="images/qrcodeClassroom.png" alt="codigoqr" width="40%" class="img-fluid">
  </div>

</form>
</div>

    <!--Lista Fin-->
  </div>
</div> 
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>