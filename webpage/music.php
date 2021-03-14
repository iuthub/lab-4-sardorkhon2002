<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Music Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="viewer.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="header">

    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>

</div>


<div id="listarea">
    <ul id="musiclist">

        <?php
        $check=1;
        if (isset($_REQUEST["playlist"]))
        {
            $check=2;
            $playlist = $_REQUEST["playlist"];
            $list = file("songs/$playlist");

            foreach ($list as $listkey) {
                ?>
                <li class="mp3item"><a href='songs/<?= $listkey ?>'><?= basename($listkey) ?>

                    </a> </li>



            <?php 	}
        }

        if($check==1){
            $song = glob('songs/*.mp3');
            foreach ($song as $songfile)
            {

                ?>
                <li class="mp3item">
                    <a href='<?= $songfile ?>'>
                        <?= basename($songfile) ?>

                    </a>
                    <?php
                    $size=filesize ($songfile);
                    if ($size>=0 && $size<=1023)
                    {
                        echo "($size b)";
                    }
                    elseif ($size>=1024 && $size<=1048575)
                    {
                        $nsize=round(($size/1024), 2);

                        print "($nsize kb)";
                    }
                    elseif ($size>=1048576 )
                    {
                        $nsize=round(($size/1024/1024), 2);

                        print "($nsize mb)";
                    }
                    ?>
                </li>
                <?php
            }
            ?>

            <?php
            $Playlist = glob('songs/*.txt');

            foreach ($Playlist as $playlistfile)
            {
                ?>
                <li class="playlistitem">
                    <a href='<?= $playlistfile ?>'><?= basename($playlistfile)  ?></a>

                </li>
                <?php
            }

        } ?>

    </ul>
</div>
</body>
</html>