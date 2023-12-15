<?php
    $identity = $this->getRequest()->getAttribute('identity');
    //debug($identity);
?>
<html>
    <h3>Bienvenue sur votre session, <b><?php echo $identity['username'] ?></b> !</h3>
    <p>Vous êtes actuellement sur un compte <b><?php echo $identity['role_id'] ?></b>.</p>
    <p>Vous pouvez dès à présent accéder à vos fiches de frais.</p>
</html>