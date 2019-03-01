
<form action="index.php" method="get">
    <input type="text" name='q'>
    <input type="submit" value="rechercher">
</form>

<?php

    if (isset($_GET['q'])) {
        $search = $_GET['q'];
        
        $url = 'http://fr.wikipedia.org/w/api.php?action=query&prop=extracts|info&exintro&titles='.$search.'&format=json&explaintext&redirects&inprop=url&indexpageids';
        
        $json = file_get_contents($url);
        $data = json_decode($json);

        $pageid = $data->query->pageids[0];
        // var_dump($data);
        echo $data->query->pages->$pageid->extract;
    }
    
?>
