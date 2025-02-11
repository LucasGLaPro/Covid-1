<div class="AllMobs">
    <?php
        $listMob = $map->getAllMobs();
        if(count($listMob) > 0){
            ?>
                <ul id="ulMob" class="Mob">
                    <?php
                        $Mob = new Mob($mabase);
                        // Affichage des Mob Enemis
                        $mobContre = $map->getAllMobContre($Joueur1);
                        if(count($mobContre) > 0){
                            ?>
                                <div class='effect'></div>
                                <p class='pBloqueParMob'>Tu es bloqué, il y a des monstres qui te bloquent le passage...</p>
                            <?php
                        }
                        foreach($mobContre as $MobID){
                            $Mob->setMobById($MobID);
                            ?>
                                <li id="Mob<?= $Mob->getId() ?>" class="adverse">
                                    <a onclick="AttaquerPerso(<?= $Mob->getId() ?>,1, event)">
                                        <?php
                                            $Mob->renderHTML();
                                        ?>
                                    </a>
                                </li>
                            <?php
                        }
                        // Affichage des Mob Capturés
                        foreach($map->getAllMobCapture($Joueur1) as $MobID){
                            $Mob->setMobById($MobID);
                            ?>
                                <li id="Mob<?= $Mob->getId() ?>" class="Captured">
                                    <a onclick="SoinMob(<?= $Mob->getId() ?>,1)">
                                        <?php
                                            $Mob->renderHTML();
                                        ?>
                                    </a>
                                </li>
                            <?php
                        }
                    ?>
                </ul>
            <?php
        }
    ?>
</div>