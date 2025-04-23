<ul class="flexible space-evenly">
    <li class="menu" ><a href="/">Home</a></li>
    <?php if (isset($_SESSION["user"])) : ?>  
    <li class="menu"><a href="bliblio">blibliothèque</a></li> 
    <li class="menu"><a href="profil">Profil</a></li>
    <li class="menu"><a href="deconnexion">déconnexion</a></li>
    <?php else : ?>  
   <li class="menu"><a href="inscription">Inscription</a></li>   
    <li class="menu"><a href="connexion">Connexion</a></li> 
    <li class="imageMenu"><a href="inscription"><ion-icon size="large" name="person-outline"></ion-icon></a></li>
    <li class="imageMenu"> <a href="connexion"><ion-icon size="large" name="enter-outline"></ion-icon></a></li>
    <?php endif ?>                                                       
    <!-- petit écran -->
    <li class="imageMenu"><a href="/"><ion-icon size="large" name="home-outline"></ion-icon></a></li>
    <li class="imageMenu"><a href="bliblio"><ion-icon  size="large"  name="game-controller-outline"></ion-icon>
    <li class="imageMenu"><a href="profil"><ion-icon size="large" name="person-outline"></ion-icon></a></li>
    

 </ul>
</ul>