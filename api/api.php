<?php
function json_gouv($json,$jerem_recup)
{
    $trouver = array();
    if ($jerem_recup !== "")
    {
        
        foreach($json as $result)
        {
            $tmp = strtolower($result['nom']);

            $correspond = strpos($tmp,$jerem_recup);

            if( $correspond !== false)
            {
                if ($correspond == 0)
                {
                    $tmp = ucfirst($tmp);
                    $trouver[] = $tmp;
                }
            }
        }
    }
    return $trouver;
}
function trouver_gouv_api($jerem_recup)
{
    $prejson = file_get_contents("https://geo.api.gouv.fr/communes");
    $json=json_decode($prejson,true);
    
    
    $villes = json_gouv($json,$jerem_recup);
    
    $prejson = file_get_contents("https://geo.api.gouv.fr/regions");
    $json=json_decode($prejson,true);
    
    
    $regions = json_gouv($json,$jerem_recup);
    
    $prejson = file_get_contents("https://geo.api.gouv.fr/departements");
    $json=json_decode($prejson,true);
    
    
    $departements = json_gouv($json,$jerem_recup);
    
    $trouver=array('villes' => $villes, 'regions' => $regions, 'departements' => $departements );
    
    return $trouver;
}
?>