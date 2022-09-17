# WebreatheTest
Site web de monitoring de modules IOT. 

# Install
    Etape 1: SGBD
        Ouvrez le fichier WebreatheText.php
        Définissez le nom d'hôte et le mot de passe de votre SGBD.
        La base de données sera créer automatiquement si les informations sont correcte.

        ex: 
            define("DATABASE_HOST", "localhost");
            define("DATABASE_PASSWORD", "root");
            define("DATABASE_USERNAME", "root");

    Etape 2: 
        Url du site:

        Assurez vous que le nom du dossier contenant les fichiers du site sont bien définie comme si desous.
        define("SITE_DIRECTORY_NAME", "WebreatheTest");

        Définissez l'url de base du site web.
        ex:
            define("SITE_URL", "/webreathetest");

            Laissez comme tel, si vous etes en local, sous localhost.
