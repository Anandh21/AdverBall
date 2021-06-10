#AdverBall

1) Cloner le repo 
2) composer update
3) dupliquer le fichier .env et le renonmer .env.local
4) modifier le db_user et la db_password de la ligne suivante
   DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/adverball"
5) Aller sur PhpMyAdmin et créer votre base de donnée "adverball"
6) symfony server:start 

###Base de Donnée

symfony console make:migration
symfony consoles doctrine:migrations:migrate

###Seeding
symfony console doctrine:fixtures:load
