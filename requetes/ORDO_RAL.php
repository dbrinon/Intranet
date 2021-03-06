<?php $requete=odbc_exec($bdd,'
SELECT (GL_TIERS) as CLIENT, T1.T_LIBELLE as RAISONSOCIALE, GL_NUMERO as ARC, GL_NUMLIGNE as LIG, GL_CODEARTICLE as CODEARTICLE, GL_LIBELLE as LIBELLE, GL_DATELIVRAISON as LIVRAISON,  GL_QTEFACT as QTE, GL_QTERESTE as RAL, 

( select top 1 (QPM_DUREEPHASE/360)/QPM_QTAFAIRE from QPLANGP where QPM_ARTTECH=GL_ARTICLE and QPM_CTX like "002" and QPM_PHASE Like "MON" )* GL_QTERESTE as HEURES,

(SELECT GQ_PHYSIQUE FROM DISPO WHERE GQ_ARTICLE=GL_ARTICLE and GQ_DEPOT=001) as STK, (SELECT GQ_PHYSIQUE FROM DISPO WHERE GQ_ARTICLE=GL_ARTICLE AND GQ_DEPOT=001)-(SELECT GQ_RESERVECLI FROM DISPO WHERE GQ_ARTICLE=GL_ARTICLE and GQ_DEPOT=001) as DISP,

(SELECT GQ_RESERVEFOU FROM DISPO WHERE GQ_ARTICLE=GL_ARTICLE and GQ_DEPOT=001) as ATT,

([GL_QTERESTE]*[GL_PUHTNET])/[GL_PRIXPOURQTE] as MONTANTRAL,

RD8_RD8LIBDATE0, RD8_RD8LIBDATE2, RD8_RD8LIBDATE3, GL_TYPECADENCE, GL_ETATSOLDE, GL_DATECREATION, GL_CREATEUR, GL_DATEMODIF, GL_UTILISATEUR

FROM LIGNE
 
LEFT JOIN RTINFOS008 ON RD8_CLEDATA=LEFT(GL_NATUREPIECEG +"bbb",3)+";"+GL_SOUCHE+";"+RIGHT("000000000"+LTRIM(STR(GL_NUMERO)),9)+";"+RIGHT("000"+LTRIM(STR(GL_INDICEG)),3)+";"+RIGHT("000000"+LTRIM(STR(GL_NUMORDRE)),6)+";" 

 LEFT OUTER JOIN TIERS T1 ON GL_TIERS=T1.T_TIERS 
 LEFT OUTER JOIN CHOIXCOD CC2 ON GL_FAMILLENIV1=CC2.CC_CODE AND CC2.CC_TYPE="FN1" 
 LEFT OUTER JOIN CHOIXCOD CC3 ON GL_FAMILLENIV2=CC3.CC_CODE AND CC3.CC_TYPE="FN2"
 LEFT OUTER JOIN CHOIXCOD CC4 ON GL_FAMILLENIV3=CC4.CC_CODE AND CC4.CC_TYPE="FN3"
 LEFT OUTER JOIN CHOIXEXT YX5 ON GL_LIBREART1=YX5.YX_CODE AND YX5.YX_TYPE="LA1"

 WHERE (GL_NATUREPIECEG = "CC" AND GL_VIVANTE="X" AND (GL_TYPELIGNE="ART") AND GL_TYPECADENCE="FER"  AND (GL_QTERESTE>0 AND (GL_FAMILLENIV3)<>"436" AND GL_ETATSOLDE<>"SOL" AND GL_LIBREART1="GM"))
 ORDER BY GL_DATELIVRAISON
 '); ?>