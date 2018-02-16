# Scripto5
### Scripto blog week 5
A blog application to share your writings and comments with the world!

An additional version to the previous Scripto blog application of last week (See the repository Scripto-blog-week-4) with new features based on the userstories as described in the CodeGorilla assignment of week 5 (discussed down below) and a working online demo.

## Follow the progression: https://trello.com/b/cTIGhmDP/scripto-blog-week-5

## Description of the application
On the startpage index.html people can choose to login as user "lezer" or as admin "blogger". 
As a user you can read blogs (IndexUser5.html), see blogs per category (CategoryUSer5.html), search for a blog with a search term (SearchUser5.html). To place a comment as user, the user has to login (user/index.html) or is able to first make a new account (RegisterUser5.html). If the users login in succesfully (checklogin.php), the users are able to comment on blogs (Commentuser5.php) or logout (logout.php). 
As an admin you first have to login (admin/index.html) and get permission (checklogin.php) to get access to the same functionalities as the user (IndexAdmin5.php, CategoryAdmin5.php, SearchAdmin5.php, Commentadmin5.php, logout.php) plus the functionality to write blogs (ScriptoAdmin5.php), improve or correct a previous written blog (ImproveblogAdmin5.php) and to delete comments or disable the comment section (also CommentAdmin5.php). 

### Workflow
- monday: reading assignment, W5-001 searchfunction made, found information about login screen, made new database, made new Git repository
- tuesday: W5-003 able to improve old blog article, first online demo working, php login struggles
- wednesday: W5-002 create login for admin, new database table, W5-004 create login for user, new database table, second online demo working
- thursday: W5-005 user able to make new username & password, removed bugs (from online demo), W5-006 passwords now encrypted, new online demo version
- friday: Improved readability code

## Look for the latest online demo at: http://wijzijncodegorilla.nl/jorik/Scripto5/

## Userstories
The Userstories of the CodeGorilla assignment for week 3 (in Dutch):
- ID     Als een:    Wil ik:
- W3-001 Blogger:    Artikelen op mijn blog plaatsen.  
- W3-002 Lezer:      Een overzicht hebben van de artikelen die mijn favoriete blogger heeft geschreven met het meest recente artikel bovenaan.
- W3-003 Blogger:    Een artikel aan één categorie kunnen koppelen.
- W3-004 Lezer:      Alleen de artikelen in een bepaalde categorie kunnen selecteren met behulp van een kolom.
- W3-005 Blogger:    Zelf categorieën kunnen toevoegen.
- W3-006 Blogger:    Meerdere categorieën kunnen koppelen aan een artikel
- W3-007 Blogger:    De tekst in het artikel kunnen formateren (bijv. vet gedrukt of cursief maken)
- W3-008 Blogger:    Een afbeeldingen in een artikel kunnen plaatsen.

The Userstories of the CodeGorilla assignment for week 4 (in Dutch):
- ID     Als een:    Wil ik:
- W4-001 Blogger:    Een text-expander die als ik een artikel aan het schrijven ben door mij zelf gedefinieerde afkortingen die ik type direct omzet in de volledige tekst.
- W4-002 Lezer:      Anoniem commentaar kunnen geven op een artikel.
- W4-003 Lezer:      Artikelen in een bepaalde categorie kunnen selecteren met behulp van een kolom zonder dat de pagina opnieuw wordt ingelezen.
- W4-004 Blogger:    Ongewenst commentaar kunnen verwijderen.
- W4-005 Blogger:    Voor een artikel kunnen instellen dat geen commentaar kan worden gegeven.

The Userstories of the CodeGorilla assignment for week 5 (in Dutch):
- ID     Als een:    Wil ik:
- W5-001 Lezer:      Kunnen zoeken naar een bepaald artikel door het invoeren van 1 of meerdere trefwoorden.
- W5-002 Blogger:    Kunnen inloggen en toegang krijgen tot de backend waarmee ik o.a. artikelen kan schrijven.
- W5-003 Blogger:    Een bestaand artikel kunnen wijzigen.
- W5-004 Blogger:    Alleen mensen die geregistreerd en ingelogd zijn commentaar kunnen geven.
- W5-005 Lezer:      Mijzelf kunnen registreren en inloggen.
- W5-006 Blogger:    Dat de wachtwoorden op een veilige manier worden opgeslagen in de database.
- W5-007 Lezer:      De mogelijkheid hebben om een nieuw wachtwoord aan te vragen. Via email ontvang ik daarvoor een link om het wachtwoord te kunnen wijzigen.
- W5-008 Lezer:      in de linkerkolom een lijstje hebben met maanden zien waarin artikelen gepubliceerd zijn. Als ik op een maand klik worden de betreffende         artikelen getoond.

## Finished userstories
- W3-001
- W3-002
- W3-003
- W3-004
- W3-006 (Note: A blog can have a maximum of two categories)

- W4-001
- W4-002
- W4-003
- W4-004
- W4-005 (Note: Title can be put in hard code to be blocked permanently or in the user interface to be blocked for the length of the session)

- W5-001
- W5-002
- W5-003
- W5-004
- W5-005
- w5-006


### WORK IN PROGRESS

# Screenshots