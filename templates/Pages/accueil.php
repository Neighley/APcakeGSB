<?php
    $identity = $this->getRequest()->getAttribute('identity');
    //debug($identity);
?>
<html>
    <h3>Bienvenue sur votre session, <b><?php echo $identity['username'] ?></b> !</h3>
    <p>Vous êtes actuellement sur un compte visiteur.</p>
    <p>Vous pouvez dès à présent accéder aux fiches de frais des visiteurs.</p>
</html>