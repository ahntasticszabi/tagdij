<style>

</style>

<?php

    print "<table border=2>";
    $server = "localhost";
    $user = "root";
    $dbpw = "12345678";
    $db = "tagdij";

    $adb = mysqli_connect($server, $user, $dbpw, $db);

    $ugyfelek = mysqli_query($adb, "SELECT * FROM ugyfel");

    print "<tr><td>";
    while($ugyfel = mysqli_fetch_array($ugyfelek))
    {
        print "<a href='./?id=$ugyfel[azon]'>$ugyfel[nev]</a><br>";
    }

    print "</td><td align=right>";

    if(!isset($_GET['id']))
    {
        print "<h2> Válassz egy nevet a bal oldali listából!";
    }
    else 
    {   
        $befizek = mysqli_query($adb, "SELECT * FROM befiz WHERE azon='$_GET[id]'");

        while($befiz = mysqli_fetch_array($befizek))
        {
            print "$befiz[datum] : $befiz[osszeg]<br>";
        }
    
        $osszbefiz = mysqli_fetch_array(mysqli_query($adb, "SELECT SUM(osszeg) FROM befiz WHERE azon='$_GET[id]'"));
    
        print "Összes befizetés: $osszbefiz[0]";
    }
    
    print "</td></tr>";


?>