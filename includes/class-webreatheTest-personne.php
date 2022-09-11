<?php
namespace WebreatheTest\app;

use WebreatheTest\WebreatheTestError as IError;

/**
 * Description d'une personne.
 * @author Nahim SALAMI <nahim.salami@outlook.fr>
 * @since 1.0.0
 */
abstract class WebreatheTestPersonne
{
    /**
     * Nom de la personne.
     *
     * @var string
     */
    private $nom;

    /**
     * Prenom de la personne.
     *
     * @var string
     */
    private $prenom;

    /**
     * Adresse de la personne.
     *
     * @var string
     */
    private $adresse;
    
    /**
     * E-mail de la personne.
     *
     * @var string
     */
    private $mail;

    /**
     * Téléphone de la personne.
     *
     * @var string
     */
    private $tel;

    /**
     * Date de naissance de la personne.
     *
     * @var string
     */
    private $dateDeNaissance;


    /**
     * L'id du compte de la personne.
     *
     * @var string
     */
    private $comptId;


    public function __construct($nom = 'client', $prenom = 'client', $comptId = 0)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setComptId($comptId);
    }

    /**
     * Récupère le nom de la personne.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Récupère le prénom de la personne.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Récupère l'adresse de la personne.
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Récupère l'adresse mail de la personne.
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Récupère le numero de teléphone de la personne.
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Récupère la date de naissance de la personne.
     *
     * @return string
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }


    /**
     * Récupère l'id du compte de la personne.
     *
     * @return string
     */
    public function getCompteID()
    {
        return $this->comptId;
    }

    /**
     * Défini le nom de la personne.
     *
     * @param string $nom
     * @return bool
     */
    public function setNom($nom)
    {
        if (self::verifyString($nom, 25)) {
            $this->nom = filter_var($nom);
            return true;
        }
        return false;
    }

    /**
     * Défini le prenom de la personne.
     *
     * @param string $prenom
     * @return bool
     */
    public function setPrenom($prenom)
    {
        if (self::verifyString($prenom, 25)) {
            $this->prenom = filter_var($prenom);
            return true;
        }
        return false;
    }

    /**
     * Défini le adresse de la personne.
     *
     * @param string $adresse
     * @return bool
     */
    public function setAdresse($adresse)
    {
        if (self::verifyString($adresse, 65)) {
            $this->adresse = filter_var($adresse);
            return true;
        }
        return false;
    }

    /**
     * Défini le mail de la personne.
     *
     * @param string $mail
     * @return bool
     */
    public function setMail($mail)
    {
        if (self::verifyString($mail, 65) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $this->mail = filter_var($mail);
            return true;
        }
        return false;
    }

    /**
     * Défini le date de la personne.
     *
     * @param string $date
     * @return bool
     */
    public function setDate($date)
    {
        $strDate = filter_var($date);
        $date = date_parse(filter_var($date));
        if (checkdate($date['month'], $date['day'], $date['year'])) {
            $this->dateDeNaissance = $strDate;
        }
        return false;
    }

    /**
     * Défini l'id du compte de la personne.
     *
     * @param string $carteID
     * @return bool
     */
    public function setComptId($comptId)
    {
        if (self::verifyString($comptId, 11)) {
            $this->carteIdentiteID = filter_var($comptId);
            return true;
        }
        return false;
    }

    /**
     * Verifie si la variable suit les normes.
     *
     * @param string $str
     * @param int $len
     * @return bool
     */
    public static function verifyString($str, $len)
    {
        $str = filter_var($str);
        if (is_string($str) && ! empty($str)) {
            if (strlen($str) > 1 && strlen($str) < $len) {
                return true;
            }
        }
        return false;
    }
}
