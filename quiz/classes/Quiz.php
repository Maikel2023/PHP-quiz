<?php
include_once "Vraag.php";


class Quiz
{

    //als een global
    static $uidNumber = 1;

    private $uid;
 
    private $vragen;
    public function __construct()
    {
        //dit kan je dan overal gebruiken...



        
        $this->uid = self::$uidNumber++;

        $this->vragen = [
            new Vraag(
                1,
                "Hoe maken wij in de Ubuntu terminal een nginx-proxy?",
                false,
                true,
                [
                    new Antwoord("sudo docker network create nqinx-proxy ", true, "Dit is correct! Dit is de juiste manier hoe je het beschrijft"),
                    new Antwoord("docker create network nqinx-proxy ", false, "Met 'docker create' kun je niets doen"),
                    new Antwoord("sudo docker create network proxy nqinx-proxy ", false, "Het klinkt logisch, maar het is niet het juiste antwoord"),
                ]
            ),
            
            new Vraag(
                2,
                "Met welke term zou je jouw VSCode-project kunnen openen in de Ubuntu-terminal?",
                false,
                true,
                [
                    new Antwoord("open_vscode", false, "Dit is niet de juiste term"),
                    new Antwoord("open_code", false, "Dit is niet de juiste term"),
                    new Antwoord("code", true, "Dit is correct! Je opent jouw VSCode-project in de terminal met het commando 'code'"),
                    new Antwoord("code(VSC)", false, "Dit is niet de juiste term"),
                ]
            ),
            
            new Vraag(
                3,
                "We halen ons project op uit GitLab/GitHub, wat is onze eerste stap?",
                false,
                true,
                [
                    new Antwoord("We openen onze Ubuntu-terminal en typen 'cd nginx-reverse-proxy/' en drukken op enter", false, "Dit is niet de juiste eerste stap"),
                    new Antwoord("We openen onze Ubuntu-terminal en typen 'sudo docker network create nginx-proxy' en drukken op enter", true, "Dit is correct! De eerste stap is het creëren van een docker-netwerk met het commando 'sudo docker network create nginx-proxy'"),
                    new Antwoord("We openen onze Ubuntu-terminal en typen 'sudo docker network create project' en drukken op enter", false, "Dit is niet de juiste eerste stap"),
                    new Antwoord("We openen onze Ubuntu-terminal en typen 'npm run start' en drukken op enter", false, "Dit is niet de juiste eerste stap"),
                ]
            ),
            
            new Vraag(
                4,
                "Bij het coderen van jouw project wil je een persoon genaamd Herman maken en je wilt Herman laten fietsen. Wat zou een 'logische' manier zijn om te beginnen?",
                false,
                true,
                [
                    new Antwoord("Je begint met het aanmaken van een bestand genaamd 'herman.php' en maakt daar Herman aan. Vervolgens maak je een nieuw bestand genaamd 'fiets.php' waarin je functies voor onze fiets maakt", false, "Dit is niet de logische manier om te beginnen"),
                    new Antwoord("Je begint met het aanmaken van een bestand genaamd 'wereld.php' en maakt daar Herman aan. Vervolgens maak je een nieuw bestand genaamd 'herman.php' waarin je functies voor onze Herman maakt", true, "Dit is de logische manier om te beginnen"),
                    new Antwoord("Je begint met het aanmaken van een bestand genaamd 'Fietse.php' en begint met een constructor en geeft Herman en de fiets mee in de constructor", false, "Dit is niet de logische manier om te beginnen"),
                    new Antwoord("Je begint met het aanmaken van een bestand genaamd 'Wereld.php' en begint met een constructor en geeft Herman en de fiets mee in de constructor", false, "Dit is niet de logische manier om te beginnen"),
                ]
            ),
            
            new Vraag(
                5,
                "Welke public function moet je standaard beginnen in PHP OOP?",
                false,
                true,
                [
                    new Antwoord("public function _constructor()", false, "Dit is niet de juiste standaardfunctie"),
                    new Antwoord("public function _construct()", false, "Dit is niet de juiste standaardfunctie"),
                    new Antwoord("public function __constructor()", false, "Dit is niet de juiste standaardfunctie"),
                    new Antwoord("public function __construct()", true, "Dit is correct! De standaardconstructiefunctie in PHP OOP is '__construct()'"),
                ]
            ),
            
            new Vraag(
                6,
                "Als we Herman op die fiets willen, wat zou een logische syntax zijn om mee te beginnen?",
                false,
                true,
                [
                    new Antwoord("We beginnen met '<?php' en maken vervolgens een eigenschap genaamd 'Herman' aan", false, "Dit is niet de logische syntax"),
                    new Antwoord("We beginnen met '<?php' en maken vervolgens een class genaamd 'Herman' aan", true, "Dit is de logische syntax"),
                    new Antwoord("We beginnen met '<?php' en maken vervolgens een methode genaamd 'Herman' aan", false, "Dit is niet de logische syntax"),
                ]
            ),
            
            new Vraag(
                7,
                "Met welk commando kunnen we ons opgehaalde project vanuit de terminal naar Docker brengen?",
                false,
                true,
                [
                    new Antwoord("create docker-compose-up", false, "Dit is niet het juiste commando"),
                    new Antwoord("create-docker-compose up", false, "Dit is niet het juiste commando"),
                    new Antwoord("docker-compose up", true, "Dit is correct! Je kunt jouw opgehaalde project naar Docker brengen met het commando 'docker-compose up'"),
                    new Antwoord("docker-compose-up", false, "Dit is niet het juiste commando"),
                ]
            ),
            
            new Vraag(
                8,
                "Stel je voor dat je met je project met Docker wilt werken, maar op de achtergrond heb je op dezelfde poort XAMPP draaien. Is dat mogelijk?",
                false,
                true,
                [
                    new Antwoord("Dat is mogelijk. Het zou geen invloed moeten hebben op Docker", false, "Dit is niet correct. XAMPP en Docker kunnen conflicteren als ze dezelfde poort gebruiken"),
                    new Antwoord("Dat is niet mogelijk. Het zou invloed moeten hebben op Docker", true, "Dit is correct! XAMPP en Docker kunnen conflicteren als ze dezelfde poort gebruiken"),
                    new Antwoord("Beide antwoorden zijn goed", false, "Dit is niet correct. Slechts één antwoord is correct"),
                    new Antwoord("Beide antwoorden zijn fout", false, "Dit is niet correct. Slechts één antwoord is correct"),
                ]
            ),
            
            new Vraag(
                9,
                "Is XAMPP handiger of minder handig dan Docker bij grotere projecten?",
                false,
                true,
                [
                    new Antwoord("Met XAMPP is het minder handig omdat elke computer/laptop anders is en de code anders kan worden weergegeven bij het testen", true, "Dit is correct! XAMPP kan inconsistenties veroorzaken bij het uitvoeren van code op verschillende machines"),
                    new Antwoord("Met XAMPP is het minder handig omdat het minder betrouwbaar is dan Docker en Docker meer mogelijkheden biedt voor grotere projecten", true, "Dit is correct! XAMPP kan minder betrouwbaar zijn en Docker biedt meer flexibiliteit en mogelijkheden"),
                    new Antwoord("Met XAMPP is het minder handig omdat het minder veilig is en Docker biedt meer beveiliging voor projecten", true, "Dit is correct! Docker biedt meer beveiligingsmaatregelen dan XAMPP"),
                    new Antwoord("Met XAMPP is het juist handiger omdat het overzichtelijker en duidelijker is dan Docker", false, "Dit is niet correct. Docker biedt meer voordelen voor grotere projecten dan XAMPP"),
                ]
            ),
            
            new Vraag(
                10,
                "Wat doet 'docker-compose up -d' in Docker?",
                false,
                true,
                [
                    new Antwoord("Dan kopieert Docker alle containers en maakt een kopie in jouw aangewezen documenten", false, "Dit is niet correct. Het commando 'docker-compose up -d' doet iets anders"),
                    new Antwoord("Dan laat het je containers altijd uitvoeren, zelfs als er een 'exit status 1' is", false, "Dit is niet correct. Het commando 'docker-compose up -d' doet iets anders"),
                    new Antwoord("Dan bouwt, (re)creëert, start en koppelt het aan alle containers en services", true, "Dit is correct! Het commando 'docker-compose up -d' bouwt, (re)creëert, start en koppelt alle containers en services"),
                    new Antwoord("Alle mogelijke vraagkeuzes zijn juist", false, "Dit is niet correct. Slechts één antwoord is correct"),
                    new Antwoord("Alle mogelijke vraagkeuzes zijn onjuist", false, "Dit is niet correct. Slechts één antwoord is correct"),
                ]
            ),
            
        ];
    }

    public function getAantalVragen()
    {
        return count($this->vragen);
    }

    public function getVragen()
    {
        return $this->vragen;
    }

    


}
?>
