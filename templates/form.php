<form method="post">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($_SESSION['nom'] ?? '') ?>">
    <?php if (!empty($erreurs['nom'])): ?><div class="erreur"><?= $erreurs['nom'] ?></div><?php endif; ?>

    <label for="email">Email :</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($_SESSION['email'] ?? '') ?>">
    <?php if (!empty($erreurs['email'])): ?><div class="erreur"><?= $erreurs['email'] ?></div><?php endif; ?>

    <label for="age">Âge :</label>
    <input type="number" name="age" id="age" value="<?= htmlspecialchars($_SESSION['age'] ?? '') ?>">
    <?php if (!empty($erreurs['age'])): ?><div class="erreur"><?= $erreurs['age'] ?></div><?php endif; ?>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password">
    <?php if (!empty($erreurs['password'])): ?><div class="erreur"><?= $erreurs['password'] ?></div><?php endif; ?>

    <label for="website">Site web :</label>
    <input type="text" name="website" id="website" value="<?= htmlspecialchars($_SESSION['website'] ?? '') ?>">
    <?php if (!empty($erreurs['website'])): ?><div class="erreur"><?= $erreurs['website'] ?></div><?php endif; ?>


    <input type="submit" value="Envoyer">
</form>