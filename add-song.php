<?php 

    require_once __DIR__ . '/artistQuery.php';
    require_once __DIR__ . '/genreQuery.php';
    require_once __DIR__ . '/song.php';
        
    $artistQuery = new artistQuery();
    $artists = $artistQuery->getAll();
    
    $genreQuery = new genreQuery();
    $genres = $genreQuery->getAll();
    
    if (isset($_POST['submit'])) {
        
        $title = $_POST['title'];
        $artist_Id = $_POST['artist'];
        $genre_Id = $_POST['genre'];
        $price = $_POST['price'];
        
        $song = new song();
        $song->setTitle($title);
        $song->setArtistId($artist_Id);
        $song->setGenreId($genre_Id);
        $song->setPrice($price);
        $song->save();
        
        echo 
        "<p class='message'> 
            The song: ". $song->getTitle()." with ID: ". $song->getId()." was inserted successfully
        </p>";
    }    
    
?>

<html>

    <head>
        <title>Add Songs</title>      
    </head>

    <h1>
    <font face="Arial">Insert Song.</font>
    </h1> 

    <body>

        <form action="add-song.php" method="POST">
            <input type="text" name="title" placeholder="Song Title">

            <select name="artist" style="height: 200px;">
                <?php foreach($artists as $artist) : ?>
                    <option value="<?php echo $artist->id ?>">
                        <?php echo $artist->artist_name ?>
                    </option>
                <?php endforeach ?>                    
            </select>

            <select name="genre">
                <?php foreach($genres as $genre) : ?>
                    <option value="<?php echo $genre->id ?>">
                        <?php echo $genre->genre ?>
                    </option>
                <?php endforeach ?>                    
            </select> 
            <input type="text" name="price" class="songInput" placeholder="Price"> 
            <input type="submit" name="submit" value="Add" class="addButton">            
        </form>

    </body>

</html>