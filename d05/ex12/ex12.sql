SELECT nom, prenom FROM `fiche_personne` WHERE nom,prenom REGEXP(".+[- ].+") ORDER BY nom ASC,prenom ASC;
