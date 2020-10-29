<?php

$Srv 		= "localhost";
$SrvUser 	= "userdb";
$SrvPass 	= "UtR78Lm157FY45";

$CON_BASE = mysqli_connect($Srv, $SrvUser, $SrvPass, "BaseSAV");
if (!$CON_BASE)
    {
    fputs($FicLog,"\nErreur de connexion à : BaseCentrale");
    exit;
    }
mysqli_select_db($CON_BASE, "BaseVIP");

$req_up = "select * from BaseVIP.t_intervention where (motcleGen = null or motcleGen  =  '') limit 300000 ";
$index= 0;
if ($Res_SelLg = mysqli_query($CON_BASE, $req_up))
{
$Nb_SelLg = mysqli_num_rows($Res_SelLg);
echo "$index--$req_up --$Nb_SelLg--";
if ($Nb_SelLg > 0)
    {

    while ($TableLg=mysqli_fetch_array($Res_SelLg, MYSQLI_BOTH))
        {
        $index++;
        $idInt = $TableLg["id"];
        $Clefinale = $TableLg["NomCmdCli"]." - ";
        $Clefinale .= $TableLg["NumInt"]." - ";
        $Clefinale .= $TableLg["AdLivCli"]." - ";
        $Clefinale .= $TableLg["CPLivCli"]." - ";
        $Clefinale .= $TableLg["VilleLivCli"]." - ";
        $Clefinale .= $TableLg["TypeApp"]." - ";
        $Clefinale .= $TableLg["Marque"]." - ";
        $Clefinale .= $TableLg["NumSerie"]." - ";
        $Clefinale .= $TableLg["RefDossierCli"];
        $Clefinale .= $TableLg["NomLivCli"]." - ";
        $Clefinale .= $TableLg["InterlocLivCli"]." - ";
        $Clefinale .= $TableLg["NumFacture"]." - ";
        $Clefinale .= $TableLg["RefDossierConst"]." - ";
        $Clefinale .= $TableLg["NumContrat"]." - ";
        $Clefinale .= $TableLg["CodeMarche"];


            //$req_insetmcle = "INSERT INTO `t_mot_cle` (`id`, `Type`, `mot_cle`) VALUES ('$idInt', 'INT', '$Clefinale')";

                $req_updateinterv = "update t_intervention set motcleGen = '$Clefinale' where NumInt = '".$TableLg["NumInt"]."'";
                echo"\n$index<br>------------>$req_updateinterv";
                if ($Res_SelLg1 = mysqli_query($CON_BASE, $req_updateinterv))
                    {

                    }
                else
                    {
                    echo "\n$index<br>Prob Requete : $req_updateinterv ";
                    }




        }
    }
else
    {
    echo "\n<br>j'en ai plus";
    }
}

?>
