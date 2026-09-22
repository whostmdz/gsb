<?php

/**
 * Vue Connexion
 *
 * PHP Version 8
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2026 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 * @link      https://getbootstrap.com/docs/5.3/ Documentation Bootstrap v5.3
 */

?>
<div class="row">
    <div class="col-lg-6 offset-lg-3">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="h5 mb-0">Identification utilisateur</h3>
            </div>
            <div class="card-body">
                <form role="form" method="post"
                      action="index.php?uc=connexion&action=valideConnexion">
                    <fieldset>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg class="icon" aria-hidden="true" focusable="false"><use href="./images/icons.svg#user"></use></svg>
                                </span>
                                <input class="form-control" placeholder="Login"
                                       id="login" aria-label="Login" autocomplete="username" name="login" type="text" maxlength="45">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg class="icon" aria-hidden="true" focusable="false"><use href="./images/icons.svg#lock"></use></svg>
                                </span>
                                <input class="form-control"
                                       placeholder="Mot de passe" id="mdp" aria-label="Mot de passe" autocomplete="current-password" name="mdp"
                                       type="password" maxlength="45">
                            </div>
                        </div>
                        <input class="btn btn-lg btn-success w-100"
                               type="submit" value="Se connecter">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
