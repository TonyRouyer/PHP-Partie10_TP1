<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>partie 10 TP 1</title>
    </head>
    <body>
        <?php
            //si toute les variable ne sont pas vide et corespondent au regex, on les affiche
            if (!empty($_POST['lastname']) && preg_match("/^[a-zA-Z ,.'-]+$/", $_POST['lastname']) &&
                !empty($_POST['firstname']) && preg_match('/^[a-zA-Z]+$/', $_POST['firstname']) &&
                !empty($_POST['birthDate']) && preg_match('/^(19[0-9][0-9]|200[0-9]|2010)-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]$)/', $_POST['birthDate']) &&
                isset($_POST['birthCountry']) &&
                isset($_POST['nationality']) &&
                !empty($_POST['adress']) && preg_match("/^[0-9]{1,2}(bis|ter|quater)? (rue|avenue|allee|impasse) [a-zA-Z'-. ]+$/", $_POST['adress']) &&
                !empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == $_POST['email'] && 
                !empty($_POST['phone']) && preg_match("/^(0|\+33)\s?[1-9]\s?([\s.-]?[0-9]{2}){4}/", $_POST['phone']) &&
                isset($_POST['diplome']) &&
                !empty($_POST['poleEmploiCode']) && preg_match("/^[0-9]{7}[a-zA-Z0-9]$/", $_POST['poleEmploiCode']) &&
                !empty($_POST['badgeNumber']) && preg_match("/^[1-9][0-9]*$/", $_POST['badgeNumber']) &&
                !empty($_POST['codeAcademyLink']) && preg_match("/(((http|https):\/\/)?(www.))?codecademy.com\/profiles\/net[0-9]{10}/", $_POST['codeAcademyLink']) &&
                isset($_POST['heroQuestion']) &&
                isset($_POST['hackInfo']) &&
                !empty($_POST['experience']) )  
                { ?>
                    <p>Nom : <?= $_POST['lastname'] ?></p>
                    <p>Prenom : <?= $_POST['firstname'] ?></p>
                    <p>Date d'anniversaire : <?= $_POST['birthDate'] ?></p>
                    <p>Payq de naissance : <?= $_POST['birthCountry'] ?></p>
                    <p>Nationalité : <?= $_POST['nationality'] ?></p>
                    <p>Adresse : <?= $_POST['adress'] ?></p>
                    <p>E-mail : <?= $_POST['email'] ?></p>
                    <p>Numéro de tel : <?= $_POST['phone'] ?></p>
                    <p>Diplôme : <?= $_POST['diplome'] ?></p>
                    <p>Id pôle emplois : <?= $_POST['poleEmploiCode'] ?></p>
                    <p>Nombre de badge Codecademy<?= $_POST['badgeNumber'] ?></p>
                    <p>Lien Codeacademy<?= $_POST['codeAcademyLink'] ?></p>
                    <p>Si vous etiez un super-hero ? <?= $_POST['heroQuestion'] ?></p>
                    <p>Avez vous deja réaliser des "hack" ? <?= $_POST['hackInfo'] ?></p>
                    <p>Avez vous une expérience en programation informatique ? <?= $_POST['experience'] ?></p>
                <?php } else {  //sinon on affiche le formulaire?>
                    <form action="index.php" method="POST">
                        <label for="lastname">Nom :</label>
                        <input type="text" id="lastname" name="lastname">
                        <?php
                        if (!empty($_POST['lastname'])){
                            if (preg_match("#^[a-zA-ZÀ-ÿ'\- ]{2,25}$#", $_POST['lastname'])){}
                            else{
                                ?><p class="invalid"><?= 'Nom invalide' ?></p><?php
                            }
                        }
                        elseif (isset($_POST['lastname'])){
                            ?><p class="invalid"><?= 'Veuillez renseigner votre nom (obligatoire)' ?></p><?php
                        }?>

                        <label for="firstname">Prénom :</label>
                        <input type="text" id="firstname" name="firstname">
                        <?php
                        if (!empty($_POST['firstname'])){
                            if (preg_match("/^[a-zA-Z]+$/", $_POST['firstname'])){}
                            else{
                                ?><p class="invalid"><?= 'Prenom invalide' ?></p><?php
                            }
                        }
                        elseif (isset($_POST['firstname'])){
                            ?><p class="invalid"><?= 'Veuillez renseigner votre prenom (obligatoire)' ?></p><?php
                        }?>
                    

                        <label for="birthDate">Date de naissance :</label>
                        <input type="date" id="birthDate" name="birthDate">
                        <?php
                        if (!empty($_POST['birthDate'])){
                            if (preg_match("/^(19[0-9][0-9]|200[0-9]|2010)-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]$)/", $_POST['birthDate'])){}
                            else{
                                ?><p class="invalid"><?= 'Veuillez sélectioner une date entre 1900 et 2010' ?></p><?php
                            }
                        }
                        elseif (isset($_POST['birthDate'])){
                            ?><p class="invalid"><?= 'Veuillez renseigner une date (obligatoire)' ?></p><?php
                        }?>
                        

                        <label for="birthCountry">Pays de naissance:</label>
                            <select name="birthCountry" id="birthCountry">
                                <option value="france">France</option>
                                <option value="angleterre">Angleterre</option>
                                <option value="belgique">Belgique</option>
                                <option value="espagne">Espagne</option>
                                <option value="italie">Italie</option>
                                <option value="suisse">Suisse</option>
                            </select>
                        <?php
                        if (!empty($_POST['birthCountry'])){
                            if (isset($_POST['birthCountry'])){}
                            else{
                                ?><p class="invalid"><?= 'Veuillez sélectioner un pays' ?></p><?php
                            }
                        } ?>

                        <label for="nationality">Nationalité:</label>
                            <select name="nationality" id="nationality">
                                <option value="UK">UK</option>
                                <option value="BE">BE</option>
                                <option value="ES">ES</option>
                                <option value="FR">FR</option>
                                <option value="IT">IT</option>
                                <option value="CH">CH</option>
                            </select>
                        <?php
                        if (!empty($_POST['nationality'])){
                            if (isset($_POST['nationality'])){}
                            else{
                                ?><p class="invalid"><?= 'Veuillez sélectioner un champs' ?></p><?php
                            }
                        } ?>

                        <label for="adress">Adresse :</label>
                        <input type="text" id="adress" name="adress">
                        <?php
                        if (!empty($_POST['adress'])){
                            if (preg_match("/^[0-9]{1,2}(bis|ter|quater)? (rue|avenue|allee|impasse) [a-zA-Z'-. ]+$/", $_POST['adress'])){}
                            else{
                                ?><p class="invalid"><?= 'Adresse invalide, respecter le format : 00 rue exemple' ?></p><?php
                            }
                        }
                        elseif (isset($_POST['adress'])){
                            ?><p class="invalid"><?= 'Veuillez renseigner une adresse (obligatoire)' ?></p><?php
                        }?>

                        <label for="email">Email :</label>
                        <input type="mail" id="email" name="email">
                        <?php
                        if (!empty($_POST['email'])){
                            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == $_POST['email']){}
                            else{
                                ?><p class="invalid"><?= 'Adresse email invalide' ?></p><?php
                            }
                        }
                        elseif (isset($_POST['email'])){
                            ?><p class="invalid"><?= 'Veuillez renseigner une adresse  email (obligatoire)' ?></p><?php
                        }?>

                        <label for="phone">Téléphone :</label>
                        <input type="tel" id="phone" name="phone">
                        <?php
                        if (!empty($_POST['phone'])){
                            if (preg_match("/^(0|\+33)\s?[1-9]\s?([\s.-]?[0-9]{2}){4}/", $_POST['phone'])){}
                            else{
                                ?><p class="invalid"><?= 'Numéro de téléphone invalide' ?></p><?php
                            }
                        }
                        elseif (isset($_POST['phone'])){
                            ?><p class="invalid"><?= 'Veuillez renseigner un numéro de telephone (obligatoire)' ?></p><?php
                        }?>

                        <label for="diplome">Diplôme:</label>
                            <select name="diplome" id="diplome">
                                <option value="no">non</option>
                                <option value="bac">Bac</option>
                                <option value="bac+2">Bac+2</option>
                                <option value="bac+3">Bac+3</option>
                                <option value="master">Master</option>
                                <option value="sup">Supérieur</option>
                            </select>
                            <?php
                            if (!empty($_POST['diplome'])){
                                if (isset($_POST['diplome'])){}
                                else{
                                    ?><p class="invalid"><?= 'Veuillez sélectioner un champs' ?></p><?php
                                }
                            } ?>

                            <label for="poleEmploiCode">Numéro pôle emplois :</label>
                            <input type="text" id="poleEmploiCode" name="poleEmploiCode"> 
                            <?php
                            if (!empty($_POST['poleEmploiCode'])){
                                if (preg_match("/^[0-9]{7}[a-zA-Z0-9]$/", $_POST['poleEmploiCode'])){}
                                else{
                                    ?><p class="invalid"><?= 'Numéro pole emploi incorrecte, 8 chiffres ou 7 chiffres et 1 lettre' ?></p><?php
                                }
                            }
                            elseif (isset($_POST['poleEmploiCode'])){
                                ?><p class="invalid"><?= 'Veuillez renseigner votre identifiant pôle emplois (obligatoire)' ?></p><?php
                            }?>

                            <label for="badgeNumber">Nombre de badge CodeAcademy :</label>
                            <input type="number" id="badgeNumber" name="badgeNumber">
                            <?php
                            if (!empty($_POST['badgeNumber'])){
                                if (preg_match("/^[1-9][0-9]*$/", $_POST['badgeNumber'])){}
                                else{
                                    ?><p class="invalid"><?= 'Vous ne pouvez avoir que entre 0 et l\'infini badges' ?></p><?php
                                }
                            }
                            elseif (isset($_POST['badgeNumber'])){
                                ?><p class="invalid"><?= 'Veuillez renseigner ce champs (obligatoire)' ?></p><?php
                            }?>

                            <label for="codeAcademyLink">Lien CodeAcademy :</label>
                            <input type="text" id="codeAcademyLink" name="codeAcademyLink">
                            <?php
                            if (!empty($_POST['codeAcademyLink'])){
                                if (preg_match("/(((http|https):\/\/)?(www.))?codecademy.com\/profiles\/net[0-9]{10}/", $_POST['codeAcademyLink'])){}
                                else{
                                    ?><p class="invalid"><?= 'veuillez renseignier le lien de votre profil CodeAcademy' ?></p><?php
                                }
                            }
                            elseif (isset($_POST['codeAcademyLink'])){
                                ?><p class="invalid"><?= 'Veuillez renseigner ce champs (obligatoire)' ?></p><?php
                            }?>

                            <label for="heroQuestion">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi ?</label>
                            <textarea name="heroQuestion" id="heroQuestion" cols="30" rows="10"></textarea>
                            <?php
                            if (!empty($_POST['heroQuestion'])){
                                if (isset($_POST['heroQuestion'])){}
                                else{
                                    ?><p class="invalid"><?= 'Veuillez sélectioner un champs' ?></p><?php
                                }
                            } ?>

                            <label for="hackInfo">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique) :</label>
                            <textarea name="hackInfo" id="hackInfo" cols="30" rows="10"></textarea>
                            <?php
                            if (!empty($_POST['hackInfo'])){
                                if (isset($_POST['hackInfo'])){}
                                else{
                                    ?><p class="invalid"><?= 'Veuillez sélectioner un champs' ?></p><?php
                                }
                            } ?>

                            <p>Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?</p>
                            <div class="radioInput">
                                <input type="radio" id="experience" name="experience" value="Oui">
                                <label for="experience">Oui</label>
                                <input type="radio" id="experience" name="experience" value="Non">
                                <label for="experience">Non</label>
                            </div>
                            <?php
                            if (!empty($_POST['experience'])){
                                if (isset($_POST['experience']) && ($_POST['experience'] == 'Oui' || $_POST['experience'] == 'Non')){}
                                else{
                                    ?><p class="invalid"><?= 'Oui ou non' ?></p><?php
                                }
                            }
                            elseif (isset($_POST['experience'])){
                                ?><p class="invalid"><?= 'Veuillez renseigner ce champs (obligatoire)' ?></p><?php
                            }?>

                            <input type="submit" value="Envoyer" id="sendBtn">
                        </form> 
                <?php } ?>
    </body>
</html>